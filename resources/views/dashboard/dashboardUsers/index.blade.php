@extends('dashboard.layouts.main')

@section('dashboardcontent')
<!-- ============================================= links Content Start User ============================================= -->
<!-- / .main-navbar -->
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <i class="icon-material-outline-check mx-2"></i>
<strong>Success!</strong> {{ $message }}</div>
@endif
  <!-- ============================================= links Content Start User ============================================= -->
@if ($message = Session::get('Delete'))
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
  <i class="icon-material-outline-check mx-2"></i>
<strong>Delete!</strong> {{ $message }} </div>
@endif
<!-- ============================================= links Content Start User ============================================= -->
  <div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title"><i class=" icon-feather-user-plus"></i> Admin
          {{--  <a href="{{ route('dashboardUsers.create') }}" class="mb-2 btn btn-success mr-2">
            <i class="icon-material-outline-add-circle-outline"></i> Add New</a>
          </h3>  --}}
        </div>
      </div>
      <!-- ============================================= links Content Start User ============================================= -->
      <!-- End Page Header -->
      <!-- Default Light Table -->
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card card-small lo-stats h-100">
            <div class="card-header border-bottom">
              <h6 class="m-0">Latest User</h6>
              <div class="block-handle"></div>
            </div>
            <div class="card-body p-0">
              <div class="container-fluid px-0">
                <table class="table mb-0">
                  <thead class="py-2 bg-light text-semibold border-bottom">
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Email</th>
                      <th>Phone</th>
                      {{--  <th>Address</th>  --}}
                      {{--  <th>Actions</th>  --}}
                    </tr>
                  </thead>
                  <tbody>
                    <!-- ============================================= links Content Start User ============================================= -->
                    @foreach($users as $user)
                    <tr>
                      <td class="lo-stats__image">
                        <img class="border rounded" src="{{asset('storage/users/'.$user->avatar)}}">
                      </td>
                      <td class="lo-stats__order-details">
                        <span>{{ $user->name }}</span>
                        <span>{{ date('M j, Y', strtotime($user->created_at)) }}</span>
                      </td>
                      <!-- ============================================= links Content Start User ============================================= -->
                      <td>
                        @if ($user->role_id == 1)
                            Admin
                        @endif
                      </td>
                      <!-- ============================================= links Content Start User ============================================= -->
                      <td>
                          {{$user->email}}
                      </td>
                      <!-- ============================================= links Content Start User ============================================= -->
                      <td>
                        {{ $user->phone }}
                      </td>
                      <!-- ============================================= links Content Start User ============================================= -->
                      {{--  <td>
                    <a href="{{ URL::to('dashboard/dashboardUsers')}}/{{$user->name}}/edit" class="mb-2 btn btn-sm btn-primary"><i class="icon-feather-edit-2"></i> Edit</a>
                          <form action="{{ route('dashboardUsers.destroy',$user->id) }}" method="POST" files="true" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="mb-2 btn btn-sm btn-danger" type="submit"><i class="icon-material-outline-delete"></i> Delete</button>
                          </form>
                      </td>  --}}
                    </tr>
                    @endforeach
                    <!-- ============================================= links Content Start User ============================================= -->
                  </tbody>
                </table>
              </div>
            </div>
            <!-- ============================================= links Content Start User ============================================= -->
            <div class="card-footer border-top">
              <div class="row">
                <div class="col">
                  <!-- ============================================= links Content Start User ============================================= -->
                    {!! $users->links() !!}
                    <!-- ============================================= links Content Start User ============================================= -->
                  </div>
                  <div class="col text-right view-report">
                    <!-- ============================================= links Content Start User ============================================= -->
                    @if(COUNT($users) != NULL)
                    <a>Showing 10 to {{ COUNT($users) }} of {{ COUNT($users) }} User</a>
                    @else
                    <a>Showing 10 to 0 of 0 User</a>
                    @endif
                    <!-- ============================================= links Content Start User ============================================= -->
                  </div>
              </div>
              <!-- ============================================= links Content Start User ============================================= -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Default Light Table -->
      <!-- Default Dark Table -->
      <!-- End Default Dark Table -->
    </div>
    @endsection
