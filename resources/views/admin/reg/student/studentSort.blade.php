@extends('layouts.app', ['activePage' => 'reg-user'])

@section('breadcrumb')
  <div class="container">
    <h3>Student User Registration</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.user.index') }}">User Registration</a></li>
      <li class="breadcrumb-item active" aria-current="page">Student User Registration</li>
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
              <h4 class="card-title ">Students</h4>
              <p class="card-category"> Here you can manage users Student</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 text-left">
                  <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-success"><span class="material-icons">arrow_back</span></a>
                  <a href="{{ route('admin.admin-sort') }}" class="btn btn-sm btn-info">Admins</a>
                </div>
                <div class="col-6 text-right">
                  <a href="#" id="student-add" onclick="studentCreate()" class="btn btn-sm btn-primary">Add student</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr>
                      <th> # </th>
                      <th> User ID </th>
                      <th> Name </th>
                      <th> NIS </th>
                      <th> Email </th>
                      <th> Username </th>
                      <th> Rombel </th>
                      <th> Rayon </th>
                      <th> Creation date </th>
                      <th> Terakhir di Ubah </th>
                      <th colspan="2" class="text-center"> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center" >{{ $student->id }}</td>
                        <td class="text-capitalize"> 
                          @foreach ($student->student as $detail)
                              {{ $detail->nama }}
                        </td>
                        <td> {{ $detail->nis }} </td>
                        <td> {{ $student->email }} </td>
                        <td> {{ $student->username }} </td>
                        <td> {{ $detail->rombel->rombel }} </td>
                        <td> {{ $detail->rayon->rayon }} </td>
                        <td> {{ $student->created_at->diffForHumans() }} </td>
                        <td> {{ $student->updated_at->diffForHumans() }} </td>
                        <td class="td-actions text-left">
                            <button type="button" rel="tooltip" id="student-edit" onclick="studentEdit({{ $detail->nis }})" class="btn btn-success btn-round">
                                <i class="material-icons">edit</i>
                            </button>
                        </td>
                        <td class="td-actions text-right">
                            <button type="button" onclick="deleteModal('{{ $detail->nis }}', '{{ $detail->nama }}')" rel="tooltip" class="btn btn-danger btn-round">
                                <i class="material-icons">close</i>
                            </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    @endforeach
                    </tbody>
                </table>
                {!! $students->links() !!}
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
<div class="modal fade" id="student-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 id="student-modal-title">Edit User Student</h3>
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
    async function studentCreate() {
      try {
          const response = await HitData(`{{ route('admin.student.create') }}`, null, 'GET')
          $('#student-modal-title').html('Create User Student');
          $('#student-modal').modal('show');
          $('#this-modal').html(response);
      } catch (error) {
          console.log(error.responseJSON.message);
      }
    }

    async function studentEdit(id) {
      try {
          const response = await HitData(`{{ url('admin/student/${id}/edit') }}`, null, 'GET');
          $('#student-modal-title').html('Edit User Student');
          $('#student-modal').modal('show');
          $('#this-modal').html(response);
      } catch (error) {
          console.log(error.responseJSON.message);
      }
    }

    function deleteModal(nis, nama){
      $("#delete-modal").modal('show')
      $("#this-content").text(`Student [${nis}] ${nama}, for Real`)
      $("#deleteData").attr('action', `/admin/student/${nis}`)
    }
  </script>
@endpush