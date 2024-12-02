@extends('layouts.app', ['titlePage' => 'Rombel Pages', 'activePage' => 'rombel'])

@section('breadcrumb')
  <div class="container">
    <h3>Rombel</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Rombel</li>
    </ol>
  </nav>
@endsection

@section('content')
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12 text-right">
            <a href="#" class="btn btn-sm btn-info" id="show-create-modal" onclick="createModal()">Add rombel</a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Rombel</th>
                    <th>Terakhir di Ubah</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($data as $detail)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $detail->rombel }}</td>
                  <td>{{ $detail->updated_at->diffForHumans() }}</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" id="show-edit-modal" onclick="editModal('{{ $detail->rombel }}')" class="btn btn-success btn-round">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-round" onclick="deleteModal('{{ $detail->rombel }}')">
                        <i class="material-icons">close</i>
                    </button>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    @include('admin.rombel._create')
    @include('admin.rombel._edit')

    @include('_partials.deleteModal')
@endsection

@push('js')
    <script>
      function createModal() {
        $("#create-rombel").modal('show')
      }
      function editModal(rombel) {
        $("#update-rombel").modal('show')
        $("p#rombel").val(rombel)
        $("input#rombel-up").val(rombel)
      }
      function deleteModal(rombel) {
        $("#delete-modal").modal('show')
        $("#this-content").text(`Rombel ${rombel}`)
        $("#deleteData").attr('action', `/admin/rombel/${rombel}`);
      }
    </script>
@endpush