@extends('layouts.master')
@section('title')
    Halaman Edit Category
@endsection

@section('content')
<form action="/category/{{ $category->id }}" method="POST">
  @csrf
  @method('PUT')

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Category Description</label>
    <textarea class="form-control" name="description" cols="30" rows="10">{{ $category->description }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection