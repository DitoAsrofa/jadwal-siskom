@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Data') }}</h1>

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
                <h3>Edit Dosen</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('update-dosen', $dos->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nip">NIP<span style="color: red;">*</span></label>
                        <input type="text" id="nip" name="nip" placeholder="Masukkan nomor NIP"
                            class="form-control" maxlength="10" value="{{ $dos->nip }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen">Nama Dosen<span style="color: red;">*</span></label>
                        <input type="text" id="nama_dosen" name="nama_dosen" placeholder="Masukkan nama dosen"
                            class="form-control" value="{{ $dos->nama_dosen }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">HP<span style="color: red;">*</span></label>
                        <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan no hp"
                            class="form-control" required autocomplete="off" value="{{ $dos->no_hp }}" pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir<span style="color: red;">*</span></label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="" class="form-control"
                            required autocomplete="off" value="{{ $dos->tanggal_lahir }}" pattern="[0-9]+">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
