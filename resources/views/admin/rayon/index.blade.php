@extends('layouts.app', ['titlePage' => 'Rayon Pages', 'activePage' => 'rayon'])

@section('breadcrumb')
  <div class="container">
    <h3>Rayon</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Rayon</li>
    </ol>
  </nav>
@endsection

@section('content')
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12 text-right">
            <a href="#" class="btn btn-sm btn-info" id="show-create-modal" onclick="createModal()">Add rayon</a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Rayon</th>
                    <th>Pembimbing Rayon</th>
                    <th class="text-center">No Hp Pembimbing</th>
                    <th class="text-center">Terakhir di Ubah</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($data as $detail)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $detail->rayon }}</td>
                  <td>{{ $detail->pembimbing }}</td>
                  <td class="text-center"><a href="https://wa.me/62{{ substr($detail->no_hp_pembimbing, 1) }}">{{ $detail->no_hp_pembimbing }}</a></td>
                  <td class="text-center">{{ $detail->updated_at->diffForHumans() }}</td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" id="show-edit-modal" onclick="editModal('{{ $detail->rayon }}', '{{ $detail->pembimbing }}', '{{ $detail->no_hp_pembimbing }}')" class="btn btn-success btn-round">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-round" onclick="deleteModal('{{ $detail->rayon }}')">
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

    @include('admin.rayon._create')
    @include('admin.rayon._edit')

    @include('_partials.deleteModal')
@endsection

@push('js')
    <script>
      function createModal() {
        $("#create-rayon").modal('show')
      }
      function editModal(rayon, pembimbing, no_hp) {
        $("#update-rayon").modal('show')
        $("p#rayon").text(rayon)
        $("input#rayon-up").val(rayon)
        $("input#pembimbing-up").val(pembimbing)
        $("input#no_hp-up").val(no_hp)
      }
      function deleteModal(rayon) {
        $("#delete-modal").modal('show')
        $("#this-content").text(`Rayon ${rayon}`)
        $("#deleteData").attr('action', `/admin/rayon/${rayon}`)
      }
      
    </script>
@endpush