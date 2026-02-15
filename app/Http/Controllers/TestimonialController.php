<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('testimonials', 'public');
        }

        unset($data['photo']);

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Testimonial::create($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($testimonial->photo_path) {
                Storage::disk('public')->delete($testimonial->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('testimonials', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $testimonial->update($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo_path) {
            Storage::disk('public')->delete($testimonial->photo_path);
        }

        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimoni dihapus');
    }
}
