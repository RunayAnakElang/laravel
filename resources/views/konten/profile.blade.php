@extends('layouts.app')

@section('content')
<div class="container">
    <h1>profile</h1>
    <form action="/users/{{ $users->id}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nama</label>
            <input type="text" name="name" value="{{ $users->name }}" class="form-control" id="exampleInputPassword1">
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" value="{{ $users->email }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">umur</label>
            <input type="text" name="umur" value="{{ $users->umur }}" class="form-control" id="exampleInputPassword1">
          </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">alamat</label>
          <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ $users->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
