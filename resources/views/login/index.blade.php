@extends('template.main2')

@section('container')

<style>
    body{
        background: linear-gradient(to right, #bdc3c7, #2c3e50);
    }
</style>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        @if (session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                      @endif
                                    @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                            {{ session('loginError') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                      @endif
                                      <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <img src="/sb/img/LOGO SALVATOR.png" class="img-fluid mb-4" alt="" width="150px">
                                        </div>
                                        <div class="col-lg-6">
                                            <h1 class=" text-gray-900 mb-4 mt-4" style="font-family: serif">Login Salvator</h1>
                                        </div>
                                      </div>
                                        
                                    </div>
                                    <form class="user" action="/login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username') is-invalid @endError"
                                                id="username" aria-describedby="username"
                                                placeholder="Masukan Username" name="username">
                                            
                                                @error('username')
                                                <div  class="invalid-feedback mb-2">
                                                    {{ $message }}
                                                  </div>
                                                  @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @endError"
                                                id="password" placeholder="Password" name="password">
                                            
                                                @error('password')
                                                <div  class="invalid-feedback mb-2">
                                                    {{ $message }}
                                                  </div>
                                                  @enderror
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        
                                    </form>
                                
                                          <div class="text-center py-4">
                                        <p>Belum Memiliki Akun? <a class="small text-decoration-none " href="/register">Registrai Sekarang</a></p>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    @endsection