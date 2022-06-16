@extends('dashboard.layouts.main')

@section('dashboardcontent')
<!-- ============================================= links Content Start Setting ============================================= -->
<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title"><i class="icon-feather-user-plus"></i> Assign Project </h3>
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
                <form action="{{ route('project.assign_save') }}" method="POST"  role="form" enctype="multipart/form-data">
                  @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="feInputState">Staff</label>
                            <select id="feInputState" class="form-control" name="staff_id">
                            <option selected>Choose Staff</option>
                            <!-- ============================================= links Content Start Setting ============================================= -->
                            @if($staffs !== NULL)
                                @foreach($staffs as $staff)
                                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            @else
                            <!-- ============================================= links Content Start Setting ============================================= -->
                            <span class="badge badge-pill badge-info">NO Role</span>
                            @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="feInputState">Project</label>
                            <select id="feInputState" class="form-control" name="project_id">
                            <option selected>Choose Project</option>
                            <!-- ============================================= links Content Start Setting ============================================= -->
                            @if($projects !== NULL)
                                @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                                @endforeach
                            @else
                            <!-- ============================================= links Content Start Setting ============================================= -->
                            <span class="badge badge-pill badge-info">NO Role</span>
                            @endif
                        </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-accent">Assign Project</button>
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

