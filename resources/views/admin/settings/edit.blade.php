<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Informasi Perusahaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data"
                class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                @csrf
                @method('PUT')

                <div class="p-6 space-y-8">

                    <div class="border-b pb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Identitas & Logo</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="company_name" value="Nama Travel" />
                                <x-text-input id="company_name" name="company_name" type="text"
                                    class="mt-1 block w-full" :value="old('company_name', $setting->company_name)" required />
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="logo" value="Logo Perusahaan" />
                                @if ($setting->logo_path)
                                    <div class="mt-2 mb-2">
                                        <img src="{{ $setting->logo_url }}" alt="Current Logo"
                                            class="h-16 w-auto object-contain border p-1 rounded">
                                    </div>
                                @endif
                                <input id="logo" name="logo" type="file"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="border-b pb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Kontak & Alamat Pusat</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-input-label for="wa_number_indo" value="WhatsApp (Indonesia)" />
                                <x-text-input id="wa_number_indo" name="wa_number_indo" type="text"
                                    class="mt-1 block w-full" :value="old('wa_number_indo', $setting->wa_number_indo)" placeholder="6281xxxx" required />
                            </div>
                            <div>
                                <x-input-label for="wa_number_saudi" value="WhatsApp (Saudi) - Opsional" />
                                <x-text-input id="wa_number_saudi" name="wa_number_saudi" type="text"
                                    class="mt-1 block w-full" :value="old('wa_number_saudi', $setting->wa_number_saudi)" placeholder="9665xxxx" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <x-input-label for="email_primary" value="Email Utama" />
                                <x-text-input id="email_primary" name="email_primary" type="email"
                                    class="mt-1 block w-full" :value="old('email_primary', $setting->email_primary)" required />
                            </div>
                            <div>
                                <x-input-label for="email_secondary" value="Email Kedua - Opsional" />
                                <x-text-input id="email_secondary" name="email_secondary" type="email"
                                    class="mt-1 block w-full" :value="old('email_secondary', $setting->email_secondary)" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="address_head_office" value="Alamat Kantor Pusat" />
                                <textarea id="address_head_office" name="address_head_office" rows="3"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address_head_office', $setting->address_head_office) }}</textarea>
                            </div>
                            <div>
                                <x-input-label for="operational_hours" value="Jam Operasional" />
                                <x-text-input id="operational_hours" name="operational_hours" type="text"
                                    class="mt-1 block w-full" :value="old('operational_hours', $setting->operational_hours)"
                                    placeholder="Senin - Jumat, 08:00 - 17:00" />
                            </div>
                        </div>
                    </div>

                    <div class="border-b pb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Media Sosial (Link URL)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @php
                                $socials = $setting->social_media ?? [];
                            @endphp
                            <div>
                                <x-input-label for="fb" value="Facebook URL" />
                                <x-text-input id="fb" name="social_media[facebook]" type="url"
                                    class="mt-1 block w-full" :value="old('social_media.facebook', $socials['facebook'] ?? '')" />
                            </div>
                            <div>
                                <x-input-label for="ig" value="Instagram URL" />
                                <x-text-input id="ig" name="social_media[instagram]" type="url"
                                    class="mt-1 block w-full" :value="old('social_media.instagram', $socials['instagram'] ?? '')" />
                            </div>
                            <div>
                                <x-input-label for="yt" value="Youtube URL" />
                                <x-text-input id="yt" name="social_media[youtube]" type="url"
                                    class="mt-1 block w-full" :value="old('social_media.youtube', $socials['youtube'] ?? '')" />
                            </div>
                            <div>
                                <x-input-label for="tt" value="TikTok URL" />
                                <x-text-input id="tt" name="social_media[tiktok]" type="url"
                                    class="mt-1 block w-full" :value="old('social_media.tiktok', $socials['tiktok'] ?? '')" />
                            </div>
                        </div>
                    </div>

                    <div x-data="{ branches: {{ json_encode(old('branches', $setting->branches ?? [])) }} }">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Kantor Cabang</h3>
                            <button type="button" @click="branches.push({name: '', address: ''})"
                                class="text-sm bg-indigo-50 text-indigo-700 px-3 py-1 rounded hover:bg-indigo-100 font-semibold">
                                + Tambah Cabang
                            </button>
                        </div>

                        <template x-for="(branch, index) in branches" :key="index">
                            <div class="flex gap-4 mb-4 items-start bg-gray-50 p-4 rounded-lg">
                                <div class="flex-1">
                                    <x-input-label value="Nama Cabang" />
                                    <input type="text" :name="'branches[' + index + '][name]'" x-model="branch.name"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        placeholder="Contoh: Cabang Surabaya" required>
                                </div>
                                <div class="flex-[2]">
                                    <x-input-label value="Alamat Cabang" />
                                    <input type="text" :name="'branches[' + index + '][address]'"
                                        x-model="branch.address"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                        placeholder="Alamat lengkap..." required>
                                </div>
                                <div class="mt-7">
                                    <button type="button" @click="branches.splice(index, 1)"
                                        class="text-red-500 hover:text-red-700 font-bold">
                                        &times;
                                    </button>
                                </div>
                            </div>
                        </template>

                        <div x-show="branches.length === 0" class="text-gray-500 italic text-sm">
                            Tidak ada kantor cabang.
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
