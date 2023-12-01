@extends('layouts.app')

@section('title', 'Edit User')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid mb-4">
    <form action="/users/{{ $user->id }}" method="POST">
      @csrf
      @method('patch')
      <div class="row">
        <div class="col-md-12">
          @include('utils.alerts')

          <div class="card">
            <div class="card-body">
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" required value="{{ $user->name }}">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" required value="{{ $user->email }}">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ $user->address }}</textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="phone" value="{{ $user->phone }}" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <button class="btn btn_color" type="submit">Update User <i class="bi bi-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
