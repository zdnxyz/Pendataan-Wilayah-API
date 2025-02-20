<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Storage;
use Alert;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Keuangan';
        $uang = Keuangan::where('id_umkm', auth()->id())->get();

        return view('umkm.keuangan.index', compact('uang', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambahkan Keuangan';
        return view('umkm.keuangan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tahun' => 'required|integer',
            'bulan' => 'required|string',
            'income' => 'required|integer',
            'outcome' => 'required|integer',
            'bukti_transaksi' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $uang = new Keuangan;
        $uang->bulan = $request->bulan;
        $uang->tahun = $request->tahun;
        $uang->income = $request->income;
        $uang->outcome = $request->outcome;
        $uang->profit_loss = $request->income - $request->outcome;
        $uang->id_umkm = auth()->id();

        if ($request->hasFile('bukti_transaksi')) {
            $path = $request->file('bukti_transaksi')->store('keuangan', 'public');
            $uang->bukti_transaksi = $path;
        }

        $uang->save();

        Alert::success('Sukses', "Data Berhasil Ditambahkan")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $uang = Keuangan::findOrFail($id);
        return view('umkm.keuangan.show', compact('uang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $uang = Keuangan::findOrFail($id);
        return view('umkm.keuangan.edit', compact('uang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $uang = Keuangan::findOrFail($id);
        
        $validate = $request->validate([
            'tahun' => 'required|integer',
            'bulan' => 'required|string',
            'income' => 'required|integer',
            'outcome' => 'required|integer',
            'bukti_transaksi' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $uang->bulan = $request->bulan;
        $uang->tahun = $request->tahun;
        $uang->income = $request->income;
        $uang->outcome = $request->outcome;
        $uang->profit_loss = $request->income - $request->outcome;

        if ($request->hasFile('bukti_transaksi')) {
            if ($uang->bukti_transaksi) {
                Storage::disk('public')->delete($uang->bukti_transaksi);
            }
            $path = $request->file('bukti_transaksi')->store('keuangan', 'public');
            $uang->bukti_transaksi = $path;
        }

        $uang->save();

        Alert::success('Sukses', "Data Berhasil Diperbarui")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $uang = Keuangan::findOrFail($id);

        if ($uang->bukti_transaksi) {
            Storage::disk('public')->delete($uang->bukti_transaksi);
        }

        $uang->delete();
        Alert::success('Sukses', "Data Berhasil Dihapus")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
