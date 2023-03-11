@extends('template.dashboardMain')
@section('container')
<style>
  
    @media (min-width: 1200px) {
      .atas{  
        margin-top: -200px ;
      }
   
  }
</style>

    <div class="container-fluid">
      @if (session()->has('success'))
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
    </div>
      </div>
          @endif
      @if (session()->has('nosuccess'))
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
            {{ session('nosuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      </div>
          @endif
        <div class="card shadow bg-dark text-white mb-4 px-4 py-6" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="sb/img/man.png" class="img-fluid rounded-start mt-4 " alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body text-center" style="font-family: serif" >
                  <p class="card-title mb-2 ">Nama : <span class="text-uppercase">{{ auth()->user()->username }}</span></p>
                  <p class="card-text mb-2">No HP : {{ auth()->user()->nohp }}</p>
                  <p class="card-text mb-2">Email : {{ auth()->user()->email }}</p>
                  <p class="card-text mb-2"><small class="text-white fst-italic">Register : {{ auth()->user()->created_at->diffForHumans() }}</small></p>
                  <div class="row gx-0">
                    <div class="col">
                      <a class="btn btn-primary" href="/dashboard/ubah">Ubah Profil</a>
                    </div>
                    <div class="col">
                      <a class="btn btn-danger" href="/dashboard/ubahpass">Ubah Password</a>
                    </div>

                  </div>
                 
                </div>
              </div>
            </div>
          </div>  
          
          @can('admin')
          <div class="row">
            <div class="col-lg-6">
              <div class="card shadow text-dark text-center mb-4 px-4 py-6" style="max-width: 540px;" >
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body " style="font-family: serif" >
                      <h5 class="card-title mb-2 ">Data Tabel Bayes (Cleanning)</h5>
                      <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Hasil</th>
                          <th scope="col">Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Bersih</td>
                          <td>{{ $data }}</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Simple Cleanning</td>
                          <td>{{ $data2 }}</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Premium Cleanning</td>
                          <td>{{ $data4 }}</td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Expert Cleanning</td>
                          <td>{{ $data3 }}</td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
            <div class="col-lg-6">
              <div class="card shadow atas text-dark text-center mb-4 px-4 py-6" style="max-width: 540px;" >
                <div class="row g-0">
                  <div class="col-md-12">
                    <div class="card-body " style="font-family: serif" >
                      <h5 class="card-title mb-2 ">Data Tabel Bayes (Repaint)</h5>
                      <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Hasil</th>
                          <th scope="col">Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Tidak Perlu Repaint</td>
                          <td>{{ $dataa }}</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Unyellowing</td>
                          <td>{{ $datab }}</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Basic Colour Shoes</td>
                          <td>{{ $datac }}</td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Costume Repaint</td>
                          <td>{{ $datad }}</td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Leather Basic Colour</td>
                          <td>{{ $datae }}</td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
                @endcan
    </div>


@endsection