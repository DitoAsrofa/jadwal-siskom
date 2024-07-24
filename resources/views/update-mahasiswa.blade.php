@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Jadwal Lab') }}</h1>

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
                <h3>Edit Mahasiswa</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('update-mahasiswa', $mhs->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="no_hp">NIM<span style="color: red;">*</span></label>
                        <input type="text" id="nim" name="nim" placeholder="Masukkan nim mahasiswa"
                            class="form-control" maxlength="11" value="{{ $mhs->nim }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nama<span style="color: red;">*</span></label>
                        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"
                            placeholder="Masukkan nama mahasiswa" class="form-control" value="{{ $mhs->nama_mahasiswa }}"
                            required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
