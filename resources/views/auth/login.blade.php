@extends('layouts.auth')

@section('content')

<section class="hold-transition login-page">
    <div class="login-box">

      <div class="card">
        <div class="card-body login-card-body">
          <div class="text-center mb-4 login-title">
            <span>Masuk ke aplikasi ARL Laundry</span>
          </div>
          <div class="text-center">
            <h5 class="text-black">Selamat datang di ARL Laundry</h5>
            <p class="description">anda bisa masuk menggunakan akun yang sudah diberikan manager</p>
          </div>

          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="username">
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="password" >
              
            </div>
            <div class="row">
                <div class="col mt-2">
                    <button type="submit" class="btn btn-login">Selanjutnya</button>
                </div>
            </div>
          </form>

        </div>

      </div>
    </div>
</section>

@endsection
