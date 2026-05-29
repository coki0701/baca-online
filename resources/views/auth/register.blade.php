<x-guest-layout>

    <div class="min-h-screen flex bg-gray-100">

        {{-- LEFT SIDE --}}
        <div class="hidden lg:flex w-1/2 relative overflow-hidden">

            {{-- BACKGROUND --}}
            <div class="absolute inset-0 bg-gradient-to-br
                        from-indigo-700 via-blue-700 to-cyan-700">

            </div>

            {{-- EFFECT --}}
            <div class="absolute top-0 left-0 w-80 h-80
                        bg-white/10 rounded-full blur-3xl">

            </div>

            <div class="absolute bottom-0 right-0 w-96 h-96
                        bg-cyan-300/10 rounded-full blur-3xl">

            </div>

            {{-- CONTENT --}}
            <div class="relative z-10 flex flex-col
                        justify-center px-16 text-white">

                <div class="mb-8">

                    <span class="text-6xl">
                        📚
                    </span>

                </div>

                <h1 class="text-5xl font-extrabold leading-tight mb-6">

                    Bergabung Dengan
                    Perpus Digital

                </h1>

                <p class="text-lg text-blue-100 leading-relaxed mb-8">

                    Buat akun untuk menikmati
                    pengalaman membaca buku digital
                    yang modern, cepat, dan nyaman.

                </p>

                {{-- FEATURE --}}
                <div class="space-y-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full
                                    bg-white/20 flex
                                    items-center justify-center">

                            📖

                        </div>

                        <span class="text-lg">

                            Akses buku digital

                        </span>

                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full
                                    bg-white/20 flex
                                    items-center justify-center">

                            ⭐

                        </div>

                        <span class="text-lg">

                            Bookmark buku favorit

                        </span>

                    </div>

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full
                                    bg-white/20 flex
                                    items-center justify-center">

                            🚀

                        </div>

                        <span class="text-lg">

                            Riwayat membaca otomatis

                        </span>

                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT SIDE --}}
        <div class="flex w-full lg:w-1/2
                    items-center justify-center p-6">

            <div class="w-full max-w-md">

                {{-- MOBILE LOGO --}}
                <div class="lg:hidden text-center mb-6">

                    <h1 class="text-4xl font-bold text-blue-700">

                        📚 Perpus Digital

                    </h1>

                </div>

                {{-- CARD --}}
                <div class="bg-white rounded-3xl
                            shadow-2xl p-8">

                    <div class="text-center mb-8">

                        <h2 class="text-4xl font-bold
                                   text-gray-800 mb-2">

                            Register

                        </h2>

                        <p class="text-gray-500">

                            Buat akun baru 👋

                        </p>

                    </div>

                    {{-- FORM --}}
                    <form method="POST"
                          action="{{ route('register') }}">

                        @csrf

                        {{-- NAME --}}
                        <div class="mb-5">

                            <x-input-label
                                for="name"
                                :value="__('Nama')" />

                            <x-text-input
                                id="name"
                                class="block mt-2 w-full rounded-2xl
                                       border-gray-300 focus:border-blue-500
                                       focus:ring-blue-500"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required autofocus />

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2" />

                        </div>

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
                                required />

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

                        {{-- PASSWORD CONFIRM --}}
                        <div class="mb-6">

                            <x-input-label
                                for="password_confirmation"
                                :value="__('Konfirmasi Password')" />

                            <x-text-input
                                id="password_confirmation"
                                class="block mt-2 w-full rounded-2xl
                                       border-gray-300 focus:border-blue-500
                                       focus:ring-blue-500"
                                type="password"
                                name="password_confirmation"
                                required />

                        </div>

                        {{-- BUTTON --}}
                        <button type="submit"
                                class="w-full bg-gradient-to-r
                                       from-indigo-600 to-blue-600
                                       hover:from-indigo-700 hover:to-blue-700
                                       text-white font-bold py-3
                                       rounded-2xl shadow-lg
                                       transition duration-300">

                            Register

                        </button>

                        {{-- LOGIN --}}
                        <div class="text-center mt-6
                                    text-sm text-gray-600">

                            Sudah punya akun?

                            <a href="{{ route('login') }}"
                               class="text-blue-600
                                      hover:text-blue-800
                                      font-semibold">

                                Login

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>