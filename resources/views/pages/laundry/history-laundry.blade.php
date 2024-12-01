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
                        <!-- Contoh data order -->
                        <tr class="bg-white">
                            <td>1</td>
                            <td>John Doe</td>
                            <td>2024-11-01</td>
                            <td>2024-11-05</td>
                            <td>150,000</td>
                            <td>
                                <a href="#" class="btn btn-sm text-white" style="background-color: #003366" target="_blank">File</a>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="belum_lunas" selected>Belum Lunas</option>
                                    <option value="lunas">Lunas</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="dalam_proses" selected>Dalam Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>2024-11-02</td>
                            <td>2024-11-06</td>
                            <td>200,000</td>
                            <td>
                                <a href="#" class="btn btn-sm text-white" style="background-color: #003366" target="_blank">File</a>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="belum_lunas">Belum Lunas</option>
                                    <option value="lunas" selected>Lunas</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="dalam_proses">Dalam Proses</option>
                                    <option value="selesai" selected>Selesai</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td>3</td>
                            <td>Michael Johnson</td>
                            <td>2024-11-03</td>
                            <td>2024-11-07</td>
                            <td>175,000</td>
                            <td>
                                <a href="#" class="btn btn-sm text-white" style="background-color: #003366" target="_blank">File</a>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="belum_lunas">Belum Lunas</option>
                                    <option value="lunas" selected>Lunas</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-select form-select-sm">
                                    <option value="dalam_proses" selected>Dalam Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
