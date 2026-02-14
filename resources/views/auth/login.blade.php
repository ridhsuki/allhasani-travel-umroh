<x-guest-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap"
            rel="stylesheet">
        <style>
            :root {
                --primary-green: #059669;
                --secondary-green: #10B981;
                --accent-green: #34D399;
                --light-green: #D1FAE5;
                --white: #FFFFFF;
                --text-gray: #6B7280;
                --text-dark: #1F2937;
                --medium-gray: #E5E7EB;
                --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            body {
                font-family: 'Inter', sans-serif;
                background-color: var(--light-green);
            }

            .login-card-header {
                text-align: center;
                margin-bottom: 2rem;
            }

            .brand-logo {
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, var(--primary-green), var(--accent-green));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--white);
                font-size: 26px;
                margin: 0 auto 15px;
                box-shadow: 0 5px 15px rgba(5, 150, 105, 0.3);
            }

            .brand-text {
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-size: 24px;
                font-weight: 800;
                color: var(--primary-green);
            }

            .brand-text span {
                color: var(--secondary-green);
            }

            /* Custom Input Styling matching Landing Page */
            .input-group {
                position: relative;
                margin-bottom: 1.25rem;
            }

            .input-icon {
                position: absolute;
                left: 15px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--accent-green);
                font-size: 18px;
                z-index: 10;
            }

            .custom-input {
                width: 100%;
                padding: 14px 20px 14px 45px !important;
                /* Padding kiri besar untuk icon */
                border: 2px solid var(--medium-gray) !important;
                border-radius: 12px !important;
                font-family: 'Inter', sans-serif;
                transition: var(--transition);
                color: var(--text-dark);
            }

            .custom-input:focus {
                outline: none;
                border-color: var(--accent-green) !important;
                box-shadow: 0 0 0 4px rgba(52, 211, 153, 0.1) !important;
            }

            /* Button Styling matching Landing Page */
            .btn-primary-custom {
                background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
                color: var(--white);
                padding: 14px;
                border-radius: 50px;
                font-weight: 600;
                transition: var(--transition);
                border: none;
                box-shadow: 0 5px 15px rgba(5, 150, 105, 0.3);
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }

            .btn-primary-custom:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
            }

            /* Checkbox Customization */
            .custom-checkbox:checked {
                background-color: var(--primary-green);
                border-color: var(--primary-green);
            }

            .custom-link {
                color: var(--primary-green);
                transition: var(--transition);
            }

            .custom-link:hover {
                color: var(--dark-green);
                text-decoration: underline;
            }
        </style>
    @endpush

    <div class="w-full max-w-md mx-auto">
        <div class="login-card-header">
            <h2 class="brand-text">{{ $site_settings->company_name }}</h2>
            <p class="text-gray-500 mt-2 text-sm">Masuk untuk mengelola perjalanan ibadah Anda</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <i class="fas fa-envelope input-icon"></i>
                <x-text-input id="email" class="custom-input block w-full" type="email" name="email"
                    :value="old('email')" placeholder="Alamat Email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
            </div>

            <div class="input-group">
                <i class="fas fa-lock input-icon"></i>
                <x-text-input id="password" class="custom-input block w-full" type="password" name="password"
                    placeholder="Kata Sandi" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
            </div>

            <div class="flex items-center justify-between mt-4 mb-6">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500 custom-checkbox"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm custom-link font-medium" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="btn-primary-custom text-base uppercase tracking-wider">
                {{ __('Masuk Sekarang') }} <i class="fas fa-arrow-right ml-1"></i>
            </button>

            <div class="text-center mt-6 text-sm text-gray-500">
                Belum punya akun? <a href="{{ route('register') }}" class="custom-link font-semibold">Daftar disini</a>
            </div>
        </form>
    </div>
</x-guest-layout>
