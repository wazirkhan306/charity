@extends('dashboard.layouts.main')

@section('dashboardcontent')
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title"><i class="icon-feather-user-plus"></i> Update Project </h3>
    </div>
  </div>
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
                <form action="{{ route('Projects.update', $project->id) }}" method="POST"  role="form" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Title </label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{$project->title}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price">Price </label>
                            <input type="number" class="form-control" id="price" min="0" placeholder="Enter price" name="price" value="{{$project->price}}">
                        </div>
                    </div>
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
                  </div>
                </li>
              </ul>
            </div>
          </div>
          </form>
        </div>
        <!-- End Default Light Table -->
      </div>
      @endsection
      @push('scripts')
      <script src=" {{asset('dashboardassets/ckeditor/ckeditor.js')}} "></script>
      @endpush
