<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Testimoni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('testimonials.update', $testimonial) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="name" value="Nama Jamaah" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $testimonial->name)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="title" value="Title / Paket" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title', $testimonial->title)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="content" value="Isi Testimoni" />
                            <textarea name="content" id="content" rows="4"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>{{ old('content', $testimonial->content) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div>
                            <x-input-label for="photo" value="Foto Jamaah" />

                            <div
                                class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-400 transition">
                                <div class="space-y-2 text-center">
                                    <div class="flex justify-center">
                                        <img id="preview" src="{{ $testimonial->photo_url ?? '#' }}"
                                            class="{{ $testimonial->photo_url ? '' : 'hidden' }} h-24 w-24 rounded-full object-cover border"
                                            alt="Preview">
                                    </div>

                                    <div class="text-sm text-gray-600">
                                        <label for="photo"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Ganti foto</span>
                                            <input id="photo" name="photo" type="file" class="sr-only"
                                                accept="image/*" onchange="previewImage(event)">
                                        </label>
                                        <p class="pl-1 inline">atau drag & drop</p>
                                    </div>

                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, JPEG (Max 2MB)<br>
                                        <span class="text-gray-400">(Biarkan kosong jika tidak ingin mengubah)</span>
                                    </p>
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="is_active" class="ml-2 text-sm text-gray-600">
                                Tampilkan di Landing Page?
                            </label>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('is_active')" />

                        <div class="flex justify-end">
                            <x-primary-button>
                                Update
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('preview');

                if (input.files && input.files[0]) {
                    preview.src = URL.createObjectURL(input.files[0]);
                    preview.classList.remove('hidden');
                }
            }
        </script>
    @endpush
</x-app-layout>
