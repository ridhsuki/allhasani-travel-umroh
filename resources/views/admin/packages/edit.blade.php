<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Paket: ') }} {{ $package->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 border border-gray-100">

                <form id="package-form" method="POST" action="{{ route('packages.update', $package) }}"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nama / Judul Paket')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $package->name)" required autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="image" value="Gambar / Flyer" />
                        <div
                            class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-400 transition bg-gray-50">
                            <div class="space-y-2 text-center w-full">
                                <div class="flex justify-center mb-4">
                                    <img id="preview"
                                        src="{{ $package->image ? asset('storage/' . $package->image) : '#' }}"
                                        class="{{ $package->image ? '' : 'hidden' }} h-40 object-contain rounded-md border border-gray-200 shadow-sm"
                                        alt="Preview Gambar">
                                </div>

                                <div class="text-sm text-gray-600">
                                    <label for="image"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 px-3 py-2 border border-gray-300 shadow-sm">
                                        <span>Ganti Gambar</span>
                                        <input id="image" name="image" type="file" class="sr-only"
                                            accept="image/*" onchange="previewImage(event)">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Format: JPG, JPEG, PNG, WEBP (Max 2MB)</p>
                                <p class="text-xs text-gray-400 italic">(Biarkan kosong jika tidak ingin mengubah gambar
                                    lama)</p>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Deskripsi Paket')" />

                        <div id="editor"
                            class="mt-1 h-64 bg-white border border-gray-300 rounded-md shadow-sm pointer-events-auto">
                            {!! old('description', $package->description) !!}
                        </div>

                        <input type="hidden" name="description" id="description">
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="flex items-center mt-4 bg-gray-50 p-4 rounded-md border border-gray-200">
                        <input id="is_active" name="is_active" type="checkbox" value="1"
                            {{ old('is_active', $package->is_active) ? 'checked' : '' }}
                            class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer">
                        <label for="is_active" class="ml-3 block text-sm font-medium text-gray-900 cursor-pointer">
                            {{ __('Aktifkan Paket ini di Landing Page') }}
                        </label>
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('is_active')" />

                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('packages.index') }}"
                            class="text-gray-500 hover:text-gray-900 font-medium px-4 py-2 transition">Batal</a>
                        <x-primary-button class="px-6 py-3">{{ __('Update Paket') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Tuliskan deskripsi lengkap, fasilitas, jadwal, dll...',
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, 3, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        ['link'],
                        ['clean']
                    ]
                }
            });

            var form = document.getElementById('package-form');
            form.addEventListener('submit', function(e) {
                var description = document.getElementById('description');
                description.value = quill.root.innerHTML.trim();

                if (quill.getText().trim().length === 0) {
                    e.preventDefault();
                    alert('Deskripsi paket tidak boleh kosong!');
                }
            });

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
