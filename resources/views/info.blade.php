<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info Page</title>
    <!-- Favicons -->
    <link href="{{ asset('img/Logo-Untan.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    {{-- {{ asset('vendor/swiper/swiper-bundle.min.css') }} --}}
    {{-- <link href="{{ asset('vendor/bootstrap-home/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .atas {
            background-color: orange;
            height: 50px;
            ;
        }

        .section-header-breadcrumb {
            display: flex;
            justify-content: flex-end;
            font-size: 20px;
            font-weight: bold;
        }

        .breadcrumb-item {
            margin-left: 20px;
        }

        .text-primary {
            color: blue;
        }

        .section-header {
            max-width: 1400px;
            /* Sesuaikan dengan lebar yang diinginkan */
            margin: 0 auto;
            margin-top: -30px;
            height: 70px;
            text-align: center;
            border-radius: 20px;
            background-color: whitesmoke;
            display: flex;
        }

        .section-header img {
            margin-right: auto;
            /* Gambar tetap di kiri */
        }

        .breadcrumb-item {
            font-size: 20px;
            margin-right: 20px;
            margin-top: 20px;
        }

        .section-header img {
            margin-left: 20px;
            margin-top: 10px;
        }

        .thead {
            display: table-header-group;
            vertical-align: middle;
            horizontal-align: middle;
            unicode-bidi: isolate;
            border-color: inherit;
        }

        /* Tambahkan CSS untuk mengatur posisi card dan judul */
        .section-title {
            margin-top: -30px;
            /* Mengurangi jarak antara judul dan header */
        }

        .carousel-inner {
            margin-top: -20px;
            /* Mengurangi jarak antara carousel dan judul */
        }

        .card-body p {
            font-size: 15px;
            /* Mengatur ukuran font pada data di dalam card */
        }
    </style>

</head>

<body>
    <header>
        <div class="atas"></div>
        <div class="section-header">
            <img src="http://info-dekan.fmipa-untan.id/logo-mipa-dark.png" alt="logo bermasalah" width="250"
                height="50">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <span id="tanggalwaktu" class="text-primary"></span> / Pukul: <span id="jam"
                        class="text-primary"></span> WIB
                </div>
            </div>
        </div>

    </header><!--end header-->

    <main id="main">
        <section id="jadwal" class="features">
            <div class="container-fluid">
                <div class="section-title">
                    <h2>Jadwal Seminar Prodi Rekayasa Sistem Komputer</h2>
                </div>
                <div class="container mt-100" style="background-color:aqua; max-width: 1200px;">
                    <div id="jadwalCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner">
                            @foreach ($jadwal->chunk(2) as $chunk)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach ($chunk as $jw)
                                            <div class="col-6">
                                                <div class="card mt-2 mb-2"
                                                    style="max-width: 600px; height:400px; overflow: hidden;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4" style="margin-top:10px">
                                                            <img src="{{ asset('img/Logo-Untan.png') }}"
                                                                class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body" style="overflow-y: auto;">
                                                                <h6 class="card-title">{{ $jw->judul }}</h6>
                                                                <p class="card-text" style="margin-bottom: 1px;">
                                                                    Mahasiswa:
                                                                    {{ $jw->mahasiswa->nama_mahasiswa }}</p>
                                                                <p class="card-text" style="margin-bottom: 1px;">Jam:
                                                                    {{ date('H:i', strtotime($jw->jam_mulai)) }} -
                                                                    {{ date('H:i', strtotime($jw->jam_selesai)) }}</p>
                                                                <p class="card-text" style="margin-bottom: 1px;">Jenis
                                                                    Seminar:
                                                                    {{ $jw->jenis_seminar }}</p>
                                                                <p class="card-text" style="margin-bottom: 1px;">Ruang:
                                                                    {{ $jw->ruangan->ruangan }}
                                                                </p>
                                                                <p class="card-text">
                                                                    Tanggal:
                                                                    {{ \Carbon\Carbon::parse($jw->tgl)->translatedFormat('l, d F Y') }}
                                                                </p>
                                                                <p class="card-text" style="margin-bottom: 1px;">Dosen
                                                                    Pembimbing 1:
                                                                    {{ $jw->pembimbing1_id ? $jw->pembimbing1->nama_dosen : '-' }}
                                                                </p>
                                                                <p class="card-text" style="margin-bottom: 1px;">Dosen
                                                                    Pembimbing 2:
                                                                    {{ $jw->pembimbing2_id ? $jw->pembimbing2->nama_dosen : '-' }}
                                                                </p>
                                                                <p class="card-text" style="margin-bottom: 1px;">Dosen
                                                                    Penguji 1:
                                                                    {{ $jw->penguji1_id ? $jw->penguji1->nama_dosen : '-' }}
                                                                </p>
                                                                <p class="card-text" style="margin-bottom: 1px;">Dosen
                                                                    Penguji 2:
                                                                    {{ $jw->penguji2_id ? $jw->penguji2->nama_dosen : '-' }}
                                                                </p>
                                                                {{-- <p class="card-text"><small class="text-muted">Last
                                                                        updated 3 mins ago</small></p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#jadwalCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#jadwalCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main><!-- End #main -->

    <footer
        style="align: center; position: fixed;
                border-bottom: 1px solid # border-bottom: 1px solid #030379;
                background-color: # background-color: #ffffff;bottom:0;z-index:10000; width:100%;">
        <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
            <div class="d-flex flex-row" style="background-color: orange;">
                <span class="d-flex align-items-center" style="font-size: 15px; font-weight: bold;">&nbsp;Breaking
                    News</span>
            </div>
            <marquee style="font-size: 20px;" class="news-scroll" behavior="scroll" direction="left"
                onmouseover="this.stop();" onmouseout="this.start();">
                <a class="text-primary">Pontianak, 5 September 2022 – Hari ini (5/9), Fakultas Matematika dan Ilmu
                    Pengetahuan Alam Universitas Tanjungpura (FMIPA Untan) melepas mahasiswa/i peserta kegiatan
                    Kurikulum Merdeka Belajar Kampus Merdeka (MBKM).</a> <span><img
                        src="http://info-dekan.fmipa-untan.id/untan.png" alt="" width="20"
                        height="20" style="margin-top: -5px;"></span>
                <a class="text-primary">Pontianak - Sebanyak 120 mahasiswa Fakultas Matematika dan Ilmu Pengetahuan
                    Alam Universitas Tanjungpura (FMIPA UNTAN) mengikuti yudisium Sarjana Sains, Sarjana Komputer,
                    Sarjana Matematika, dan Sarjana Statistika FMIPA UNTAN pada Selasa (24/1/2023).</a> <span><img
                        src="http://info-dekan.fmipa-untan.id/untan.png" alt="" width="20"
                        height="20" style="margin-top: -5px;"></span>
                <a class="text-primary">Hari Anak Nasional yang diperingati setiap tanggal 23 Juli ini tak dilewatkan
                    begitu saja oleh ASTON Pontianak. Bersama dengan Chemistry Insight Center Universitas Tanjungpura
                    atau yang disebut CIC UNTAN menggelar kegiatan Fun Science Activity pada 23 dan 24 Juli 2022
                    bertempat di Garden Lounge ASTON Pontianak.</a> <span><img
                        src="http://info-dekan.fmipa-untan.id/untan.png" alt="" width="20"
                        height="20" style="margin-top: -5px;"></span>
            </marquee>
        </div>
    </footer>


    <!-- Vendor JS Files -->
    {{-- {{ asset('vendor/swiper/swiper-bundle.min.css') }} --}}
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!--Js Waktu -->
    <script src="{{ asset('js/waktu.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script>
        function updateTime() {
            const now = new Date();

            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayName = days[now.getDay()];
            const date = now.getDate().toString().padStart(2, '0');
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ];
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();

            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const tanggalwaktu = `${dayName}, ${date} ${monthName} ${year}`;
            const jam = `${hours}:${minutes}:${seconds}`;

            document.getElementById('tanggalwaktu').textContent = tanggalwaktu;
            document.getElementById('jam').textContent = jam;
        }

        setInterval(updateTime, 1000);
        updateTime(); // Initial call to display time immediately on load
    </script>
    {{-- <script>
        new DataTable('.table');
    </script> --}}


</body>

</html>
