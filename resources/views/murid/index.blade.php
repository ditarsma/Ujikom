@extends('layouts.app')

@section('content')
    <h1>Data Murid</h1>
    <a href="{{ route('murid.create') }}" class="btn btn-primary mb-3">Tambah Murid</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($murid as $m)
                <tr>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->alamat }}</td>
                    <td>{{ $m->jenis_kelamin }}</td>
                    <td>{{ $m->kelas }}</td>
                    <td>
                        @if($m->foto)
                            <img src="{{ asset('storage/' . $m->foto) }}" alt="Foto" width="50" class="img-thumbnail">
                        @else
                            <p>Tidak ada foto</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('murid.show', $m->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('murid.edit', $m->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('murid.destroy', $m->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
