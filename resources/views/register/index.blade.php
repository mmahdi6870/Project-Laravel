@extends('template.main2')
@section('container')
<div class="container mt-4">
<div class="row justify-content-center">
    <div class="col-lg-4">


        <main class="form-regis">
            <form action="/register" method="POST">
            @csrf
            <h1 style="font-family: serif; "" class="h3 mb-3 fw-normal text-center fw-bold">Register Salvator</h1>

            <div class="form-floating">
                <input type="text" class="form-control rounded-top @error('username') is-invalid @enderror" id="floatingInput" placeholder="Username" name="username" value="{{ old('username') }}">
                <label for="floatingInput">Username</label>
                @error('username')
                <div  class="invalid-feedback mb-2">
                    {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="floatingHp" placeholder="No Handphone" name="nohp" value="{{ old('nohp') }}">
                <label for="floatingHp">No Heandphone</label>
                @error('nohp')
                <div  class="invalid-feedback mb-2">
                    {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="floatingEmail" placeholder="Alamat Email" name="email" value="{{ old('email') }}">
                <label for="floatingEmail">Email address</label>
                @error('email')
                <div  class="invalid-feedback mb-2">
                    {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="password" class="form-control rounded-bottom    @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div  class="invalid-feedback mb-3">
                    {{ $message }}
                  </div>
                  @enderror
            </div>
        
            
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-2" style="font-family: serif">Sudah Memiliki Akun? <a href="/login" class="text-decoration-none">Login Sekarang</a></small>
        </main>
    </div>
    </div>
</div>



@endsection