@extends('layouts.app')

@section('content')
    <h1>Edit Data Murid</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('murid.update', $murid->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" class="form-control" value="{{ $murid->nama }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" class="form-control">{{ $murid->alamat }}</textarea>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="Laki-laki" {{ $murid->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $murid->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" name="kelas" class="form-control" value="{{ $murid->kelas }}">
        </div>

        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="form-control">
            @if($murid->foto)
                <img src="/storage/foto_murid/{{ $murid->foto }}" width="100" class="img-thumbnail mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Data</button>
    </form>
@endsection
