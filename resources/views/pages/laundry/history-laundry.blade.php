@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Header Card -->
        <div class="col-lg-3 col-md-4">
            <div class="card shadow border-0" style="background-color: #003366">
                <h5 class="mb-4 fw-bold text-white"> Order History</h5>
                <div class="card-body text-center">
            </div>
        </div>
        Order History
        <!-- Table -->
        <div class="card shadow border border-2 text-black" style="width: 60rem">
            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead class="text-black fw-bold">
                        <tr class="border-bottom">
                            <th class="p-3">ID</th>
                            <th class="p-3">Nama Customer</th>
                            <th class="p-3">Tanggal Masuk</th>
                            <th class="p-3">Tanggal Selesai</th>
                            <th class="p-3">Harga (Rp)</th>
                            <th class="p-3">Bukti</th>
                            <th class="p-3">Status Pembayaran</th>
                            <th class="p-3">Status Laundry</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayarans as $pembayaran)
                        <tr class="bg-white">
                            <td>{{$pembayaran->id_customer}}</td>
                            <td>{{$pembayaran->nama}}</td>
                            <td>{{$pembayaran->tanggal_masuk}}</td>
                            <td>{{$pembayaran->tanggal_selesai}}</td>
                            <td>{{$pembayaran->harga}}</td>
                            <td>
                                @if ($pembayaran->bukti)
                                    <a href="#" class="btn btn-sm text-white" style="background-color: #003366" target="_blank">File</a>
                                @else
                                    Belum ada bukti
                                @endif
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="belum_lunas" {{ !$pembayaran->bukti ? 'selected' : '' }}>Belum Lunas</option>
                                    <option value="lunas" {{ $pembayaran->bukti ? 'selected' : '' }}>Lunas</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="dalam_proses" {{ $pembayaran->status != 1 ? 'selected' : '' }}>Dalam Proses</option>
                                    <option value="selesai" {{ $pembayaran->status == 1 ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
