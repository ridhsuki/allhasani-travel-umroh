<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Informasi Perusahaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data"
                class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                @csrf
                @method('PUT')

                <div class="p-6 space-y-8">

                    <div class="border-b border-gray-100 pb-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="bg-indigo-100 p-2 rounded-lg text-indigo-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Identitas & Logo</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="company_name" value="Nama Travel" />
                                <x-text-input id="company_name" name="company_name" type="text"
                                    class="mt-1 block w-full" :value="old('company_name', $setting->company_name)" required />
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="logo" value="Logo Perusahaan" />
                                <div class="mt-1 flex items-center gap-4">
                                    @if ($setting->logo_path)
                                        <div class="shrink-0">
                                            <img src="{{ $setting->logo_url }}" alt="Current Logo"
                                                class="h-16 w-16 object-contain border border-gray-200 p-1 rounded-lg bg-gray-50">
                                        </div>
                                    @endif
                                    <div class="w-full">
                                        <input id="logo" name="logo" type="file"
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition" />
                                        <p class="text-xs text-gray-500 mt-1">Format: PNG, JPG, WEBP (Max 2MB)</p>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-100 pb-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="bg-green-100 p-2 rounded-lg text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Kontak & Alamat</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="wa_number_indo" value="WhatsApp (Indonesia)" />
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 font-bold">+</span>
                                    </div>
                                    <x-text-input id="wa_number_indo" name="wa_number_indo" type="text"
                                        class="block w-full pl-7" :value="old('wa_number_indo', $setting->wa_number_indo)" placeholder="6281xxxx" required />
                                </div>
                                <x-input-error :messages="$errors->get('wa_number_indo')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="wa_number_saudi" value="WhatsApp (Saudi) - Opsional" />
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 font-bold">+</span>
                                    </div>
                                    <x-text-input id="wa_number_saudi" name="wa_number_saudi" type="text"
                                        class="block w-full pl-7" :value="old('wa_number_saudi', $setting->wa_number_saudi)" placeholder="9665xxxx" />
                                </div>
                                <x-input-error :messages="$errors->get('wa_number_saudi')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <x-input-label for="email_primary" value="Email Utama" />
                                <x-text-input id="email_primary" name="email_primary" type="email"
                                    class="mt-1 block w-full" :value="old('email_primary', $setting->email_primary)" required />
                                <x-input-error :messages="$errors->get('email_primary')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="email_secondary" value="Email Kedua - Opsional" />
                                <x-text-input id="email_secondary" name="email_secondary" type="email"
                                    class="mt-1 block w-full" :value="old('email_secondary', $setting->email_secondary)" />
                                <x-input-error :messages="$errors->get('email_secondary')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="address_head_office" value="Alamat Kantor Pusat" />
                                <textarea id="address_head_office" name="address_head_office" rows="3"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('address_head_office', $setting->address_head_office) }}</textarea>
                                <x-input-error :messages="$errors->get('address_head_office')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="operational_hours" value="Jam Operasional" />
                                <x-text-input id="operational_hours" name="operational_hours" type="text"
                                    class="mt-1 block w-full" :value="old('operational_hours', $setting->operational_hours)"
                                    placeholder="Senin - Jumat, 08:00 - 17:00" />
                                <x-input-error :messages="$errors->get('operational_hours')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-100 pb-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Media Sosial</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @php $socials = $setting->social_media ?? []; @endphp

                            <div>
                                <x-input-label for="fb" value="Facebook URL" />
                                <div class="relative mt-1">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-blue-600">
                                        <i class="fab fa-facebook"></i> <svg class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.791-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="fb" name="social_media[facebook]" type="url"
                                        class="block w-full pl-10" :value="old('social_media.facebook', $socials['facebook'] ?? '')"
                                        placeholder="https://facebook.com/..." />
                                </div>
                                <x-input-error :messages="$errors->get('social_media.facebook')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="ig" value="Instagram URL" />
                                <div class="relative mt-1">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-pink-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="ig" name="social_media[instagram]" type="url"
                                        class="block w-full pl-10" :value="old('social_media.instagram', $socials['instagram'] ?? '')"
                                        placeholder="https://instagram.com/..." />
                                </div>
                                <x-input-error :messages="$errors->get('social_media.instagram')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="yt" value="Youtube URL" />
                                <div class="relative mt-1">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-red-600">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="yt" name="social_media[youtube]" type="url"
                                        class="block w-full pl-10" :value="old('social_media.youtube', $socials['youtube'] ?? '')"
                                        placeholder="https://youtube.com/..." />
                                </div>
                                <x-input-error :messages="$errors->get('social_media.youtube')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="tt" value="TikTok URL" />
                                <div class="relative mt-1">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-800">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.49-3.35-3.98-5.6-.48-2.21.08-4.55 1.56-6.21 1.64-1.96 4.25-2.72 6.73-1.88v4c-1.19-.66-2.74-.2-3.81.61-1.06.8-1.58 2.13-1.34 3.44.22 1.16 1.1 2.16 2.22 2.55 1.14.41 2.45.16 3.42-.56 1-.72 1.56-1.89 1.56-3.13V4.54c1.38 0 2.75-.01 4.12.01-.05 1.15.5 2.26 1.45 2.92.74.52 1.65.75 2.54.83V.02h-3.91z" />
                                        </svg>
                                    </div>
                                    <x-text-input id="tt" name="social_media[tiktok]" type="url"
                                        class="block w-full pl-10" :value="old('social_media.tiktok', $socials['tiktok'] ?? '')"
                                        placeholder="https://tiktok.com/..." />
                                </div>
                                <x-input-error :messages="$errors->get('social_media.tiktok')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-100 pb-8">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="bg-yellow-100 p-2 rounded-lg text-yellow-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">Statistik (Angka)</h3>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                            <div>
                                <x-input-label for="stats_jamaah" value="Total Jamaah" />
                                <div class="relative mt-1">
                                    <x-text-input id="stats_jamaah" name="stats[jamaah]" type="number"
                                        class="block w-full pr-10" :value="old('stats.jamaah', $setting->stats['jamaah'] ?? 0)" required />
                                </div>
                                <x-input-error :messages="$errors->get('stats.jamaah')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="stats_satisfaction" value="Kepuasan (%)" />
                                <div class="relative mt-1">
                                    <x-text-input id="stats_satisfaction" name="stats[satisfaction]" type="number"
                                        class="block w-full pr-10" :value="old('stats.satisfaction', $setting->stats['satisfaction'] ?? 98)" required max="100" />
                                </div>
                                <x-input-error :messages="$errors->get('stats.satisfaction')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="stats_experience" value="Pengalaman (tahun)" />
                                <div class="relative mt-1">
                                    <x-text-input id="stats_experience" name="stats[experience]" type="number"
                                        class="block w-full pr-14" :value="old('stats.experience', $setting->stats['experience'] ?? 5)" required />
                                </div>
                                <x-input-error :messages="$errors->get('stats.experience')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="stats_departures" value="Keberangkatan" />
                                <x-text-input id="stats_departures" name="stats[departures]" type="number"
                                    class="mt-1 block w-full" :value="old('stats.departures', $setting->stats['departures'] ?? 100)" required />
                                <x-input-error :messages="$errors->get('stats.departures')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div x-data="{
                        branches: {{ json_encode(old('branches', $setting->branches ?? [])) }},
                        addBranch() {
                            this.branches.push({ name: '', address: '' });
                        },
                        removeBranch(index) {
                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: 'Data cabang ini akan dihapus dari daftar (belum disimpan ke database).',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.branches.splice(index, 1);
                                    Swal.fire({
                                        title: 'Terhapus!',
                                        text: 'Baris cabang telah dihapus.',
                                        icon: 'success',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                }
                            });
                        }
                    }">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center gap-2">
                                <div class="bg-purple-100 p-2 rounded-lg text-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900">Kantor Cabang</h3>
                            </div>

                            <button type="button" @click="addBranch()"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah Cabang
                            </button>
                        </div>

                        <div class="space-y-4">
                            <template x-for="(branch, index) in branches" :key="index">
                                <div x-transition
                                    class="relative bg-gray-50 border border-gray-200 p-5 rounded-xl shadow-sm hover:shadow-md transition">

                                    <button type="button" @click="removeBranch(index)"
                                        class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition duration-200"
                                        title="Hapus Cabang">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                                        <div class="md:col-span-4">
                                            <x-input-label value="Nama Cabang" class="mb-1" />
                                            <x-text-input type="text" x-bind:name="'branches[' + index + '][name]'"
                                                x-model="branch.name" class="block w-full"
                                                placeholder="Contoh: Cabang Surabaya" required />
                                            @if ($errors->has('branches.*.name'))
                                                <p class="text-sm text-red-600 space-y-1 mt-2"
                                                    x-show="$el.dataset.errorKey === index.toString()"
                                                    :data-error-key="index">
                                                    {{ $errors->first('branches.' . $loop->index . '.name') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="md:col-span-8 pr-8">
                                            <x-input-label value="Alamat Lengkap" class="mb-1" />
                                            <x-text-input type="text"
                                                x-bind:name="'branches[' + index + '][address]'"
                                                x-model="branch.address" class="block w-full"
                                                placeholder="Alamat lengkap..." required />
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <div x-show="branches.length === 0" x-transition
                            class="text-center py-8 border-2 border-dashed border-gray-300 rounded-lg text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-2 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <p>Belum ada kantor cabang yang ditambahkan.</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                        <x-primary-button class="px-8 py-3 text-base">
                            {{ __('Simpan Perubahan') }}
                        </x-primary-button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
