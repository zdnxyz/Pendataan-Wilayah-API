<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KelengkapanLegalitasUsaha;
use Illuminate\Support\Facades\Storage;

class LegalitasUsahaController extends Controller
{
    // Mendapatkan data legalitas usaha
    public function index(Request $request)
    {
        $data = KelengkapanLegalitasUsaha::with('user')
            ->where('id_user', $request->user()->id)
            ->get();

        return response()->json($data);
    }

    // Memperbarui data legalitas usaha
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'badan_usaha' => 'required|in:PT (Perseroan Terbatas),CV (Persekutuan Komanditer)',
            'akta_pendirian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'NIB' => 'required|string:255',
            'SKDP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'NPWP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'SIUP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'TDP' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Mencari data legalitas usaha berdasarkan ID
        $legalUsaha = KelengkapanLegalitasUsaha::findOrFail($id);

        // Memperbarui data non-file
        $legalUsaha->badan_usaha = $request->badan_usaha;
        $legalUsaha->NIB = $request->NIB;
        $legalUsaha->id_user = $request->user()->id;

        // Upload file jika ada dan update
        $fields = ['akta_pendirian', 'SKDP', 'NPWP', 'SIUP', 'TDP'];
        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Hapus file yang lama jika ada
                if ($legalUsaha->$field) {
                    Storage::delete('public/legalitas/' . $legalUsaha->$field);
                }

                // Unggah file baru
                $file = $request->file($field);
                $uploadFile = $file->hashName();
                $file->storeAs('public/legalitas', $uploadFile);

                // Perbarui path file yang baru
                $legalUsaha->$field = $uploadFile;
            }
        }

        // Simpan perubahan
        $legalUsaha->save();

        // Respons sukses
        return response()->json([
            'message' => 'Data legalitas usaha berhasil diperbarui.',
            'data' => $legalUsaha
        ]);
    }
}
