<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(StorePackageRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        Package::create($data);

        return redirect()->route('packages.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(UpdatePackageRequest $request, Package $package)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $package->update($data);

        return redirect()->route('packages.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Paket berhasil dihapus!');
    }
}
