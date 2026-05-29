<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
{
    // statistik utama
    $totalUsers = User::count();

    $totalBooks = Book::count();

    $totalCategories = Category::count();

    $totalComments = Comment::count();

    $totalVisitors = Visitor::count();

    $todayVisitors = Visitor::whereDate(
            'visit_date',
            today()
        )->count();

        $monthlyVisitors = Visitor::whereMonth(
            'visit_date',
            now()->month
        )->count();


    // data terbaru
    $latestUsers = User::latest()
        ->take(5)
        ->get();

    $latestBooks = Book::latest()
        ->take(5)
        ->get();

    return view('admin.dashboard', compact(

        'totalUsers',
        'totalBooks',
        'totalCategories',
        'totalComments',
        'latestUsers',
        'latestBooks',
        'totalVisitors',
        'todayVisitors',
        'monthlyVisitors'

    ));

}
}