<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Storage;

use Alert;

class KeuanganController extends Controller
{
    /**
     * Menampilkan daftar keuangan UMKM berdasarkan user login.
     */
    public function index()
    {
        $title = 'Daftar Keuangan';
        $uang = Keuangan::where('id_umkm', auth()->id())->get()->map(function ($item) {
            $item->tanggal = \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d');
            return $item;
        });

        return view('umkm.keuangan.index', compact('uang', 'title'));
    }

    /**
     * Menampilkan menu keuangan untuk admin.
     */
    public function menu()
    {
        $uang = Keuangan::Where('status_verifikasi', 'Menunggu')->get()->map(function ($item) {
            $item->tanggal = \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d');
            return $item;
        });
        return view('masterAdmin.keuangan.menu', compact('uang'));
    }

    /**
     * Menampilkan daftar data keuangan yang perlu diverifikasi oleh admin.
     */
    public function verifikasiMenu()
    {
        $title = 'Verifikasi Keuangan';
        $uang = Keuangan::where('status_verifikasi', 'Menunggu')->get()->map(function ($item) {
            $item->tanggal = \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d');
            return $item;
        });

        return view('masterAdmin.keuangan.verifikasi', compact('uang', 'title'));
    }

    /**
     * Menampilkan form tambah data keuangan.
     */
    public function create()
    {
        $title = 'Tambahkan Keuangan';
        return view('umkm.keuangan.create', compact('title'));
    }

    /**
     * Menyimpan data keuangan baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'nullable|date',
            'income' => 'required|integer',
            'outcome' => 'required|integer',
            'bukti_transaksi' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $validatedData['tanggal'] = $validatedData['tanggal'] ?? now()->format('Y-m-d');
        $validatedData['profit_loss'] = $validatedData['income'] - $validatedData['outcome'];
        $validatedData['id_umkm'] = auth()->id();
        $validatedData['status_verifikasi'] = 'Menunggu';

        if ($request->hasFile('bukti_transaksi')) {
            $validatedData['bukti_transaksi'] = $request->file('bukti_transaksi')->store('keuangan', 'public');
        }

        Keuangan::create($validatedData);

        Alert::success('Sukses', "Data Berhasil Ditambahkan")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Menampilkan detail data keuangan.
     */
    public function show($id)
    {
        $uang = Keuangan::where('id', $id)->firstOrFail();
        $uang->tanggal = \Carbon\Carbon::parse($uang->tanggal)->format('Y-m-d');
        return view('masterAdmin.keuangan.show', compact('uang'));
    }

    /**
     * Menampilkan form edit data keuangan.
     */
    public function edit($id)
    {
        $uang = Keuangan::where('id', $id)->where('id_umkm', auth()->id())->firstOrFail();
        $uang->tanggal = \Carbon\Carbon::parse($uang->tanggal)->format('Y-m-d');
        return view('umkm.keuangan.edit', compact('uang'));
    }

    /**
     * Memperbarui data keuangan.
     */
    public function update(Request $request, $id)
    {
        $uang = Keuangan::where('id', $id)->where('id_umkm', auth()->id())->firstOrFail();

        $validatedData = $request->validate([
            'tanggal' => 'nullable|date',
            'income' => 'required|integer',
            'outcome' => 'required|integer',
            'bukti_transaksi' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $validatedData['tanggal'] = $validatedData['tanggal'] ?? $uang->tanggal;
        $validatedData['tanggal'] = \Carbon\Carbon::parse($validatedData['tanggal'])->format('Y-m-d');
        $validatedData['profit_loss'] = $validatedData['income'] - $validatedData['outcome'];

        if ($request->hasFile('bukti_transaksi')) {
            if ($uang->bukti_transaksi && Storage::disk('public')->exists($uang->bukti_transaksi)) {
                Storage::disk('public')->delete($uang->bukti_transaksi);
            }
            $validatedData['bukti_transaksi'] = $request->file('bukti_transaksi')->store('keuangan', 'public');
        }

        $uang->update($validatedData);

        Alert::success('Sukses', "Data Berhasil Diperbarui")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Menghapus atau memverifikasi data keuangan.
     */
    public function destroy(Request $request, $id)
    {
        $uang = Keuangan::findOrFail($id);

        if ($request->action === 'tolak') {
            $uang->status_verifikasi = 'Ditolak';
            $uang->save();

            Alert::success('Sukses', "Laporan Keuangan Ditolak")->autoClose(1000);
            return redirect()->back()->with('success', 'Laporan keuangan berhasil ditolak.');
        }

        if ($request->action === 'setuju') {
            $uang->status_verifikasi = 'Disetujui';
            $uang->save();

            Alert::success('Sukses', "Laporan Keuangan Disetujui")->autoClose(1000);
            return redirect()->back()->with('success', 'Laporan keuangan berhasil disetujui.');
        }

        if ($uang->bukti_transaksi && Storage::disk('public')->exists($uang->bukti_transaksi)) {
            Storage::disk('public')->delete($uang->bukti_transaksi);
        }

        $uang->delete();
        Alert::success('Sukses', "Data Berhasil Dihapus")->autoClose(1000);
        return redirect()->route('Umkmkeuangan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
