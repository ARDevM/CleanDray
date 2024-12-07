@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard', 'titleSub' => ''. ucfirst(Auth::user()->auth). ' : '. Auth::user()->nama])
<div class="container py-5">
    <div class="card shadow border-0">
        <!-- Header -->
        <div class="card-header text-white text-center">
            <h5 class="fw-bold mb-0">Profile</h5>
        </div>

        <!-- Body -->
        <div class="card-body">
            <form>
                <!-- Profile Image -->
                <div class="text-center mb-4">
                    <img src="https://sohanews.sohacdn.com/2013/1364439509339.jpg"
                         alt="profile" class="rounded-circle img-fluid"
                         style="width: 200px; height: 200px; object-fit: cover;">
                </div>

                <!-- Nama -->
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control" placeholder="Masukkan nama Anda" value={{$user->nama}}>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control" placeholder="Masukkan email Anda" value={{$user->email}}>
                </div>

                <!-- Nomor Telepon -->
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input type="tel" name="nomor_telepon" id="nomor_telepon"
                        class="form-control" placeholder="Masukkan nomor telepon Anda" value={{$user->no_hp}}>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control" placeholder="Masukkan password Anda">
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn w-100" style="background-color: #003366">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
