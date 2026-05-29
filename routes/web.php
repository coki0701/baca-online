<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\ReadHistory;
use App\Models\Setting;
use App\Models\Visitor;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

/* LANDING PAGE */

Route::get('/', function () {

    $todayVisitor = Visitor::where('ip_address', request()->ip())
    ->whereDate('visit_date', now()->toDateString())
    ->first();

    if(!$todayVisitor){

    Visitor::create([

        'ip_address' => request()->ip(),

        'user_agent' => request()->userAgent(),

        'visit_date' => now()->toDateString()

    ]);

    }
    $query = Book::query();
    if(request('search')){

    $search = request('search');

    $query->where(function($q) use ($search){

        $q->where('title', 'like', '%'.$search.'%')

          ->orWhere('author', 'like', '%'.$search.'%')

          ->orWhere('description', 'like', '%'.$search.'%')

          ->orWhereHas('category', function($category) use ($search){

                $category->where(
                    'name',
                    'like',
                    '%'.$search.'%'
                );

          });

    });

    }

            if(request('category')){
                $query->where(
                     'category_id',
            request('category')
    );
    }

        $books = $query->with('category')
        ->latest()
        ->paginate(12)
        ->withQueryString();

        $categories = Category::all();

        $announcements = \App\Models\Announcement::latest()
        ->take(6)
        ->get();

        $setting = \App\Models\Setting::first();

        $totalBooks = Book::count();

        $totalCategories = Category::count();

        $totalComments = \App\Models\Comment::count();

        $totalReaders = \App\Models\ReadHistory::count();

        $popularBooks = \App\Models\Book::with('category')
        ->withCount('readHistories')
        ->orderByDesc('read_histories_count')
        ->take(4)
        ->get();

        return view('landing', compact(
        'books',
        'categories',
        'announcements',
        'setting',
        'totalBooks',
        'totalCategories',
        'totalComments',
        'totalReaders',
        'popularBooks'
    
    ));

});

Route::get('/category/{id}', function ($id) {

    $category = \App\Models\Category::findOrFail($id);

    $books = \App\Models\Book::where('category_id', $id)
        ->with('category')
        ->latest()
        ->get();

    return view('books.category', compact(
        'category',
        'books'
    ));

        })->name('books.category');


Route::get('/dashboard', function () {

    return redirect('/admin/dashboard');

        })->middleware('auth');

/* ADMIN LOGIN */
Route::get('/admin-login', function () {

    return view('auth.login');

})->name('admin.login');



/* ADMIN ROUTES */

Route::prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('books', BookController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('users', UserController::class)
            ->except(['show', 'create', 'store']);

        Route::get('/read-histories', function () {

            $histories = \App\Models\ReadHistory::with(
                'user',
                'book'
            )->latest()->get();

            return view(
                'admin.read_histories.index',
                compact('histories')
            );

        })->name('read_histories');

    Route::get('/profile', function () {

        return view('admin.profile');

        })->name('profile');


    Route::post('/profile/update', function (Request $request) {

        $request->validate([

        'name' => 'required',

        'email' => 'required|email',

        ]);

        $user = auth()->user();

        $user->name = $request->name;

        $user->email = $request->email;

        if($request->password){

        $user->password =
            Hash::make($request->password);

        }

        $user->save();

        return back()->with(
        'success',
        'Profile berhasil diperbarui'
        );

        })->name('profile.update');


    Route::get('/reports', function () {

            $totalBooks = \App\Models\Book::count();

            $totalCategories = \App\Models\Category::count();

            $totalUsers = \App\Models\User::count();

            $totalBookmarks = \App\Models\Bookmark::count();

            $totalComments = \App\Models\Comment::count();

            $totalHistories = \App\Models\ReadHistory::count();

            $popularBooks = \App\Models\Book::withCount('readHistories')
            ->orderByDesc('read_histories_count')
            ->take(5)
            ->get();

        return view('admin.reports.index', compact(
            'totalBooks',
            'totalCategories',
            'totalBookmarks',
            'totalComments',
            'totalHistories',
            'popularBooks'
        ));

        })->name('reports');

        
        Route::get('/comments', function () {

    $comments = \App\Models\Comment::with('user', 'book')
        ->latest()
        ->get();

    return view(
        'admin.comments.index',
        compact('comments')
    );

        })->name('comments');

        Route::delete('/comments/{id}', function ($id) {

            \App\Models\Comment::findOrFail($id)->delete();

            return back()->with(
                'success',
                'Komentar berhasil dihapus'
            );

        })->name('comments.destroy');

        

        Route::get('/announcements', function () {

            $announcements = \App\Models\Announcement::latest()
                ->get();

            return view(
                'admin.announcements.index',
                compact('announcements')
            );

        })->name('announcements');

        Route::get('/announcements/create', function () {

            return view('admin.announcements.create');

        })->name('announcements.create');

        Route::post('/announcements', function () {

            request()->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            \App\Models\Announcement::create([
                'title' => request('title'),
                'content' => request('content'),
            ]);

            return redirect()
                ->route('admin.announcements')
                ->with(
                    'success',
                    'Pengumuman berhasil ditambahkan'
                );

        })->name('announcements.store');

        Route::delete('/announcements/{id}', function ($id) {

            \App\Models\Announcement::findOrFail($id)->delete();

            return back()->with(
                'success',
                'Pengumuman berhasil dihapus'
            );

        })->name('announcements.destroy');

        

        
        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', function () {

    $setting = \App\Models\Setting::first();

    return view(
        'admin.settings.index',
        compact('setting')
    );

        })->name('settings');


Route::post('/settings', function () {

    $setting = \App\Models\Setting::first();

    if (!$setting) {

        $setting = new \App\Models\Setting();
    }

    $logoPath = $setting->logo;

    if (request()->hasFile('logo')) {

        $logo = request()->file('logo');

        $logoName =
            time().'_'.$logo->getClientOriginalName();

        $logo->storeAs(
            'settings',
            $logoName,
            'public'
        );

        $logoPath = 'settings/'.$logoName;
    }

    $setting->updateOrCreate(

        ['id' => $setting->id],

        [
            'site_name' => request('site_name'),
            'logo' => $logoPath,
            'description' => request('description'),
            'footer' => request('footer'),
            'email' => request('email'),
            'phone' => request('phone'),
            'address' => request('address'),
            'open_hours' => request('open_hours')
        ]
    );

    return back()->with(
        'success',
        'Pengaturan berhasil disimpan'
    );

        })->name('settings.update');

    });


/*
|--------------------------------------------------------------------------
| READ BOOK
|--------------------------------------------------------------------------
*/

Route::get('/books/read/{id}', function ($id) {

    $book = Book::findOrFail($id);

    if (Auth::check()) {

        ReadHistory::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'book_id' => $id
            ],
            [
                'updated_at' => now()
            ]
        );
    }

    return view(
        'books.read',
        compact('book')
    );

        })->name('books.read');


/*
|--------------------------------------------------------------------------
| BOOKMARK
|--------------------------------------------------------------------------
*/

Route::post('/bookmark/{id}', function ($id) {

    $bookmarks = session()->get('bookmarks', []);

    if (!in_array($id, $bookmarks)) {
        $bookmarks[] = $id;
    }

    session()->put('bookmarks', $bookmarks);

    return back()->with('success', 'Buku berhasil ditambahkan ke bookmark');

        })->name('bookmark.store');


Route::post('/bookmark/remove/{id}', function ($id) {

    $bookmarks = session()->get('bookmarks', []);

    $bookmarks = array_diff($bookmarks, [$id]);

    session()->put('bookmarks', $bookmarks);

    return back()->with('success', 'Bookmark berhasil dihapus');

        })->name('bookmark.remove');


Route::get('/my-bookmarks', function () {

    $ids = session()->get('bookmarks', []);

    $books = \App\Models\Book::whereIn('id', $ids)
        ->with('category')
        ->get();

    $bookmarks = $books;

    return view('books.bookmarks', compact('bookmarks'));

        })->name('bookmark.list');


/*
|--------------------------------------------------------------------------
| COMMENTS
|--------------------------------------------------------------------------
*/

Route::post('/comment/{id}', function ($id) {

    request()->validate([
        'guest_name' => 'required',
        'comment' => 'required'
    ]);

    \App\Models\Comment::create([
    'user_id' => null,
    'book_id' => $id,
    'guest_name' => request('guest_name'),
    'comment' => request('comment')
    ]);

    return back()->with('success', 'Komentar berhasil dikirim');

        })->name('comment.store');

/*
|--------------------------------------------------------------------------
| READ HISTORY
|--------------------------------------------------------------------------
*/

Route::get('/history', function () {

    $histories = ReadHistory::where(
        'user_id',
        Auth::id()
    )
    ->with('book')
    ->latest()
    ->get();

    return view(
        'books.history',
        compact('histories')
    );

        })->middleware('auth')->name('history');


/*
|--------------------------------------------------------------------------
| PDF REPORTS
|--------------------------------------------------------------------------
*/


Route::get('/admin/reports/books/pdf', function () {

    $books = \App\Models\Book::latest()->get();

    $pdf = Pdf::loadView(
        'admin.reports.books_pdf',
        compact('books')
    );

    return $pdf->download(
        'laporan-buku.pdf'
    );

        })->name('admin.reports.books.pdf');

Route::get('/admin/reports/categories/pdf', function () {

    $categories = \App\Models\Category::withCount('books')
        ->latest()
        ->get();

    $pdf = Pdf::loadView(
        'admin.reports.categories_pdf',
        compact('categories')
    );

    return $pdf->download('laporan-kategori.pdf');

        })->name('admin.reports.categories.pdf');

Route::get('/admin/reports/visitors/pdf', function () {

    $visitors = \App\Models\Visitor::latest()->get();

    $pdf = Pdf::loadView(
        'admin.reports.visitors_pdf',
        compact('visitors')
    );

    return $pdf->download('laporan-pengunjung.pdf');

        })->name('admin.reports.visitors.pdf');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
