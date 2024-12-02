@extends('layouts.app', ['activePage' => 'dashboard-admin', 'titlePage' => __('Dashboard Admin')])

@section('breadcrumb')
  <div class="container">
    <h3>Dashboard</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </nav>
@endsection

@section('content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Admin Absen Pages</h4>
                    <p class="category">Manage Student Absen</p>
                </div>
                <div class="card-body">
                  <a class="card-link" href="{{ route('admin.absens') }}">Go to page...</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Admin Rayon Pages</h4>
                    <p class="category">Manage Rayon</p>
                </div>
                <div class="card-body">
                  <a class="card-link" href="{{ route('admin.rayon.index') }}">Go to page...</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title">Admin Rombel Pages</h4>
                    <p class="category">Manage Rombel</p>
                </div>
                <div class="card-body">
                  <a class="card-link" href="{{ route('admin.rombel.index') }}">Go to page...</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Admin User Profile Pages</h4>
                    <p class="category">Manage Profile</p>
                </div>
                <div class="card-body">
                  <a class="card-link" href="{{ route('profile.edit') }}">Go to page...</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Admin Registration Pages</h4>
                    <p class="category">Manage Registration User</p>
                </div>
                <div class="card-body">
                  <a class="card-link" href="{{ route('admin.user.index') }}">Go to page...</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection