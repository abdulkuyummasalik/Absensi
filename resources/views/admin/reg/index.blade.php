@extends('layouts.app', ['activePage' => 'reg-user'])

@section('breadcrumb')
  <div class="container">
    <h3>User Registration</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">User Registration</li>
    </ol>
  </nav>
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can manage users</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 text-left">
                  <button class="btn btn-md btn-info" id="sort-role"><span rel="tooltip" title="Sort By Role" class="material-icons"> filter_alt </span>Sort By Role</button>
                </div>
                <div class="col-6 text-right">
                  <button id="add-user" class="btn btn-sm btn-primary">Add user</button>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr>
                      <th> # </th>
                      <th> User ID </th>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Username </th>
                      <th> Role </th>
                      <th> Creation date </th>
                      <th> Terakhir di Ubah </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-capitalize"> 
                          @foreach ($user->admin as $detail)
                              {{ $detail->nama }}
                          @endforeach  
                          @foreach ($user->student as $detail)
                              {{ $detail->nama }}
                          @endforeach  
                        </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->username }} </td>
                        <td class="text-capitalize"> {{ $user->role }} </td>
                        <td> {{ $user->created_at->diffForHumans() }} </td>
                        <td> {{ $user->updated_at->diffForHumans() }} </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $users->links() !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

  
@endsection

@section('modal')
<div class="modal fade" id="user-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 id="user-modal-title">Edit User Student</h3>
            <button type="button" id="close-button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
        </div>
        <div id="this-modal"></div>
      </div>
  </div>
</div>
@endsection

@push('js')
  <script>
    $(function() {
      $("#sort-role").click(function() {
        Swal.fire({
          title: 'Sort by Role?',
          text: 'Choose Roles below',
          showDenyButton: true,
          confirmButtonText: 'Admin',
          denyButtonText: 'Student',
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = '/admin/adminSort';
          } else if (result.isDenied) {
            location.href = '/admin/studentSort';
          }
        })
      })

    async function studentCreate() {
      try {
          const response = await HitData(`{{ route('admin.student.create') }}`, null, 'GET')
          $('#uaer-modal-title').html('Create User Student');
          $('#user-modal').modal('show');
          $('#this-modal').html(response);
      } catch (error) {
          console.log(error.responseJSON.message);
      }
    }
    
    async function adminCreate() {
      try {
          const response = await HitData(`{{ route('admin.admin.create') }}`, null, 'GET')
          $('#user-modal-title').html('Create User Admin');
          $('#user-modal').modal('show');
          $('#this-modal').html(response);
      } catch (error) {
          console.log(error.responseJSON.message);
      }
    }

      $("#add-user").click(function() {
        Swal.fire({
          title: 'Wanna Add some User?',
          text: 'Choose Roles below',
          showDenyButton: true,
          confirmButtonText: 'Add Admin',
          denyButtonText: 'Add Student',
        }).then((result) => {
          if (result.isConfirmed) {
            adminCreate()
          } else if (result.isDenied) {
            studentCreate()
          }
        })
      })
    });
  </script> 
@endpush