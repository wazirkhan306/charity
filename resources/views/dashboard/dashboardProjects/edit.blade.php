@extends('dashboard.layouts.main')

@section('dashboardcontent')
<!-- ============================================= links Content Start Setting ============================================= -->
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title"><i class="icon-feather-user-plus"></i> Update Project </h3>
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
                <form action="{{ route('Projects.update', $project->id) }}" method="POST"  role="form" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title </label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{$project->title}}">
                        </div>
                    </div>
                    <!-- ============================================= links Content Start Setting ============================================= -->

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="image">Upload Image </label>
                            <div class="mb-3 mx-auto">
                                <img src="{{asset('storage/projects/image/'.$project->image)}}" alt="User Avatar" width="320" height="240" >
                               </div>
                            <input type="file" name="image{{ $errors->has('image') ? ' is-invalid' : '' }}" class="btn btn-sm btn-white d-table  mt-4"  accept="image/*" >
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
                               <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/projects/video/'.$project->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <input type="file" name="video{{ $errors->has('video') ? ' is-invalid' : '' }}" class="btn btn-sm btn-white d-table  mt-4"  accept=" video/*" >
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
                            <textarea name="description" id=""  rows="3" class="ckeditor form-control" placeholder="description">{!! $project->description !!}</textarea>
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
