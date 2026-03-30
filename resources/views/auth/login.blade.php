<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | UMKM Desa Sudimoro</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                        'primary-light': '#3B82F6',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        /* Input styles */
        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all 0.25s ease;
            outline: none;
            background: #f9fafb;
            color: #111827;
        }
        .form-input:focus {
            border-color: #1D4ED8;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(29, 78, 216, 0.10);
        }
        .form-input::placeholder { color: #9ca3af; }

        /* Button animation */
        .btn-login {
            background: linear-gradient(135deg, #1D4ED8 0%, #3B82F6 100%);
            color: white;
            width: 100%;
            padding: 0.9rem 1rem;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 0.9375rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 16px rgba(29, 78, 216, 0.35);
            letter-spacing: 0.01em;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
            box-shadow: 0 8px 24px rgba(29, 78, 216, 0.5);
            transform: translateY(-2px);
        }
        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(29, 78, 216, 0.3);
        }

        /* Left panel */
        .login-left {
            background-image: url('/images/login-bg.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .login-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(15,23,42,0.75) 0%, rgba(29,78,216,0.55) 50%, rgba(15,23,42,0.80) 100%);
        }

        /* Card entrance animation */
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(40px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .login-card { animation: slideInRight 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeInUp 0.5s ease forwards; }
        .fade-up-2 { animation: fadeInUp 0.6s 0.1s ease both; }
        .fade-up-3 { animation: fadeInUp 0.6s 0.2s ease both; }
    </style>
</head>
<body class="h-screen overflow-hidden bg-gray-950">

<div class="flex h-screen">

    <!-- ====== LEFT: IMAGE BACKGROUND ====== -->
    <div class="hidden lg:flex lg:w-1/2 login-left">
        <!-- Overlay Content -->
        <div class="relative z-10 flex flex-col justify-end p-12 h-full w-full">
            <!-- Village Badge -->
            <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/25 rounded-full px-4 py-2 mb-6 w-fit">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-white text-sm font-medium">Sistem Informasi Desa</span>
            </div>

            <h2 class="text-4xl font-extrabold text-white leading-tight mb-3">
                UMKM<br>
                <span class="text-blue-300">Desa Sudimoro</span>
            </h2>
            <p class="text-blue-100/80 text-base leading-relaxed max-w-sm">
                Platform digital untuk mengelola dan mempromosikan produk UMKM Desa Sudimoro ke pasar yang lebih luas.
            </p>

            <div class="flex items-center gap-4 mt-8">
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 rounded-full bg-blue-400 border-2 border-white/50 flex items-center justify-center text-white text-xs font-bold">A</div>
                    <div class="w-8 h-8 rounded-full bg-indigo-500 border-2 border-white/50 flex items-center justify-center text-white text-xs font-bold">D</div>
                    <div class="w-8 h-8 rounded-full bg-blue-600 border-2 border-white/50 flex items-center justify-center text-white text-xs font-bold">M</div>
                </div>
                <p class="text-white/60 text-sm">Dikelola oleh Tim Admin Desa</p>
            </div>
        </div>
    </div>

    <!-- ====== RIGHT: LOGIN FORM ====== -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 px-6 py-12 lg:px-16">
        <div class="login-card w-full max-w-md">

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-2xl px-8 py-10 border border-gray-100">

                <!-- Logo + Title -->
                <div class="text-center mb-8 fade-up">
                    @php
                        use Illuminate\Support\Facades\Storage;
                        $loginSetting = \App\Models\SiteSetting::getSetting();
                    @endphp
                    @if($loginSetting->logo)
                        <img src="{{ Storage::url($loginSetting->logo) }}"
                             alt="Logo Desa"
                             class="h-12 md:h-14 lg:h-16 w-auto object-contain mx-auto mb-4 drop-shadow-md">
                    @else
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-blue-400 flex items-center justify-center mx-auto mb-5 shadow-lg shadow-blue-200">
                            <span class="text-white font-extrabold text-xl">DS</span>
                        </div>
                    @endif
                    <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">Admin Desa Sudimoro</h1>
                    <p class="text-gray-400 text-sm mt-1.5">Login ke dashboard</p>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                <div class="mb-5 p-4 bg-red-50 border border-red-200 rounded-xl fade-up-2">
                    <div class="flex items-start gap-3">
                        <svg class="w-4 h-4 text-red-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>
                            @foreach ($errors->all() as $error)
                                <p class="text-red-600 text-sm font-medium">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Session Status -->
                @if (session('status'))
                <div class="mb-5 p-4 bg-green-50 border border-green-200 rounded-xl fade-up-2">
                    <p class="text-green-700 text-sm font-medium">{{ session('status') }}</p>
                </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5 fade-up-2">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-input @error('email') border-red-400 @enderror"
                            placeholder="admin@sudimoro.id"
                            required
                            autofocus
                            autocomplete="username">
                    </div>

                    <!-- Password -->
                    <div x-data="{ show: false }">
                        <label for="password" class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Password</label>
                        <div class="relative">
                            <input
                                :type="show ? 'text' : 'password'"
                                id="password"
                                name="password"
                                class="form-input pr-12 @error('password') border-red-400 @enderror"
                                placeholder="••••••••"
                                required
                                autocomplete="current-password">
                            <button type="button" @click="show = !show"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors p-1">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 4.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary focus:ring-offset-0 transition-all">
                            <span class="text-sm text-gray-500 group-hover:text-gray-700 transition-colors">Ingat saya</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="fade-up-3 pt-1">
                        <button type="submit" id="login-btn" class="btn-login">
                            <span class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                Masuk ke Dashboard
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Footer note -->
                <p class="text-center text-xs text-gray-400 mt-6">
                    Hanya admin yang berwenang yang dapat mengakses sistem ini.
                </p>
            </div>

            <!-- Bottom branding -->
            <p class="text-center text-gray-400 text-xs mt-5">
                &copy; {{ date('Y') }} UMKM Desa Sudimoro &mdash; Semua hak dilindungi
            </p>
        </div>
    </div>

</div>

</body>
</html>
