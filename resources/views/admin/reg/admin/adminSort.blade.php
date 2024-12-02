@extends('layouts.app', ['activePage' => 'reg-user'])

@section('breadcrumb')
  <div class="container">
    <h3>Admin User Registration</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.user.index') }}">User Registration</a></li>
      <li class="breadcrumb-item active" aria-current="page">Admin User Registration</li>
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
              <h4 class="card-title ">Admins</h4>
              <p class="card-category"> Here you can manage users Admin</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 text-left">
                  <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-success"><span class="material-icons">arrow_back</span></a>
                  <a href="{{ route('admin.student-sort') }}" class="btn btn-sm btn-info">Students</a>
                </div>
                <div class="col-6 text-right">
                  <a href="#" onclick="adminCreate()" id="admin-add" class="btn btn-sm btn-primary">Add admin</a>
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
                      <th> Creation date </th>
                      <th> Terakhir di Ubah </th>
                      <th colspan="2" class="text-center"> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center" >{{ $admin->id }}</td>
                        <td class="text-capitalize"> 
                          @foreach ($admin->admin as $detail)
                              {{ $detail->nama }}
                          @endforeach
                        </td>
                        <td> {{ $admin->email }} </td>
                        <td> {{ $admin->username }} </td>
                        <td> {{ $admin->created_at->diffForHumans() }} </td>
                        <td> {{ $admin->updated_at->diffForHumans() }} </td>
                        <td class="td-actions text-left">
                            <button type="button" rel="tooltip" id="show-edit-modal" onclick="adminEdit({{ $detail->id }})" class="btn btn-success btn-round">
                                <i class="material-icons">edit</i>
                            </button>
                        </td>
                        <td class="td-actions text-right">
                            <button type="button" onclick="deleteModal('{{ $detail->id }}', '{{ $detail->nama }}', '{{ $admin->username }}')" rel="tooltip" class="btn btn-danger btn-round">
                                <i class="material-icons">close</i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $admins->links() !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

  
  @include('_partials.deleteModal')
@endsection

@section('modal')
<div class="modal fade" id="admin-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 id="admin-modal-title">Edit User Admin</h3>
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
    async function adminCreate() {
      try {
          const response = await HitData(`{{ route('admin.admin.create') }}`, null, 'GET')
          $('#admin-modal-title').html('Create User Admin');
          $('#admin-modal').modal('show');
          $('#this-modal').html(response);
      } catch (error) {
          console.log(error.responseJSON.message);
      }
    }

    async function adminEdit(id) {
      try {
          const response = await HitData(`{{ url('admin/admin/${id}/edit') }}`, null, 'GET');
          $('#admin-modal-title').html('Edit User Admin');
          $('#admin-modal').modal('show');
          $('#this-modal').html(response);
      } catch (error) {
          console.log(error.responseJSON.message);
      }
    }

    function deleteModal(id, nama, username) {
        $("#delete-modal").modal('show')
        $("#this-content").text(`Admin [${username}] ${nama}`)
        $("#deleteData").attr('action', `/admin/admin/${id}`)
      }
  </script>
@endpush