@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-white">
            <h5 class="fw-bold text-start">Input Detail - {{ ucfirst($category) }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.cartlaundry', ['auth' => Auth::user()->nama]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer" class="form-label">Nama</label>
                    <select name="id_customer" id="customer" class="form-select" required>
                        <option value="" disabled selected>Pilih Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Berat (Kg)</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input
                        type="date"
                        name="tanggal_mulai"
                        id="tanggal_mulai"
                        class="form-control"
                        value="{{ date('Y-m-d') }}"
                        required>
                </div>

                <!-- Tanggal Selesai Input -->
                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-10 items-center" style="background-color: #003366">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection