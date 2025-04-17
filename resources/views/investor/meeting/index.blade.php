@extends('layouts.investor')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Meeting</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <!-- Button Add Meeting -->
                        <div class="d-flex justify-content-start p-0 mb-3">
                            <a href="{{ route('Investormeeting.create') }}" class="btn btn-primary">
                                Tambah Jadwal Meeting
                                <i class="fa fa-sharp fa-light fa-arrow-right"></i>
                            </a>
                        </div>
                        
                        <!-- Table -->
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pemilik Umkm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agenda</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Verifikasi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($meeting as $data)
                                    <tr>
                                        <!-- Nomor Urut -->
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6>
                                            </div>
                                        </td>

                                        <!-- Nama Pemilik Umkm -->
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->user->name }}</h6>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Agenda Meeting -->
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->judul }}</h6>
                                                    <p class="text-xs text-secondary mb-0">Waktu & Lokasi:
                                                        <b>{{ $data->tanggal }}, {{ $data->lokasi_meeting }}</b></p>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Status Verifikasi -->
                                        <td style="color: black;">
                                            @if ($data->status_verifikasi === 'Disetujui')
                                                <span class="badge bg-success text-dark" style="font-weight: bold;">
                                                    — Diterima —</span>
                                            @elseif ($data->status_verifikasi === 'Ditolak')
                                                <span class="badge bg-danger text-white" style="font-weight: bold;">
                                                    — Ditolak —</span>
                                            @else
                                                <span class="badge bg-dark text-white" style="font-weight: 600;">
                                                    — Menunggu Konfirmasi —</span>
                                            @endif
                                        </td>

                                        <!-- Delete Button -->
                                        <td class="d-flex justify-content-center">
                                            <form id="delete-form-{{ $data->id }}"
                                                action="{{ route('Investormeeting.destroy', $data->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $data->id }})"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        // Initialize DataTable
        let table = new DataTable('#myTable', {
            "ordering": false // Menonaktifkan urutan/tampilan segitiga kompas
        });
    </script>

    <!-- SweetAlert for Confirm Delete -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(meetingId) {
            Swal.fire({
                title: 'Hapus Data Meeting ini!',
                text: "Apakah kamu yakin ingin menghapusnya?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + meetingId).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Dibatalkan',
                        'Penghapusan meeting dibatalkan',
                        'error'
                    );
                }
            });
        }
    </script>
@endpush
