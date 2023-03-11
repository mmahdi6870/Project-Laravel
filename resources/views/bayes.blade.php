@extends('template.main2')
@section('container')

<style>
  body{
   background-image: url('/asset/img/super.jpg');
   background-attachment: fixed;
   background-size: cover; 

  }
</style>

<div class="container  " style="margin-top:40px ">
   <div class="row gx-0 justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow rounded bg-dark text-white"  >
    <div class="card-body text-center ">
      <div class="row">
        <div class="col-lg-3">
          <img src="/sb/img/LOGO SALVATOR.png" class="img-fluid " alt="">
        </div>
        <div class="col-lg-9 mt-4">
          @if ($hasil != "Bersih" )
          <h5 class="card-title">Hasil Pemeriksaan Sepatu Anda adalah : {{ $bla }}</h5>
          @else
          <h5 class="card-title">Hasil Pemeriksaan Sepatu Anda adalah : {{ $lal }}</h5>
      @endif
      <p class="text-capitalize">Sepatu Anda memiliki Gejala : <br>{{ $data1 }},{{ $data2 }},{{ $data3 }},{{ $data4 }}</p>
      
      @if ($hasil != "Bersih" )
    <p class="card-text text-capitalize">{{ $nama }}, kami Merekomendasikan Perawatan :<br> <span style="color: red">{{ $hasil }}</span> </p>
    @else
    <p class="card-text">Terimakasih {{ $nama }} Telah melakukan Tes Permasalahan Sepatu <i class="far fa-thumbs-up"></i></p>
    @endif
    @if ($hasil == "Simple Cleanning")
    <p style="margin-top: -18px;" class="py-1">Seharga @duit('25000')</p>
    <a class="btn btn-sm btn-outline-light rounded-pill" href="http://wa.link/twuho6" style="margin-top: -20px">Order Sekarang</a>
    @elseif($hasil == "Premium Cleanning")
    <p style="margin-top: -18px;" class="py-1">Seharga @duit('30000')</p>
    <a class="btn btn-sm btn-outline-light rounded-pill" href="http://wa.link/mtano7" style="margin-top: -20px">Order Sekarang</a>
    @elseif($hasil == "Expert Cleanning")
    <p style="margin-top: -18px;" class="py-1">Seharga @duit('65000')</p>
    <a class="btn btn-sm btn-outline-light rounded-pill" href="http://wa.link/wnitx3" style="margin-top: -20px">Order Sekarang</a>    
    @elseif($hasil == "Unyellowing")
    <p style="margin-top: -18px;" class="py-1">Seharga @duit('70000')</p>
    <a class="btn btn-sm btn-outline-light rounded-pill" href="http://wa.link/3usi5x" style="margin-top: -20px">Order Sekarang</a>    
    @elseif($hasil == "Basic Colour Shoes")
    <p style="margin-top: -18px;" class="py-1">Seharga @duit('75000')</p>
    <a class="btn btn-sm btn-outline-light rounded-pill" href="http://wa.link/ngfq8w" style="margin-top: -20px">Order Sekarang</a>    
    @elseif($hasil == "Custom Repaint")
    <p style="margin-top: -18px;" class="py-1">Seharga @duit('80000')</p>
    <a class="btn btn-sm btn-outline-light rounded-pill" href="http://wa.link/zk6anj" style="margin-top: -20px">Order Sekarang</a>    
    @elseif($hasil == "Leather Basic Colour")
    <p style="margin-top: -18px;" class="py-1">Seharga @duit('120000')</p>
    <a class="btn btn-sm btn-outline-light rounded-pill" href="http://wa.link/opu7v6" style="margin-top: -20px">Order Sekarang</a>    
    @else

    @endif
          <p class="card-text text-capitalize pt-2">Terima Kasih Telah Memilih Salvator Untuk merawat Sepatu Anda </p>
        
        </div>
      </div>     
    </div>
  </div>
        </div>

        
    </div>
</div>

<div class="container">
  <div class="row justify-content-center mt-4">
    <div class="col-lg-10">
      <div class="card shadow">
        <h3 class="text-center pt-3">Tips Menjaga Sepatu</h3>
        <div class="card-body">
          <form action="/" method="POST">
            @csrf
          <table class="table text-center tabel-border  ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th class="text-start" scope="col">Tips</th>
                <th scope="col">hal yang kamu sudah lakukan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td class="text-start">Pastikan sepatu kering sebelum disimpan</td>
                <td><div class="form-check">
                  <input class="form-check-input" name="k1" type="checkbox" value="sepatu kering sebelum disimpan" id="flexCheckChecked" 
                  <label class="form-check-label" for="flexCheckChecked">
                    
                  </label>
                </div></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td class="text-start">Hindari membungkus sepatu dalam kantong plastik</td>
                <td><div class="form-check">
                  <input class="form-check-input" name="k2" type="checkbox" value="membungkus sepatu dalam kantong plastik" id="flexCheckChecked" >
                  <label class="form-check-label" for="flexCheckChecked">
                    
                  </label>
                </div></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td class="text-start">Jaga kebersihan lemari penyimpanan</td>
                <td ><div class="form-check">
                  <input class="form-check-input" name="k3" type="checkbox" value="Menjaga kebersihan lemari penyimpanan" id="flexCheckChecked" >
                  <label class="form-check-label" for="flexCheckChecked">
                    
                  </label>
                </div></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td class="text-start">Gunakan silica gel</td>
                <td ><div class="form-check">
                  <input class="form-check-input" name="k4" type="checkbox" value="Menggunakan silica gel" id="flexCheckChecked" >
                  <label class="form-check-label" for="flexCheckChecked">
                    
                  </label>
                </div></td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td class="text-start">Memilih Salvator</td>
                <td ><div class="form-check">
                  <input class="form-check-input" name="k5" type="checkbox" value="Memilih Salvator" id="flexCheckChecked" >
                  <label class="form-check-label" for="flexCheckChecked">
                    
                  </label>
                </div></td>
              </tr>
              <tr>
                <button class="btn btn-success mb-3">Selesai</button>
                <button type="button" class="btn btn-primary mb-3 ml-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Lihat Probabilitas
                </button>
              </tr>
            </tbody>
          </table>
          </form>
        </div>
      </div>  
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Probabilitas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Perawatan</th>
              <th scope="col">hasil Probabilitas</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cetak as $key => $value)          
            <tr>
              <th scope="row">{{  $loop->iteration }}</th>
              <td>{{ $key }}</td>
              <td>{{ $cetak[$key]['result']}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection