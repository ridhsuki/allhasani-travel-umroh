<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-8">

                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                        Selamat Datang
                    </h3>

                    <p class="text-sm text-gray-600 mb-6">
                        Anda telah berhasil masuk ke panel admin.
                        Gunakan tombol di bawah ini untuk melihat tampilan landing page website.
                    </p>

                    <div>
                        <a href="{{ url('/') }}"
                            class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-medium rounded-md hover:bg-gray-800 transition duration-200">
                            Lihat Landing Page
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
