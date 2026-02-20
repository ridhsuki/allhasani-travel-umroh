<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Paket Umroh') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('packages.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Nama Paket')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name')" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="price" :value="__('Harga (Rupiah)')" />
                            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"
                                :value="old('price')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="badge" :value="__('Badge Kategori')" />
                            <select name="badge" id="badge"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">-- Pilih Badge (Opsional) --</option>
                                <option value="populer">Populer</option>
                                <option value="rekomendasi">Rekomendasi</option>
                                <option value="eksklusif">Eksklusif</option>
                                <option value="hemat">Hemat</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('badge')" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="duration_days" :value="__('Durasi (Hari)')" />
                            <x-text-input id="duration_days" name="duration_days" type="number"
                                class="mt-1 block w-full" :value="old('duration_days')" required />
                        </div>
                        <div>
                            <x-input-label for="max_pax" :value="__('Maksimal Jamaah')" />
                            <x-text-input id="max_pax" name="max_pax" type="number" class="mt-1 block w-full"
                                :value="old('max_pax')" required />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="features" :value="__('Fasilitas / Deskripsi (Satu item per baris)')" />
                        <textarea id="features" name="features" rows="5"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Tiket Pesawat PP&#10;Hotel Bintang 5&#10;Makan 3x Sehari" required>{{ old('features') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('features')" />
                    </div>

                    <div>
                        <x-input-label for="bonus" :value="__('Bonus (Opsional)')" />
                        <x-text-input id="bonus" name="bonus" type="text" class="mt-1 block w-full"
                            :value="old('bonus')" placeholder="Gratis City Tour Turki" />
                    </div>
                    <div class="flex items-center mt-4">
                        <input id="is_active" name="is_active" type="checkbox" value="1" checked
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            {{ __('Tampilkan paket ini di Landing Page?') }}
                        </label>
                        <x-input-error class="mt-2" :messages="$errors->get('is_active')" />
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Simpan Paket') }}</x-primary-button>
                        <a href="{{ route('packages.index') }}" class="text-gray-600 hover:text-gray-900">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
