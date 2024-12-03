@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Content -->
        <div class="col-md-10 ">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary">Keranjang</h4>
                <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40" alt="User" class="rounded-circle me-2">
                    <div>
                        <p class="mb-0 text-primary fw-bold">Paong</p>
                        <span class="text-secondary">Admin</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Items -->
                <div class="col-md-8">
                    <!-- Card 1 -->
                    <div class="card shadow-sm mb-3 p-3">
                        <h5 class="text-black fw-bold">Pakaian</h5>
                        <p>Nama: example@gmail.com</p>
                        <p>Berat: 2 Kg</p>
                        <p>Harga/Kg: Rp.7,000</p>
                        <p>Total: Rp.14,000</p>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="card shadow-sm mb-3 p-3">
                        <h5 class="text-black fw-bold">Sepatu</h5>
                        <p>Nama: example@gmail.com</p>
                        <p>Jumlah: 2</p>
                        <p>Harga/PCS: Rp.30,000</p>
                        <p>Total: Rp.60,000</p>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="card shadow-sm mb-3 p-3">
                        <h5 class="text-black fw-bold">Seprai</h5>
                        <p>Nama: example@gmail.com</p>
                        <p>Jumlah: 2</p>
                        <p>Harga/Satuan: Rp.15,000</p>
                        <p>Total: Rp.30,000</p>
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </div>
                    </div>
                </div>

                <!-- Price Summary -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="text-black fw-bold">Rincian Harga</h5>
                        <p>Pakaian: Rp.14,000</p>
                        <p>Sepatu: Rp.60,000</p>
                        <p>Seprai: Rp.30,000</p>
                        <hr>
                        <h6 class="fw-bold">Total: Rp.114,000</h6>
                        <button class="btn btn-primary w-100 mt-3" style="background-color: #003366">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
