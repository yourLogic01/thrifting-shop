@extends('layouts.app')

@section('title', 'User Profile')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Profile</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        {{-- TODO:Integrate with sweetalert --}}
        {{-- @include('utils.alerts') --}}
        <h3>Hello, <span class="text-primary">{{ auth()->user()->name }}</span></h3>
        <p class="font-italic">Change your profile information from here.</p>
      </div>
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <form action="/user-profile/{{ auth()->user()->id }}" method="post">
              @csrf
              @method('patch')
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" required value="{{ auth()->user()->name }}">
                    @error('name')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" required
                      value="{{ auth()->user()->email }}">
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="3">{{ auth()->user()->address }}</textarea>
                    @error('address')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="number" name="phone" value="{{ auth()->user()->phone }}"
                      required>
                    @error('phone')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-8">
                  <button type="submit" class="btn btn_color">Update Profile <i class="bi bi-check"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
