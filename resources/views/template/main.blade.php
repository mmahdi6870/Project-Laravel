<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/animate/animate.min.css" rel="stylesheet">
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">
    <link href="asset/css/style2.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 style="font-family: serif" class="text-primary m-0 ">SALVATOR</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="#home" class="nav-item nav-link" >Home</a>
                <a href="#about" class="nav-item nav-link" >About</a>
                <a href="#product" class="nav-item nav-link">Products</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
                @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome Back, {{ auth()->user()->username }}
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house-door"></i>  My Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item"><i class="bi bi-arrow-left-square"></i> LogOut</button>
                      </form>
                    </li>
                  </ul>
                </li>
                @else
                <a href="/login" class="nav-item nav-link "><i class="bi bi-box-arrow-in-right"></i> Login </a>
                @endauth
            </div>
            <div class=" d-none d-lg-flex">
                <div class="flex-shrink-0 btn-lg-square border border-light rounded-circle">
                    <i class="fa fa-phone text-primary"></i>
                </div>
                <div class="ps-3">
                    <small class="text-primary mb-0">Hubungi Kami</small>
                    <p class="text-light fs-5 mb-0">082298800930</p>
                </div>
            </div>
        </div>
    </nav>
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light rounded-2" tabindex="0">
    <!-- Navbar End -->

    @yield('container')

  </div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pencarian Permasalahan Sepatu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/bayes" method="POST">
            @csrf
            <div class="row gx-0">
              <div  class="col-12">
                <div class="mb-3">
                  <label for="nama" class="form-label">Tulisakan Nama Anda!</label>
                  <input type="text" class="form-control @error('nama') is-invalid @endError" name="nama" id="nama" required>
                  @error('name')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
              </div>
            </div>
            <div class="row gx-0">
              <div id="input3" class="col-12 ">
                <div class="mb-3">
                  <label for="inputGroupSelect03" class="form-label">Apakah Bahan Sepatu Anda ?</label>
                  <select class="form-select" id="inputGroupSelect03" name="keadaan3" required>
                    <option value="">Pilih...</option>
                    <option value="bahan kulit">Sepatu Kulit</option>
                    <option value="bahan bukan kulit">Bahan Lain</option>
                  </select>
                </div>
              </div>
             
              <div id="input1" class="col-12 hidden">
                <div class="mb-3">
                  <label for="inputGroupSelect01" class="form-label">Apakah Sepatu anda Kotor?</label>
                  <select class="form-select" id="inputGroupSelect01" name="keadaan" required>
                    <option selected>Pilih...</option>
                    <option value="sepatu bersih">Sepatu Bersih</option>
                    <option value="sepatu kotor">Sepatu Kotor</option>
                  </select>
                </div>
              </div>
             
              <div id="input4" class="col-12 hidden">
                <div class="mb-3">
                  <label for="inputGroupSelect04" class="form-label">Apakah sepatu anda bau?</label>
                  <select class="form-select" id="inputGroupSelect04" name="keadaan4" required>
                    <option value="">Pilih...</option>
                    <option value="Berbau">Berbau</option>
                    <option value="Tidak Bau">Tidak Bau</option>
                  </select>
                </div>
              </div>
            
            </div>
            <div class="row">
              <div id="input2" class="col-12 hidden">
                <div class="mb-3">
                  <label for="inputGroupSelect02" class="form-label">bagian manakah yang kotor?</label>
                  <select class="form-select" id="inputGroupSelect02" name="keadaan2" required>
                    <option value="">Pilih...</option>
                    <option value="sepatu kotor luar dalam">Bagian luar dan dalam</option>
                    <option value="sepatu kotor luar">Bagian Luar</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
          <button  type="submit" class="btn btn-primary">Selesai</button>
        </div>
      </form>
      </div>
    </div>
  </div>

{{-- model 2 --}}

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="ModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel2">Pencarian Permasalahan Sepatu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/bayesR" method="POST">
            @csrf
            <div class="row gx-0">
              <div  class="col-12">
                <div class="mb-3">
                  <label for="nama" class="form-label">Tulisakan Nama Anda!</label>
                  <input type="text" class="form-control @error('nama') is-invalid @endError" name="nama" id="nama" required>
                  @error('name')
                  <div  class="invalid-feedback mb-2">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
              </div>
            </div>
            <div class="row gx-0">
              <div id="inputa" class="col-12 ">
                <div class="mb-3">
                  <label for="bahan" class="form-label">Apakah Bahan Sepatu Anda?</label>
                  <select class="form-select" id="bahan" name="keadaan">
                    <option selected>Pilih...</option>
                    <option value="sepatu kulit">Sepatu Kulit</option>
                    <option value="bahan lain">Bahan Lain</option>
                  </select>
                </div>
              </div>
      
              <div id="inputb" class="col-12 hidden">
                <div class="mb-3">
                  <label for="warna" class="form-label">Apakah Warna Sepatu Anda Pudar?</label>
                  <select class="form-select" id="warna" name="keadaan4" required>
                    <option value="">Pilih...</option>
                    <option value="warna sepatu Pudar">Iya, Sepatu Pudar</option>
                    <option value="tidak">tidak</option>
                    
                  </select>
                </div>
              </div>
      
              <div id="inputc" class="col-12 hidden">
                <div class="mb-3">
                  <label for="sol" class="form-label">Apakah Sol Sepatu Anda Bewarna Kekuningan?</label>
                  <select class="form-select" id="sol" name="keadaan2" required>
                    <option value="">Pilih...</option>
                    <option value="sol sepatu kuning">Iya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div id="inputd" class="col-12 hidden">
                <div class="mb-3">
                  <label for="inputGroupSelect03" class="form-label">Apakah Anda Ingin Menganti warna Sepatu ?</label>
                  <select class="form-select" id="inputGroupSelect03" name="keadaan3" required>
                    <option value="">Pilih...</option>
                    <option value="ganti warna">Iya</option>
                    <option value="bukan">Tidak</option>
                  </select>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
          <button  type="submit" class="btn btn-primary">Selesai</button>
        </div>
      </form>
      </div>
    </div>
  </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/wow/wow.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/counterup/counterup.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
    <script>
        let input = document.querySelector("#inputGroupSelect04");
        let input2 = document.querySelector("#inputGroupSelect02");
        let input3 = document.querySelector("#inputGroupSelect03");
  
        input.addEventListener("change", stateHandle);
        
  function stateHandle() {
      if (document.querySelector("#inputGroupSelect04").value === "Tidak Bau") {
        input2.disabled = true; 
      } else {
          input2.disabled = false; //button is enabled
        
      }
  }
  
    </script> 
  <script>
    let inputq = document.querySelector("#inputGroupSelect04");
    let inputx = document.querySelector("#inputGroupSelect03");
    let inputp = document.querySelector("#inputGroupSelect01");
    let inputx2 = document.querySelector("#input1");
    let inputx4 = document.querySelector("#input2");
    let inputx1 = document.querySelector("#input3");
    let inputx3 = document.querySelector("#input4");
  
  
    inputx.addEventListener("change", stateHandle2);
    inputp.addEventListener("change", change);
    inputq.addEventListener("change", change2);
    
  function stateHandle2() {
    inputx2.classList.toggle('hidden')
    inputx1.classList.toggle('hidden')
  }
  function change() {
    inputx2.classList.toggle('hidden')
    inputx3.classList.toggle('hidden')
  }
  function change2() {
    inputx4.classList.toggle('hidden')
    inputx3.classList.toggle('hidden')
  }
  
  </script> 
 
  <script>

let inputa = document.querySelector("#inputa");
let inputb = document.querySelector("#inputb");
let inputc = document.querySelector("#inputc");
let inputd = document.querySelector("#inputd");
let bahan = document.querySelector("#bahan");
let warna = document.querySelector("#warna");
let sol = document.querySelector("#sol");

bahan.addEventListener("change", berubah);
warna.addEventListener("change", berubah2);
sol.addEventListener("change", berubah3);
    function berubah()
    {
      inputa.classList.toggle('hidden')
      inputb.classList.toggle('hidden')
    }
    function berubah2()
    {
      inputb.classList.toggle('hidden')
      inputc.classList.toggle('hidden')
    }
    function berubah3()
    {
      inputc.classList.toggle('hidden')
      inputd.classList.toggle('hidden')
    }

  </script>

</body>

</html>