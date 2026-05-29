<x-guest-layout>

    <div class="min-h-screen flex bg-gray-100">

        {{-- LEFT SIDE --}}
        <div class="hidden lg:flex w-1/2 relative overflow-hidden">

            {{-- BACKGROUND --}}
            <div class="absolute inset-0 bg-gradient-to-br
                        from-blue-700 via-indigo-700 to-purple-700">

            </div>

            {{-- CIRCLE EFFECT --}}
            <div class="absolute top-0 left-0 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-300/10 rounded-full blur-3xl"></div>

            {{-- CONTENT --}}
            <div class="relative z-10 flex flex-col justify-center px-16 text-white">

                <div class="mb-8">

                    <span class="text-6xl">
                        📚
                    </span>

                </div>

                <h1 class="text-5xl font-extrabold leading-tight mb-6">

                    Perpus Digital Modern

                </h1>

                <p class="text-lg text-blue-100 leading-relaxed mb-8">

                    Nikmati pengalaman membaca buku digital
                    yang modern, nyaman, dan interaktif.
                    Simpan bookmark, pinjam buku,
                    dan lanjutkan membaca kapan saja.

                </p>

                {{-- FEATURE --}}
                <div class="space-y-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full bg-white/20
                                    flex items-center justify-center">

                            📖

                        </div>

                        <span class="text-lg">
                            Ribuan koleksi buku digital
                        </span>

                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full bg-white/20
                                    flex items-center justify-center">

                            ⭐

                        </div>

                        <span class="text-lg">
                            Bookmark & riwayat membaca
                        </span>

                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full bg-white/20
                                    flex items-center justify-center">

                            🚀

                        </div>

                        <span class="text-lg">
                            Akses cepat & modern
                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT SIDE --}}
        <div class="flex w-full lg:w-1/2 items-center justify-center p-6">

            <div class="w-full max-w-md">

                {{-- LOGO MOBILE --}}
                <div class="lg:hidden text-center mb-6">

                    <h1 class="text-4xl font-bold text-blue-700">
                        📚 Perpus Digital
                    </h1>

                </div>

                {{-- CARD --}}
                <div class="bg-white rounded-3xl shadow-2xl p-8">

                    <div class="text-center mb-8">

                        <h2 class="text-4xl font-bold text-gray-800 mb-2">

                            Login

                        </h2>

                        <p class="text-gray-500">

                            Selamat datang kembali 👋

                        </p>

                    </div>

                    {{-- SESSION --}}
                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')" />

                    {{-- FORM --}}
                    <form method="POST"
                          action="{{ route('login') }}">

                        @csrf

                        {{-- EMAIL --}}
                        <div class="mb-5">

                            <x-input-label
                                for="email"
                                :value="__('Email')" />

                            <x-text-input
                                id="email"
                                class="block mt-2 w-full rounded-2xl
                                       border-gray-300 focus:border-blue-500
                                       focus:ring-blue-500"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus />

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2" />

                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-5">

                            <x-input-label
                                for="password"
                                :value="__('Password')" />

                            <x-text-input
                                id="password"
                                class="block mt-2 w-full rounded-2xl
                                       border-gray-300 focus:border-blue-500
                                       focus:ring-blue-500"
                                type="password"
                                name="password"
                                required />

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2" />

                        </div>

                        {{-- REMEMBER --}}
                        <div class="flex items-center justify-between mb-6">

                            <label for="remember_me"
                                   class="inline-flex items-center">

                                <input id="remember_me"
                                       type="checkbox"
                                       class="rounded border-gray-300
                                              text-blue-600 shadow-sm
                                              focus:ring-blue-500"
                                       name="remember">

                                <span class="ms-2 text-sm text-gray-600">

                                    Remember me

                                </span>

                            </label>

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                                class="w-full bg-gradient-to-r
                                       from-blue-600 to-indigo-600
                                       hover:from-blue-700 hover:to-indigo-700
                                       text-white font-bold py-3 rounded-2xl
                                       shadow-lg transition duration-300">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>