@extends('dashboard.layouts.main')

@section('dashboardcontent')
<!-- ============================================= links Content Start Setting ============================================= -->
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title"><i class="icon-feather-user-plus"></i> Add Project </h3>
    </div>
  </div>
  <!-- ============================================= links Content Start Setting ============================================= -->
  <!-- End Page Header -->
  <!-- Default Light Table -->
  <div class="row">
    <div class="col-lg-10">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0"> Project  Details</h6>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item p-3">
            <div class="row">
              <div class="col">
                <!-- ============================================= links Content Start Setting ============================================= -->
                <form action="{{ route('Projects.store') }}" method="POST"  role="form" enctype="multipart/form-data">
                  @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title </label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                        </div>
                    </div>
                    <!-- ============================================= links Content Start Setting ============================================= -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="image">Upload Image </label>
                            <input type="file" name="image{{ $errors->has('image') ? ' is-invalid' : '' }}" class="btn btn-sm btn-white d-table  mt-4" accept="image/*" >
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
                        <div class="form-group col-md-6">
                            <label for="video">Upload Video</label>
                            <input type="file" name="video{{ $errors->has('video') ? ' is-invalid' : '' }}" class="btn btn-sm btn-white d-table  mt-4" accept=" video/*" >
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
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Description </label>
                            <textarea name="description" id=""  rows="3" class="ckeditor form-control" placeholder="description"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-accent">Add Project</button>
                    </div>
                    <!-- ============================================= links Content Start Setting ============================================= -->
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- ============================================= links Content Start Setting ============================================= -->

          </form>
          <!-- ============================================= links Content Start Setting ============================================= -->
        </div>
        <!-- End Default Light Table -->
      </div>
      <!-- ============================================= links Content Start Setting ============================================= -->
      @endsection

      @push('scripts')
      <script src=" {{asset('dashboardassets/ckeditor/ckeditor.js')}} "></script>
      @endpush
