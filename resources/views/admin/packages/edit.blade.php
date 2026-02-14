<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Paket: ') }} {{ $package->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('packages.update', $package) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nama Paket')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $package->name)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="price" :value="__('Harga (Rupiah)')" />
                            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full"
                                :value="old('price', $package->price)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="badge" :value="__('Badge Kategori')" />
                            <select name="badge" id="badge"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">-- Tidak ada Badge --</option>
                                <option value="populer"
                                    {{ old('badge', $package->badge) == 'populer' ? 'selected' : '' }}>Populer</option>
                                <option value="rekomendasi"
                                    {{ old('badge', $package->badge) == 'rekomendasi' ? 'selected' : '' }}>Rekomendasi
                                </option>
                                <option value="eksklusif"
                                    {{ old('badge', $package->badge) == 'eksklusif' ? 'selected' : '' }}>Eksklusif
                                </option>
                                <option value="hemat" {{ old('badge', $package->badge) == 'hemat' ? 'selected' : '' }}>
                                    Hemat</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('badge')" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="duration_days" :value="__('Durasi (Hari)')" />
                            <x-text-input id="duration_days" name="duration_days" type="number"
                                class="mt-1 block w-full" :value="old('duration_days', $package->duration_days)" required />
                        </div>
                        <div>
                            <x-input-label for="max_pax" :value="__('Maksimal Jamaah')" />
                            <x-text-input id="max_pax" name="max_pax" type="number" class="mt-1 block w-full"
                                :value="old('max_pax', $package->max_pax)" required />
                        </div>
                    </div>

                    @php
                        $featuresString = is_array($package->features)
                            ? implode("\n", $package->features)
                            : $package->features;
                    @endphp

                    <div>
                        <x-input-label for="features" :value="__('Fasilitas / Deskripsi (Satu item per baris)')" />
                        <textarea id="features" name="features" rows="6"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Tiket Pesawat PP&#10;Hotel Bintang 5" required>{{ old('features', $featuresString) }}</textarea>
                        <p class="text-sm text-gray-500 mt-1">Pisahkan setiap fasilitas dengan baris baru (Enter).</p>
                        <x-input-error class="mt-2" :messages="$errors->get('features')" />
                    </div>

                    <div>
                        <x-input-label for="bonus" :value="__('Bonus (Opsional)')" />
                        <x-text-input id="bonus" name="bonus" type="text" class="mt-1 block w-full"
                            :value="old('bonus', $package->bonus)" />
                    </div>

                    <div class="flex items-center gap-4 pt-4 border-t">
                        <x-primary-button>{{ __('Update Paket') }}</x-primary-button>
                        <a href="{{ route('packages.index') }}"
                            class="text-gray-600 hover:text-gray-900 font-medium text-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
