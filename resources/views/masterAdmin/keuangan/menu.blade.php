@extends('layouts.masterAdmin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Laporan Keuangan ({{ \Carbon\Carbon::now()->locale('id')->translatedFormat('F Y') }})</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Umkm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Input</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemasukkan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengeluaran</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keuntungan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($uang as $data)
                                    <tr>
                                        <td><h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6></td>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $data->user->name }}</h6>
                                            <p class="text-xs text-secondary mb-0">{{ $data->user->email }}</p>
                                        </td>
                                        <td><h6 class="mb-0 text-sm">{{ $data->tanggal }}</h6></td>
                                        <td><h6 class="mb-0 text-sm">Rp {{ number_format($data->income, 0, ',', '.') }}</h6></td>
                                        <td><h6 class="mb-0 text-sm">Rp {{ number_format($data->outcome, 0, ',', '.') }}</h6></td>
                                        <td><h6 class="mb-0 text-sm">Rp {{ number_format($data->income - $data->outcome, 0, ',', '.') }}</h6></td>
                                        <td>
                                            <img src="{{ Storage::url($data->bukti_transaksi) }}" 
                                                width="50" height="50" class="img-thumbnail preview-image"
                                                style="border-radius: 10px; object-fit: cover; cursor: pointer;"
                                                onclick="showImagePreview('{{ Storage::url($data->bukti_transaksi) }}')">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let table = new DataTable('#myTable');

    function showImagePreview(imageUrl) {
        Swal.fire({
            imageUrl: imageUrl,
            imageWidth: '80%',
            imageAlt: 'Bukti Transaksi',
            showConfirmButton: false,
            background: '#000',
            backdrop: 'rgba(0,0,0,0.8)',
            customClass: {
                popup: 'rounded-lg'
            }
        });
    }
</script>
@endpush
