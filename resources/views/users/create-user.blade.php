@extends('layouts.app')

@section('title', 'Create User')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
    <li class="breadcrumb-item active">Create</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid mb-4">
    <form action="{{ route('user.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-lg-12">
          {{-- TODO:Integrate with sweetalert --}}
          {{-- @include('utils.alerts') --}}
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input class="form-control" type="email" name="email" required>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input class="form-control" type="number" name="phone" required>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="position">Position <span class="text-danger">*</span></label>
                    <select class="form-control" name="position" id="position" required>
                      <option value="" selected disabled>Select Position</option>
                      <option value="employee">Employee</option>
                      <option value="owner">Owner</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="4"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Create User <i class="bi bi-plus"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
