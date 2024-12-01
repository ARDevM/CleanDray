@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-4">
            <div class="card shadow border-0" style="background-color: #003366">
                <h5 class="mb-4 fw-bold text-white">Kategory Laundry</h5>
                <div class="card-body text-center">
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9 col-md-8">
            <div class="card shadow border border-2 text-black" style="width: 60rem">
            <div class="card-header d-flex justify-content-between align-items-center bg-white">
                <h5 class="mb-0 fw-bold">Kategori Laundry</h5>
                <!-- Icon Keranjang -->
                <a href="{{ route('pages.cartlaundry', ['auth' => 'admin']) }}" 
                    class="d-flex justify-content-center align-items-center p-2" 
                    style="background-color: #003366; border-radius: 8px; width: 3rem; height: 3rem; background: rgba(0,0,0,0.0);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="black" style="height: 1.5rem; width: 1.5rem;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l1.4-7H6.4M7 13L6.2 7m0 0H5M9 21h6m-6 0a2 2 0 11-4 0h4zm6 0h4a2 2 0 11-4 0z" />
                    </svg>
                </a>


            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Pakaian -->
                    <div class="col-md-4 mb-4">
                        <div class="card text-center border-0 shadow">
                            <div class="card-body">
                                <!-- Heroicon: Shirt -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a1 1 0 011-1h1a2 2 0 002-2V3h8v1a2 2 0 002 2h1a1 1 0 011 1v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                                </svg>
                                <h5 class="mt-3 fw-bold">Pakaian</h5>
                                <a href="{{ route('pages.inputdetail', ['auth' => 'admin', 'category' => 'pakaian']) }}" 
                                class="btn btn-primary mt-3 w-100" style="background-color: #003366">
                                    Pilih
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Seprai -->
                    <div class="col-md-4 mb-4">
                        <div class="card text-center border-0 shadow">
                            <div class="card-body">
                                <!-- Heroicon: Bed -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18a1 1 0 011 1v6a1 1 0 01-1 1h-1m-16 0h16m-16 0a1 1 0 01-1-1v-6a1 1 0 011-1h18z" />
                                </svg>
                                <h5 class="mt-3 fw-bold">Seprai</h5>
                                <a href="{{ route('pages.inputdetail', ['auth' => 'admin', 'category' => 'seprai']) }}" 
                                class="btn btn-primary mt-3 w-100" style="background-color: #003366">
                                    Pilih
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Sepatu -->
                    <div class="col-md-4 mb-4">
                        <div class="card text-center border-0 shadow">
                            <div class="card-body">
                                <!-- Heroicon: Shoe -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18l3-3 4 4 4-4 3 3v3H4v-3z" />
                                </svg>
                                <h5 class="mt-3 fw-bold">Sepatu</h5>
                                <a href="{{ route('pages.inputdetail', ['auth' => 'admin', 'category' => 'sepatu']) }}" 
                                class="btn btn-primary mt-3 w-100" style="background-color: #003366">
                                    Pilih
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <p class="mb-0 text-muted">Showing data 1 to 8 of 256K entries</p>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">40</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
