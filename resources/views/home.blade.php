@extends('template.main')
@section('container')
    
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" id="home" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="asset/img/jumbo.jpg" alt=" ">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">// The best cleanning shoes</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Kami Mencuci Dengan Semangat</h1>
                                <p class="text-light fs-5 mb-4 pb-3"></p>
                                <a href="#menu" class="btn btn-primary rounded-pill py-3 px-5">Baca Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="asset/img/jumbo22.jpg" alt="" >
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">// The best cleanning shoes</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Kami Mencuci dengan semangat</h1>
                                <a href="#menu" class="btn btn-primary rounded-pill py-3 px-5">Baca selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <h2 class="text-center" id="menu">Menu Pelayanan</h2>
    <div class="container-xxl py-5">
        <div class="container " >
            @error('nama')
            <div class="col-lg-12 text-center">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>    
            @endError
           
            <div class="row g-4" >
                <div class="col-lg-6 col-md-6 wow fadeIn" data-wow-delay="0.1s" style="cursor: pointer">
                    <div class="fact-item bg-light rounded text-center h-100 p-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="asset/cshoes.png" class="px-2 py-2" style="width: 100px;" alt="">
                        <p class="mb-2">Menu Cleanning</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeIn" data-wow-delay="0.3s" style="cursor: pointer">
                    <div class="fact-item bg-light rounded text-center h-100 p-5" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <img src="asset/shoes.png" class="px-2 py-2" style="width: 100px;" alt="">
                        <p class="mb-2">Menu Repaint</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-xxl py-6" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row img-twice position-relative h-100">
                        <div class="col-6">
                            <img class="img-fluid rounded" src="asset/img/LOGO SALVATOR.png" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid rounded" src="asset/img/shoe.png" alt="" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">// Tentang Kami</p>
                        <h1 class="display-6 mb-4">Kami Mencuci Setiap Sepatu Dari Hati Kami</h1>
                        <p class="fs-4">Salvator adalah jasa cuci sepatu terbaik di kota Medan <br>
                        Salvator didirikan pada tanggal 25 Mei 2020 nama<br> Salvator berasal dari bahasa Spanyol "SALVATORE"<br> Yang berati Penyelamat</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <button class="btn btn-lg btn-outline-warning">Selengkapnya</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Product Start -->
    <div class="container-xxl bg-light my-6 py-6 pt-0" id="product">
        <div class="container">
            <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 fs-1 text-light mb-0">Pembersih Sepatu Terbaik di Kota Medan</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-flex align-items-center text-start">
                            <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                            <div class="ms-4">
                                <p class="fs-5 fw-bold mb-0">Hubungi Kami</p>
                                <p class="fs-4 fw-bold mb-0">+6282298800930</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;" > 
                <p class="text-primary text-uppercase mb-2">// Jenis Pencucian</p>
                <h1 class="display-6 mb-4">Kategori  Pembersihan Sepatu Kami</h1>
            </div>
            <div class="row g-4">
                @foreach ($menu as $mu)
                
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                    <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                        <div class="text-center p-4">
                            <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">@duit($mu->harga)</div>
                            <h3 class="mb-3 " style="font-family: serif">{{ $mu->pelayanan }}</h3>
                            <span class="text-capitalize fs-6">{{ $mu->detail }}</span>
                        </div>
                        <div class="position-relative mt-auto " >
                            <img class="img-fluid" src="asset/img/{{ $mu->gambar }} " style="width:100%; height:350px;" alt="">
                            <div class="product-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href="http://{{ $mu->link }}"><i class="fa fa-eye text-primary"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
              
            </div>
        </div>
    </div>
    <!-- Product End -->


    
    <!-- Team Start -->
    <div class="container-xxl py-6" id="contact">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">// Tim Kami</p>
                <h1 class="display-6 mb-4">Kami Sangat Profesional Dalam Keahlian Kami</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="asset/img/team1.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5 class="text-capitalize">dimas habisyaid</h5>
                                <span>Profesional</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="asset/img/team2.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5 class="text-capitalize">cher alfath</h5>
                                <span>Profesional</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" src="asset/img/team3.jpg" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5 class="text-capitalize">Elma bilkisti</h5>
                                <span>Profesional</span>
                            </div>
                            <div class="team-social">
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-light rounded-circle" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl bg-light my-6 py-6 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">// 
                    Ulasan Klien</p>
                <h1 class="display-6 mb-4">Tempat Terbaik Laundry Sepatu Di MEDAN</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="asset/img/testimonial-1.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Nissa</h5>
                            <span>Beauty Vlogger</span>
                        </div>
                    </div>
                    <p class="mb-0">pelayanannya terbaik, memuaskan dan sepatu menjadi sangat wangi</p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="asset/img/testimonial-2.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Fajar</h5>
                            <span>Mahasiswi</span>
                        </div>
                    </div>
                    <p class="mb-0">pelayanannya ramah, harganya terjangkau, dan waktu pengerjaan efisien.</p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="asset/img/testimonial-3.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Fattah</h5>
                            <span>Pengusaha</span>
                        </div>
                    </div>
                    <p class="mb-0">Hasilnya cukup memuaskan, bersih, wangi, waktu pengerjaan cepat dan pastinya murah.</p>
                </div>
                <div class="testimonial-item bg-white rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="asset/img/testimonial-4.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Adelia</h5>
                            <span>Guru</span>
                        </div>
                    </div>
                    <p class="mb-0">waktu pengerjaan sangat cepat, free delivery dan harga sangat terjangkau.</p>
                </div>
            </div>
           
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn " data-wow-delay="0.1s" >
        <div class="container py-5">
            <div class="row g-5 d-flex justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Alamat Salvator</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>MMHC+RC9, Jl. Platina I, Titi Papan, Kec. Medan Deli, Kota Medan, Sumatera Utara 20242</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>082298800930</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>salvatorshoescleanandshine@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://www.instagram.com/salvatorshoes_/?hl=id"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://wa.me/+6282298800930"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href="https://mail.google.com/mail/u/0/#sent?compose=DmwnWrRnXdxzSdtQPmRLLMQVqCdWbTqvrbSclNghrbCNRlBBtLlQBhxdjlmZJlRBMhRZNhfvrvwl"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Photo Gallery</h4>
                    <div class="row g-2">
                        @foreach ($menu as $mu)
                        <div class="col-3">
                            <img class="img-fluid bg-light rounded p-1" src="asset/img/{{ $mu->gambar }}" alt="Image">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">M Dandy Cahyadi</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    @endsection