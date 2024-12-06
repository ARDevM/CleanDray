@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header text-white">
            <h5 class="fw-bold mb-0">Notifikasi</h5>
        </div>
        <!-- style="background-color: #003366" -->
        <!-- Body -->
        <div class="card-body">
            <ul class="list-group">
                <!-- Notifikasi Item -->
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Project A Selesai</div>
                        Project A telah selesai dan butuh konfirmasi.
                    </div>
                    <small class="text-muted">2 jam yang lalu</small>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Feedback Baru</div>
                        Anda menerima feedback dari client X.
                    </div>
                    <small class="text-muted">1 hari yang lalu</small>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Task Baru</div>
                        Task baru "Design Logo" telah ditambahkan ke tim Anda.
                    </div>
                    <small class="text-muted">3 hari yang lalu</small>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
