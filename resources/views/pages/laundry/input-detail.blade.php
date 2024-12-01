@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header bg-white">
            <h5 class="fw-bold text-start">Input Detail - {{ ucfirst($category) }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pages.cartlaundry', ['auth' => Auth::user()->username]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="berat" class="form-label">Nama</label>
                    <input type="number" step="0.1" name="berat" id="berat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Berat (Kg)</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="berat" class="form-label">Tanggal Mulai</label>
                    <input type="number" step="0.1" name="berat" id="berat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Tanggal Selesai</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-10 items-center" style="background-color: #003366">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
