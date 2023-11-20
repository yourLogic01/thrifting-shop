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
    <form action="{{ route('home') }}" method="POST">
      @csrf
      @method('patch')
      <div class="row">
        <div class="col-lg-12">
          {{-- TODO:Integrate with sweetalert --}}
          {{-- @include('utils.alerts') --}}
        </div>
        <div class="col-md-8">
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

              <div class="form-group">
                <label for="is_active">Status <span class="text-danger">*</span></label>
                <select class="form-control" name="is_active" id="is_active" required>
                  <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
                  <option value="2" {{ $user->is_active == 2 ? 'selected' : '' }}>Deactive</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <button class="btn btn-primary">Update User <i class="bi bi-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
