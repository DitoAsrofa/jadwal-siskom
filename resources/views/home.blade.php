@extends('layouts.admin')
@php
    // use Illuminate\Carbon;
    use Carbon\Carbon;
@endphp


@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard Penjadwalan Seminar') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (Auth::user()->hak_akses == 'Admin')
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Ruangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ruangan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Mahasiswa
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahmahasiswa }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                {{-- <i class="fa-solid fa-computer"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Dosen</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dosen }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                {{-- <i class="fa-solid fa-computer"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Users -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Users') }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Ruangan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ruangan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Informasi Jadwal {{ $hari }}
                </div>
                <div class="card-body">
                    @if (Auth::user()->hak_akses == 'Admin')
                        <a href="{{ route('input-home') }}" class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i>
                            Tambah Data</a>
                        <div class="table-responsive">
                            {{-- @dd($hari) --}}
                            {{-- @dd(Carbon::now()->isoFormat('D MMMM Y')) --}}
                            {{-- @dd(date("d F Y")) --}}
                            {{-- @dd(translatedFormat('l jS F Y')) --}}
                            <table id="datatablesSimple" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Judul</th>
                                        <th>Jenis Seminar</th>
                                        <th>Dosen Pembimbing 1</th>
                                        <th>Dosen Pembimbing 2</th>
                                        <th>Dosen Penguji 1</th>
                                        <th>Dosen Penguji 2</th>
                                        <th>Ruangan</th>
                                        <th>Tanggal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $jw)
                                        <tr>
                                            <td>{{ ($jadwal->currentPage() - 1) * $jadwal->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $jw->mahasiswa->nama_mahasiswa }}</td>
                                            {{-- @dd( $jw->matakuliah) --}}
                                            {{-- @dd($jw->matakuliah) --}}
                                            <td>{{ $jw->judul }}</td>
                                            <td>{{ $jw->jenis_seminar }}</td>
                                            <td>{{ $jw->pembimbing1_id ? $jw->pembimbing1->nama_dosen : '-' }}</td>
                                            <td>{{ $jw->pembimbing2_id ? $jw->pembimbing2->nama_dosen : '-' }}</td>
                                            <td>{{ $jw->penguji1_id ? $jw->penguji1->nama_dosen : '-' }}</td>
                                            <td>{{ $jw->penguji2_id ? $jw->penguji2->nama_dosen : '-' }}</td>
                                            <td>{{ $jw->ruangan->ruangan }}</td>
                                            {{-- <td>{{ date('d-m-Y', strtotime($jw->tgl)) }}</td> --}}
                                            <td>{{ Carbon::parse($jw->tgl)->translatedFormat('l, d F Y') }}</td>
                                            <td>{{ date('H:i', strtotime($jw->jam_mulai)) }}</td>
                                            <td>{{ date('H:i', strtotime($jw->jam_selesai)) }}</td>
                                            <td class="d-flex justify-content-center"><a
                                                    href="{{ url('update', $jw->id) }}" class="btn btn-warning mr-1"><i
                                                        class="fa-solid fa-pen-to-square"></i> </a><a
                                                    href="{{ url('delete', $jw->id) }}" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash-can"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table id="datatablesSimple" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Jam</th>
                                        <th>Judul</th>
                                        <th>Jenis Seminar</th>
                                        <th>Ruang</th>
                                        <th>Dosen Pembimbing 1</th>
                                        <th>Dosen Pembimbing 2</th>
                                        <th>Dosen Penguji 1</th>
                                        <th>Dosen Penguji 2</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $jw)
                                        <tr>
                                            <td>{{ ($jadwal->currentPage() - 1) * $jadwal->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $jw->mahasiswa->nama_mahasiswa }}</td>
                                            <td>{{ date('H:i', strtotime($jw->jam_mulai)) }} -
                                                {{ date('H:i', strtotime($jw->jam_selesai)) }}</td>
                                            <td>{{ $jw->judul }}</td>
                                            <td>{{ $jw->jenis_seminar }}</td>
                                            <td>{{ $jw->ruangan->ruangan }}</td>
                                            <td>{{ Carbon::parse($jw->tgl)->translatedFormat('l, d F Y') }}</td>
                                            <td>{{ $jw->pembimbing1->nama_dosen ?? '-' }}</td>
                                            <td>{{ $jw->pembimbing2_id ? $jw->pembimbing2->nama_dosen : '-' }}</td>
                                            <td>{{ $jw->penguji1_id ? $jw->penguji1->nama_dosen : '-' }}</td>
                                            <td>{{ $jw->penguji2_id ? $jw->penguji2->nama_dosen : '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <div class="card-footer">
                        {{ $jadwal->links() }}
                    </div>
                </div>
            </div>

            <!-- Project Card Example -->


            <!-- Color System -->


            <!-- Approach -->


        </div>
    </div>
    @include('sweetalert::alert')

@endsection
