<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data keuangan untuk UMKM yang sedang login
        $keuangans = Keuangan::where('id_umkm', $request->user()->id)->get();

        // Kembalikan data dalam format JSON
        return response()->json([
            'status' => true,
            'data' => $keuangans,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input data
        $validator = Validator::make($request->all(), [
            'tanggal' => 'nullable|date',
            'income' => 'required|integer',
            'outcome' => 'required|integer',
            'bukti_transaksi' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()], 422);
        }

        // Ambil data validasi
        $data = $validator->validated();
        $data['tanggal'] = $data['tanggal'] ?? now()->format('Y-m-d');
        $data['profit_loss'] = $data['income'] - $data['outcome'];
        $data['id_umkm'] = $request->user()->id;
        $data['status_verifikasi'] = 'Menunggu'; // Set status verifikasi ke "Menunggu"

        // Jika ada file bukti transaksi, simpan file tersebut
        if ($request->hasFile('bukti_transaksi')) {
            $data['bukti_transaksi'] = $request->file('bukti_transaksi')->store('keuangan', 'public');
        }

        // Simpan data keuangan ke database
        $keuangan = Keuangan::create($data);

        // Kembalikan respons sukses
        return response()->json(['status' => true, 'message' => 'Data berhasil disimpan', 'data' => $keuangan], 201);
    }

    public function show(Request $request, $id)
    {
        // Ambil data keuangan berdasarkan id dan id_umkm pengguna yang sedang login
        $keuangan = Keuangan::where('id_umkm', $request->user()->id)->where('id', $id)->first();

        // Jika data tidak ditemukan
        if (!$keuangan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        // Kembalikan data keuangan dalam respons JSON
        return response()->json(['status' => true, 'data' => $keuangan]);
    }

    public function update(Request $request, $id)
    {
        // Ambil data keuangan berdasarkan id dan id_umkm pengguna yang sedang login
        $keuangan = Keuangan::where('id_umkm', $request->user()->id)->where('id', $id)->first();

        // Jika data tidak ditemukan
        if (!$keuangan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        // Validasi input data
        $validator = Validator::make($request->all(), [
            'tanggal' => 'nullable|date',
            'income' => 'required|integer',
            'outcome' => 'required|integer',
            'bukti_transaksi' => 'nullable|file|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()], 422);
        }

        // Ambil data validasi
        $data = $validator->validated();
        $data['tanggal'] = $data['tanggal'] ?? $keuangan->tanggal;
        $data['profit_loss'] = $data['income'] - $data['outcome'];

        // Jika ada file bukti transaksi baru, hapus file lama dan simpan file baru
        if ($request->hasFile('bukti_transaksi')) {
            if ($keuangan->bukti_transaksi && Storage::disk('public')->exists($keuangan->bukti_transaksi)) {
                Storage::disk('public')->delete($keuangan->bukti_transaksi);
            }
            $data['bukti_transaksi'] = $request->file('bukti_transaksi')->store('keuangan', 'public');
        }

        // Perbarui data keuangan
        $keuangan->update($data);

        // Kembalikan respons sukses
        return response()->json(['status' => true, 'message' => 'Data berhasil diperbarui', 'data' => $keuangan]);
    }

    public function destroy(Request $request, $id)
    {
        // Ambil data keuangan berdasarkan id dan id_umkm pengguna yang sedang login
        $keuangan = Keuangan::where('id_umkm', $request->user()->id)->where('id', $id)->first();

        // Jika data tidak ditemukan
        if (!$keuangan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        // Hapus file bukti transaksi jika ada
        if ($keuangan->bukti_transaksi && Storage::disk('public')->exists($keuangan->bukti_transaksi)) {
            Storage::disk('public')->delete($keuangan->bukti_transaksi);
        }

        // Hapus data keuangan
        $keuangan->delete();

        // Kembalikan respons sukses
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus']);
    }

    // Fungsi untuk memverifikasi status keuangan
    public function verify(Request $request, $id)
    {
        // Ambil data keuangan berdasarkan id dan id_umkm pengguna yang sedang login
        $keuangan = Keuangan::where('id_umkm', $request->user()->id)->where('id', $id)->first();

        // Jika data tidak ditemukan
        if (!$keuangan) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        // Verifikasi status keuangan (setuju atau tolak)
        if ($request->action === 'setuju') {
            $keuangan->status_verifikasi = 'Disetujui';
        } elseif ($request->action === 'tolak') {
            $keuangan->status_verifikasi = 'Ditolak';
        }

        $keuangan->save();

        // Kembalikan respons sukses
        return response()->json(['status' => true, 'message' => 'Status verifikasi berhasil diperbarui', 'data' => $keuangan]);
    }
}
