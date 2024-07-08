<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dashboardController extends Controller
{
    /**s
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'mobils' => Mobil::with(['rentals', 'feedback'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'plat_mobil' => 'required|string|unique:mobils|max:10',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'status' => 'required|in:available,rented',
            'price_per_day' => 'required|numeric|min:0',
            'image_url' => 'image|file|max:2048',
        ]);

        // Store the image
        if ($request->file('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('mobil-images', 'public');
        }

        // Create the new mobil record
        Mobil::create($validated);

        return redirect('/dashboard')->with('success', 'Mobil berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobils)
    {
        return view('admin.show', [
            'mobils' => $mobils
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('admin.editmobil', [
            'mobil' => $mobil,
        ]);
    }

    // public function update(Request $request, Mobil $mobil)
    // {
    //     $rules = [
    //         'plat_mobil' => 'required|string|unique:mobils,plat_mobil,' . $mobil->plat_mobil . ',plat_mobil|max:10',
    //         'brand' => 'required|string|max:255',
    //         'model' => 'required|string|max:255',
    //         'year' => 'required|integer|min:1900|max:' . date('Y'),
    //         'status' => 'required|in:available,rented',
    //         'price_per_day' => 'required|numeric|min:0', // Validasi harga per hari
    //     ];

    //     $validated = $request->validate($rules);

    //     $mobil->update($validated);

    //     return redirect('/dashboard')->with('success', 'Mobil berhasil diperbarui');
    // }

    public function update(Request $request, Mobil $mobil)
    {
        // Validate the incoming request
        $rules = [
            'plat_mobil' => 'required|string|unique:mobils,plat_mobil,' . $mobil->plat_mobil . ',plat_mobil|max:10',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'status' => 'required|in:available,rented',
            'price_per_day' => 'required|numeric|min:0',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validated = $request->validate($rules);

        if ($request->hasFile('image_url')) {
            // Delete the old image if exists
            if ($mobil->image_url) {
                Storage::delete('public/' . $mobil->image_url);
            }

            // Store the new image
            $validated['image_url'] = $request->file('image_url')->store('mobil-images', 'public');
        }

        // Update the mobil record
        $mobil->update($validated);

        return redirect('/dashboard')->with('success', 'Mobil berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Mobil $mobil)
    // {
    //     Mobil::destroy($mobil->plat_mobil);
    //     return redirect('/dashboard')->with('success', 'Mobil berhasil dihapus');
    // }
    public function destroy($plat_mobil)
    {
        Mobil::where('plat_mobil', $plat_mobil)->delete();
        return redirect('/dashboard')->with('success', 'Mobil berhasil dihapus');
    }
}
