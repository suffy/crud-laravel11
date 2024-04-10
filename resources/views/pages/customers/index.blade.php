@extends('layouts.home')

@section('content')
    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Semua Data Pelanggan</h4>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Pelanggan Baru</a>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Pelanggan</th>
              <th>Email Pelanggan</th>
              <th>Nomor Telepon</th>
              <th>Alamat Rumah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('customers.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $item->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                      </div>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection