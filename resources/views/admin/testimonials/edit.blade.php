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
                        </div>

                        <div>
                            <x-input-label for="title" value="Title / Paket" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title', $testimonial->title)" required />
                        </div>

                        <div>
                            <x-input-label for="content" value="Isi Testimoni" />
                            <textarea name="content" id="content" rows="4"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required>{{ old('content', $testimonial->content) }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="photo" value="Foto Jamaah" />

                            <div class="mt-2 flex items-center space-x-6">

                                @if ($testimonial->photo_url)
                                    <img src="{{ $testimonial->photo_url }}"
                                        class="h-20 w-20 rounded-full object-cover border" alt="Foto Lama">
                                @endif

                                <label
                                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-700 text-sm font-medium rounded-md hover:bg-indigo-100 transition">
                                    Ganti Foto
                                    <input type="file" name="photo" class="hidden" accept="image/*">
                                </label>
                            </div>

                            <p class="mt-2 text-xs text-gray-500">
                                Kosongkan jika tidak ingin mengganti foto.
                            </p>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="is_active" class="ml-2 text-sm text-gray-600">
                                Tampilkan di Landing Page?
                            </label>
                        </div>

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
</x-app-layout>
