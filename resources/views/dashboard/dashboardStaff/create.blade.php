@extends('dashboard.layouts.main')

@section('dashboardcontent')
<!-- ============================================= links Content Start Setting ============================================= -->
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title"><i class="icon-feather-user-plus"></i> Add Staff </h3>
    </div>
  </div>
  <!-- ============================================= links Content Start Setting ============================================= -->
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-8">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">Staff Details</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <!-- ============================================= links Content Start Setting ============================================= -->
                <form action="{{ route('staff.store') }}" method="POST"  role="form" enctype="multipart/form-data">
                  @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="feFirstName">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Phone Number" name="phone" required>
                        </div>
                    </div>
                    <!-- ============================================= links Content Start Setting ============================================= -->
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>

                      </div>
                      <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control"  name="password" required
                        placeholder="Password">
                        </div>
                      <div class="form-group col-md-12">
                        <textarea name="address" id=""  rows="3" class="form-control" placeholder="Address"></textarea>
                      </div>
                      </div>
                      <button type="submit" class="btn btn-accent">Add Staff</button>
                    </div>
                    <!-- ============================================= links Content Start Setting ============================================= -->
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- ============================================= links Content Start Setting ============================================= -->
          <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
              <div class="card-header border-bottom text-center mb-5" style="border-radius: 10px;">
                <div class="mb-3 mx-auto">
                  <img src="{{ asset('Adminassets/images/1.png') }}" alt="User Avatar" width="110"> </div>
                  <input type="file" name="image{{ $errors->has('image') ? ' is-invalid' : '' }}" class="btn btn-sm btn-white d-table mx-auto mt-4">
                   @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
              </div>
            </div>
          </form>
          <!-- ============================================= links Content Start Setting ============================================= -->
        </div>
        <!-- End Default Light Table -->
      </div>
      <!-- ============================================= links Content Start Setting ============================================= -->
      @endsection
