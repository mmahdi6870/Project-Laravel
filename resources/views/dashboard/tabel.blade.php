            @extends('template.dashboardMain')
            
            @section('container')
                
            
            <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">Tabel Pengujian Bayes</h1>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="row gx-0">
                        <div class="col-lg-6">
                            <form action="/tabel" class="d-none d-sm-inline-block form-inline  navbar-search">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-primary rounded " placeholder="Pencarian..."
                                        aria-label="Search" aria-describedby="basic-addon2" name="search" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary rounded-start" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card shadow bg-dark  mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Masalah Pelanggan</h6>
                            {{ $bayes->links() }}
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table table-bordered text-white" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Hapus</th>
                                            <th>Tanggal Penggujian</th>
                                            <th>Nama</th>
                                            <th>Keadaan Sepatu</th>
                                            <th>Detail Keadaan Sepatu </th>
                                            <th>Bahan Sepatu</th>
                                            <th>Keadaan Bau Sepatu</th>
                                            <th>Hasil Rekomendasi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($bayes as $isi)
                                        <tr>
                                            <td > 
                                                 <form action="/dashboard/hapus/{{ $isi->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="border-0" onclick="return confirm('Apakah Kamu Yakin?')"><i class="bi bi-trash3"></i></button>
                                                </form>
                                            </td>
                                            <td>{{ $isi->created_at}}</td>
                                            <td>{{ $isi->nama }}</td>
                                            <td>{{ $isi->keadaan }}</td>
                                            <td>{{ $isi->keadaan2 }}</td>
                                            <td>{{ $isi->keadaan3 }}</td>
                                            <td>{{ $isi->keadaan4 }}</td>
                                            @if ( $isi['hasil']  == "Bersih")
                                               <td class="bg-success text-white">{{ $isi->hasil }}</td>
                                            @else
                                            <td class="bg-danger text-white">{{ $isi->hasil }}</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                @endsection     