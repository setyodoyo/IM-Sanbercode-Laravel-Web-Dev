@extends('layouts.master')
@section('title')
    Halaman Tampil Category
@endsection

@section('content')
<a href="/category/create" class="btn btn-primary btn-sm mb-3">Tambah Category</a>

@session('success')
    <div class="alert alert-success">
        {{$value}}
    </div>
@endsession

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $category)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $category->name }}</td>
      <td>
        <form action="/category/{{ $category->id }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <a href="/category/{{ $category->id}}" class="btn btn-info btn-sm">Detail</a>
          <a href="/category/{{ $category->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
          <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">)
        </form>
      </td>
    </tr>
    @empty
        <tr>
            <td>Tidak ada category</td>
        </tr>
    @endforelse

  </tbody>
</table>

@endsection