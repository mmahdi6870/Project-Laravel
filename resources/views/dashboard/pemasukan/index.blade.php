@extends('template.dashboardMain')
@section('container')

 <style>
    .hidden{
        display: none;
    }
 </style>

    <div class="container-fluid">
        @if (session()->has('success'))
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7">
                <div class="alert alert-success alert-dismissible fade show mt-2 text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
          
        @endif
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header text-center bg-primary">
                        <h4 class="text-capitalize fw-bold mt-2" style="color:white;">Pemasukan Salvator</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="fas fa-folder-plus"></i> Tambah Pemasukan 
                          </button>  
                        <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tanggal">
                            <i class="fas fa-eye"></i> Lihat Pemasukan 
                          </button>  
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                              <tr>
                                <th class="text-center" scope="col" colspan="2">#</th>
                                <th scope="col">tanggal Penginputan</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col" class="text-center">Jasa</th>
                                <th scope="col">Jumlah jasa yang dipesan</th>
                                <th scope="col">Harga satuan</th>
                                <th scope="col">Total Harga</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemasukan as $ps)
                              <tr class="text-center">
                                <th>
                                  <form action="/pemasukan/{{ $ps->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </th>
                                <th scope="row">{{  $loop->iteration  }}</th>
                                <td class="text-capitalize">{{ $ps->created_at }}</td>
                                <td class="text-capitalize">{{ $ps->nama }}</td>
                                <td>{{ $ps->jasa }}</td>
                                <td >{{ $ps->jumlah }}</td>
                                <td>@duit($ps->harga)</td>
                                <td>@duit($ps->total)</td>
                              </tr>
                            </tbody>
                            @endforeach
                            <tfoot id="ilang" class="">
                                <th class="text-center text-uppercase " colspan="7">Jumlah Pemasukan Salvator</th>
                                <td class="bg-dark text-white ">@duit($total)</td>
                            </tfoot>
                          </table>
                    </div>
                  </div>
            </div>
        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary ">
          <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Tambah Pemasukan Salvator</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/pemasukan" method="POST">
            @csrf
        <div class="modal-body">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label fw-bold">Nama Pemesan</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" name="nama">
                  @error('nama')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="mb-3">
                <label for="jasa" class="form-label fw-bold">Jasa Yang dipesan</label>
                <select class="form-select @error('jasa') is-invalid @enderror" id="jasa" aria-label="Default select example" name="jasa">
                    <option selected disabled></option>
                    <option value="Simple Cleanning">Simple Cleanning</option>
                    <option value="Premium Cleanning">Premium Cleanning</option>
                    <option value="Expert Cleanning">Expert Cleanning</option>
                    <option value="Unyellowing">Unyellowing</option>
                    <option value="Repaint Basic Colour">Repaint Basic Colour</option>
                    <option value="Leather Basic Colou">Leather Basic Colou</option>
                    <option value="Custom Repaint">Custom Repaint</option>
                  </select>
                  @error('jasa')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                  <div class="mb-3">
                    <label for="jumlah" class="form-label fw-bold">Jumlah Pemesanan</label>
                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah">
                    @error('jumlah')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                  @enderror
                  </div>
                         
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tanggal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary ">
          <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Total Pemasukan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="GET">
        <div class="modal-body">
            <div class="input-group mb-3">
                <input type="date" class="form-control" name="start_date">
                <input type="date" class="form-control" name="end_date">
            </div>  
        </div>
        <div class="modal-footer">
          <button type="submit"   class="btn btn-primary">Lihat Data</button>
        </div>
    </form>
      </div>
    </div>
  </div>

 
@endsection
