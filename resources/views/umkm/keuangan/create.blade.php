@extends('layouts.umkm')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Daftar Data Keuangan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <form action="{{ route('Umkmkeuangan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-5 py-1">
                                                <div class="row w-100">
                                                   

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal Input Keuangan:</label>
                                                            <input type="datetime-local" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Masukkan lokasi meeting" aria-label="Masukkan tanggal meeting" autofocus>
                                                            @error('tanggal')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pemasukkan:</label>
                                                            <input type="number" class="form-control @error('income') is-invalid @enderror"
                                                                name="income" placeholder="Masukkan nominal income, contoh: Rp 10.000"
                                                                value="{{ old('income') }}" required>
                                                            @error('income')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Pengeluaran:</label>
                                                            <input type="number" class="form-control @error('outcome') is-invalid @enderror"
                                                                name="outcome" placeholder="Masukkan nominal outcome, contoh: Rp 5.000"
                                                                value="{{ old('outcome') }}" required>
                                                            @error('outcome')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Upload Gambar (Bukti Transaksi):</label>
                                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                                <input type="file" name="bukti_transaksi" class="form-control file-upload-info"
                                                                    accept="image/*">
                                                            </div>
                                                            @error('bukti_transaksi')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="px-4 py-1">
                                                <a href="{{ route('Umkmkeuangan.index') }}" class="btn btn-danger">
                                                    <i class="fa fa-arrow-left"></i> Kembali
                                                </a>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
