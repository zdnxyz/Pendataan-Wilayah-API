@extends('layouts.masterAdmin')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>{{ $title }}</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-0">
                    <div class="table-responsive p-5 pt-0">
                        <table id="myTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">UMKM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Investor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($meetings as $data)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-secondary text-sm">{{ $no++ }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->judul }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->user->name ?? '-' }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->idInvestor->name ?? '-' }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->lokasi_meeting }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->tanggal }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('Investormeeting.destroy', $data->id) }}" method="POST" class="d-inline-flex gap-1">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="action" value="">
                                                <!-- Tombol Tolak dan Setuju -->
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); this.closest('form').action.value='tolak'; this.closest('form').submit();">
                                                    <i class="fa fa-ban"></i> Tolak
                                                </button>
                                                
                                                <button type="submit" class="btn btn-success btn-sm" onclick="event.preventDefault(); this.closest('form').action.value='setuju'; this.closest('form').submit();">
                                                    <i class="fa fa-check"></i> Setuju
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
        let table = new DataTable('#myTable', {
            "ordering": false // Menonaktifkan urutan/tampilan segitiga kompas
        });
    </script>
@endpush
