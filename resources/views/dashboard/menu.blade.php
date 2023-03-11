@extends('template.dashboardMain')

@section('container')
<div class="container-fluid ">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center text-uppercase">Menu Salvator</h1>
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
    <!-- DataTales Example -->
  
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow  mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-primary" href="/menu/create">Tambah Menu <i class="bi bi-file-earmark-plus"></i></a>
                </div>
                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pelayanan</th>
                                    <th>Detail</th>
                                    <th>Harga</th>
                               
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($menu as $mu)
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mu->pelayanan }}</td>
                                <td class="text-capitalize">{{ $mu->detail }}</td>
                                <td>@duit($mu->harga)</td>
                             
                                <td class="text-center d-block">
                                    <a href="/menu/{{ $mu->id }}/edit" class="badge text-bg-warning"><i class="fas fa-edit"></i></a>
                                    <form action="/menu/{{ $mu->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                </td>
                            </tbody> 
                            @endforeach
                        </table>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    

</div>
@endsection