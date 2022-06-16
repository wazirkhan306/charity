@extends('dashboard.layouts.main')

@section('dashboardcontent')
<!-- ============================================= links Content Start Project ============================================= -->
<!-- / .main-navbar -->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">×</span>
    </button>
  <i class="icon-material-outline-check mx-2"></i>
<strong>Success!</strong> {{ $message }}</div>
@endif
  <!-- ============================================= links Content Start Project ============================================= -->
@if ($message = Session::get('Delete'))
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <i class="icon-material-outline-check mx-2"></i>
<strong>Delete!</strong> {{ $message }} </div>
@endif
<!-- ============================================= links Content Start Project ============================================= -->
  <div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">
        <i class=" icon-feather-user-plus"></i> Projects
         @auth('web')
          <a href="{{ route('Projects.create') }}" class="mb-2 btn btn-success mr-2">
            <i class="icon-material-outline-add-circle-outline"></i> Add New Project
        </a>
        @endauth
          </h3>
        </div>
      </div>
      <!-- ============================================= links Content Start Project ============================================= -->
      <!-- End Page Header -->
      <!-- Default Light Table -->
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card card-small lo-stats h-100">
            <div class="card-header border-bottom">
              <h6 class="m-0">Latest Projects</h6>
              <div class="block-handle"></div>
            </div>
            <div class="card-body p-0">
              <div class="container-fluid px-0">
                <table class="table mb-0">
                  <thead class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                      <th> S.No </th>
                      <th class="text-center">Title</th>
                      <th class="text-center">Image</th>
                      <th class="text-left">Description</th>
                      <th class="text-left">Video</th>
                      @auth('web')
                      <th class="text-right">Actions</th>
                      @endauth
                    </tr>
                  </thead>
                  <tbody>
                    <!-- ============================================= links Content Start User ============================================= -->
                    @foreach($projects as $key=> $project)

                    <tr >
                      <td >{{$key+1}}</td>
                      <td class="lo-stats__order-details">
                        {{$project->title }}
                      </td>
                      <td>
                        <img src="{{asset('storage/projects/image/'.$project->image)}}" alt="project-img" width="150" height="150">
                      </td>
                      <td>
                        {!!$project->description !!}
                      </td>
                      <!-- ============================================= links Content Start User ============================================= -->
                      <td class="lo-stats__total  text-success">
                        <video width="150" height="150" controls>
                            <source src="{{ asset('storage/projects/video/'.$project->video) }}" type="video/mp4">
                        </video>
                      </td>
                      <!-- ============================================= links Content Start User ============================================= -->
                      @auth('web')
                      <td class="text-center">
                        <div class="btn-group d-table ml-auto" role="group" aria-label="Basic example">
                          <a href="{{ route('Projects.edit',$project->id)}}" class="mb-2 btn btn-sm btn-primary"><i class="icon-feather-edit-2"></i> Edit</a>
                          <form action="{{ route('Projects.destroy',$project->id) }}" method="POST" files="true" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="mb-2 btn btn-sm btn-danger" type="submit"><i class="icon-material-outline-delete"></i> Delete</button>
                          </form>
                        </div>
                      </td>
                      @endauth
                    </tr>
                    @endforeach
                    <!-- ============================================= links Content Start User ============================================= -->
                  </tbody>

                </table>
              </div>
            </div>
            <!-- ============================================= links Content Start Project ============================================= -->
            <div class="card-footer border-top">
              <div class="row">
                <div class="col">
                  <!-- ============================================= links Content Start Project ============================================= -->
                    {{--  {!! $Projects->links() !!}  --}}
                    <!-- ============================================= links Content Start Project ============================================= -->
                  </div>
                  <div class="col text-right view-report">
                    <!-- ============================================= links Content Start Project ============================================= -->
                    {{--  @if(COUNT($Projects) != NULL)
                    <a>Showing 10 to {{ COUNT($Projects) }} of {{ COUNT($Projects) }} Projects</a>
                    @else
                    <a>Showing 10 to 0 of 0 Projects</a>
                    @endif  --}}
                    <!-- ============================================= links Content Start Project ============================================= -->
                  </div>
              </div>
              <!-- ============================================= links Content Start Project ============================================= -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Default Light Table -->
      <!-- Default Dark Table -->
      <!-- End Default Dark Table -->
    </div>
    @endsection
