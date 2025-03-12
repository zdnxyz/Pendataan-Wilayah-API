@extends('layouts.umkm')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Detail Data Keuangan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-5 py-1">
                                            <div class="row w-100">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal Input Keuangan:</label>
                                                        <input type="text" class="form-control" value="{{ $keuangan->tanggal }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pemasukkan:</label>
                                                        <input type="text" class="form-control" value="Rp {{ number_format($keuangan->income, 0, ',', '.') }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pengeluaran:</label>
                                                        <input type="text" class="form-control" value="Rp {{ number_format($keuangan->outcome, 0, ',', '.') }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Bukti Transaksi:</label>
                                                        <div>
                                                            @if($keuangan->bukti_transaksi)
                                                                <img src="{{ asset('storage/' . $keuangan->bukti_transaksi) }}" class="img-fluid" alt="Bukti Transaksi">
                                                            @else
                                                                <p class="text-muted">Tidak ada bukti transaksi.</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-4 py-1">
                                            <a href="{{ route('Master Adminkeuangan.menu') }}" class="btn btn-danger">
                                                <i class="fa fa-arrow-left"></i> Kembali
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
