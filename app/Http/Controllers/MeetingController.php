<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Meeting;
use Alert;

class MeetingController extends Controller
{
    // Admin melihat daftar meeting yang menunggu verifikasi
    public function menu()
    {
        $title = 'Daftar Meeting';
        $meetings = Meeting::where('status_verifikasi', 'Menunggu')->get()->map(function ($item) {
            $item->tanggal = \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d');
            return $item;
        });

        return view('masterAdmin.meeting.menu', compact('meetings', 'title'));
    }

    // Investor melihat daftar meeting miliknya
    public function index()
    {
        $title = 'Daftar Meeting';
        $umkm = User::role('umkm')->get();
        $meeting = Meeting::where('id_investor', auth()->id())->get()->map(function ($item) {
            $item->tanggal = \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d');
            return $item;
        });

        return view('investor.meeting.index', compact('umkm', 'meeting', 'title'));
    }

    // Form tambah meeting
    public function create()
    {
        $title = 'Tambahkan Jadwal Meeting';
        $umkm = User::role('umkm')->get();

        return view('investor.meeting.create', compact('umkm', 'title'));
    }

    // Simpan meeting baru
    public function store(Request $request)
    {
        $request->validate([
            'id_umkm' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'lokasi_meeting' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $meeting = new Meeting;
        $meeting->id_umkm = $request->id_umkm;
        $meeting->judul = $request->judul;
        $meeting->lokasi_meeting = $request->lokasi_meeting;
        $meeting->tanggal = $request->tanggal;
        $meeting->id_investor = auth()->id();
        $meeting->status_verifikasi = 'Menunggu';
        $meeting->save();

        Alert::success('Sukses', "Data Berhasil Ditambahkan")->autoClose(1000);
        return redirect()->route('Investormeeting.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    // Tampilkan detail meeting
    public function show(string $id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->tanggal = \Carbon\Carbon::parse($meeting->tanggal)->format('Y-m-d');

        return view('investor.meeting.show', compact('meeting'));
    }

    // Form edit meeting
    public function edit(string $id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->tanggal = \Carbon\Carbon::parse($meeting->tanggal)->format('Y-m-d');
        $umkm = User::role('umkm')->get();

        return view('investor.meeting.edit', compact('meeting', 'umkm'));
    }

    // Update data meeting
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_umkm' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'lokasi_meeting' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $meeting = Meeting::findOrFail($id);
        $meeting->id_umkm = $request->id_umkm;
        $meeting->judul = $request->judul;
        $meeting->lokasi_meeting = $request->lokasi_meeting;
        $meeting->tanggal = $request->tanggal;
        $meeting->save();

        Alert::success('Sukses', "Data Berhasil Diperbarui")->autoClose(1000);
        return redirect()->route('Investormeeting.index')->with('success', 'Data Berhasil Diperbarui');
    }

    // Verifikasi meeting (Disetujui atau Ditolak)
    public function verifikasi(Request $request, string $id)
    {
        $meeting = Meeting::findOrFail($id);

        if ($request->action === 'tolak') {
            $meeting->status_verifikasi = 'Ditolak';
            $meeting->save();

            Alert::success('Sukses', "Meeting Ditolak")->autoClose(1000);
            return redirect()->back()->with('success', 'Meeting berhasil ditolak.');
        }

        if ($request->action === 'setuju') {
            $meeting->status_verifikasi = 'Disetujui';
            $meeting->save();

            Alert::success('Sukses', "Meeting Disetujui")->autoClose(1000);
            return redirect()->back()->with('success', 'Meeting berhasil disetujui.');
        }

        return redirect()->back()->with('error', 'Aksi tidak dikenali.');
    }

    // Hapus data meeting
    public function destroy(string $id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();

        Alert::success('Sukses', "Data Meeting berhasil dihapus")->autoClose(1000);
        return redirect()->back()->with('success', 'Data Meeting berhasil dihapus.');
    }
}
