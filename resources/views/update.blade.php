@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Jadwal Seminar') }}</h1>

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



    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3>Edit Jadwal</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('update', $jdl->id) }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="judul">Judul<span style="color: red;">*</span></label>
                        <input type="text" id="judul" name="judul" placeholder="Masukkan judul"
                            class="form-control" maxlength="200" value="{{ $jdl->judul }}" required
                            pattern="[a-zA-Z'-'\s]*">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mahasiswa_id">Mahasiswa<span style="color: red;">*</span></label>
                                <select class="form-control select2" style="width: 100%" name="mahasiswa_id"
                                    id="mahasiswa_id" required>
                                    <option selected disabled value="">Pilih Mahasiswa</option>
                                    <option selected value="{{ $jdl->mahasiswa_id }}">{{ $jdl->mahasiswa->nama_mahasiswa }}
                                    </option>
                                    @foreach ($mhs as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_mahasiswa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_seminar">Jenis Seminar<span style="color: red;">*</span></label>
                                <input type="textarea" id="jenis_seminar" name="jenis_seminar"
                                    placeholder="Masukkan Jenis Seminar" class="form-control" maxlength="100"
                                    value="{{ $jdl->jenis_seminar }}" required autocomplete="off" pattern="[a-zA-Z'-'\s]*">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pembimbing1_id">Dosen Pembimbing<span style="color: red;">*</span></label>
                                <select class="form-control select2" style="width: 100%" name="pembimbing1_id"
                                    id="pembimbing1_id" required>
                                    <option selected disabled value="">Pilih Dosen Pembimbing 1</option>
                                    <option selected value="{{ $jdl->pembimbing1_id }}">
                                        {{ $jdl->pembimbing1->nama_dosen }}</option>
                                    @foreach ($dos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pembimbing2_id">Dosen Pembimbing<span style="color: red;">*</span></label>
                                <select class="form-control select2" style="width: 100%" name="pembimbing2_id"
                                    id="pembimbing2_id" required>
                                    <option selected disabled value="">Pilih Dosen Pembimbing 2</option>
                                    <option selected value="{{ $jdl->pembimbing2_id }}">
                                        {{ $jdl->pembimbing2->nama_dosen }}</option>
                                    @foreach ($dos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penguji1_id">Dosen Penguji<span style="color: red;">*</span></label>
                                <select class="form-control select2" style="width: 100%" name="penguji1_id" id="penguji1_id"
                                    required>
                                    <option selected disabled value="">Pilih Dosen Penguji 1</option>
                                    <option selected value="{{ $jdl->penguji1_id }}">
                                        {{ $jdl->penguji1->nama_dosen }}</option>
                                    @foreach ($dos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penguji2_id">Dosen Penguji<span style="color: red;">*</span></label>
                                <select class="form-control select2" style="width: 100%" name="penguji2_id" id="penguji2_id"
                                    required>
                                    <option selected disabled value="">Pilih Dosen Penguji 2</option>
                                    <option selected value="{{ $jdl->penguji2_id }}">
                                        {{ $jdl->penguji2->nama_dosen }}</option>
                                    @foreach ($dos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idruangan">Ruangan<span style="color: red;">*</span></label>
                                <select class="form-control select2" style="width: 100%" name="idruangan" id="idruangan"
                                    required>
                                    <option selected disabled value="">Pilih Ruangan</option>
                                    <option selected value="{{ $jdl->idruangan }}">{{ $jdl->ruangan->ruangan }}</option>
                                    @foreach ($ruang as $item)
                                        <option value="{{ $item->id }}">{{ $item->ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl">Tanggal<span style="color: red;">*</span></label>
                                <input type="date" id="tgl" name="tgl" placeholder="Masukkan tanggal"
                                    class="form-control" value="{{ $jdl->tgl }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jam_mulai">Jam Mulai<span style="color: red;">*</span></label>
                                <input type="time" id="jam_mulai" name="jam_mulai" placeholder="Masukkan Jam Mulai"
                                    class="form-control" value="{{ $jdl->jam_mulai }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jam_selesai">Jam Selesai<span style="color: red;">*</span></label>
                                <input type="time" id="jam_selesai" name="jam_selesai"
                                    placeholder="Masukkan Jam Selesai" class="form-control"
                                    value="{{ $jdl->jam_selesai }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
