@extends('layouts.app', ['titlePage' => 'Absences Page', 'activePage' => 'absen'])

@section('breadcrumb')
    <div class="container">
      <h3>Absen</h3>
    </div>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item disable"><a>Pages</a></li>
        <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item disable"><a href="{{ route('admin.absens') }}">Absen</a></li>
        <li class="breadcrumb-item active" aria-current="page">Absen Tanggal {{ $tgl }}</li>
      </ol>
    </nav>
@endsection

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-6 text-left">
          <h3>Tanggal: {{ $tgl }}</h3>
        </div>
        <div class="col-6 text-right">
          @if (!(count($absens) < 1))
              <a href="{{ route('admin.export.absen.add-date') }}" class="btn btn-sm btn-success">Export</a>
          @endif
          <a href="{{ route('admin.absen.index', ['type' => 'daily']) }}" class="btn btn-sm btn-info" id="show-create-modal">Input absen</a>
        @empty($info)
          <a href="/admin/dateAbsen/{{ $tanggal }}/distinct" class="btn btn-sm btn-primary">Show Absens ('No Duplicate')</a>
        @else
          <a href="/admin/dateAbsen/absen?date={{ $tanggal }}" class="btn btn-sm btn-primary">Show Absens</a>
        @endempty
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
              <tr>
                  <th class="text-center">#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Rombel</th>
                  <th>Rayon</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Keterangan Tambahan</th>
                  <th class="text-right">Actions</th>
              </tr>
          </thead>
          <tbody>
          @if (count($absens) < 1)
            <tr>
              <td colspan="8" class="text-center">No Absences Recording</td>
            </tr>
          @else
            @foreach ($absens as $absen)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $absen->student['nis'] }}</td>
                <td>{{ $absen->student['nama'] }}</td>
                <td>{{ $absen->student['rombel']['rombel'] }}</td>
                <td>{{ $absen->student['rayon']['rayon'] }}</td>
                <td class="text-center text-capitalize">{{ $absen->ket }}</td>
              @if($absen->ket == 'hadir' || $absen->ket == 'telat' || $absen->ket == 'alpa')
                <td class="text-center">-</td>
              @elseif($absen->ket == 'izin' || $absen->ket == 'sakit')
                @isset($absen->absen_izin[0]['alasan_i']) 
                  <td class="text-center">{{ $absen->absen_izin[0]['alasan_i'] }}</td>
                @endisset
                @isset($absen->absen_sakit[0]['alasan_s'])
                  <td class="text-center">
                    <a href="#" onclick="detailReason('{{ $absen->student['nis'] }}', '{{ $absen->student['nama'] }}', '{{ $absen->absen_sakit[0]['id'] }}')">View Detail</a>
                  </td>
                @endisset
              @endif
                <td class="td-actions text-right">
                  <button type="button" rel="tooltip" id="show-edit-modal" onclick="editModal('{{ $absen->id }}')" class="btn btn-success btn-round">
                      <i class="material-icons">edit</i>
                  </button>
                  <button type="button" onclick="deleteModal('{{ $absen->student['nis'] }}', '{{ $absen->student['nama'] }}', '{{ $absen->id }}')" rel="tooltip" class="btn btn-danger btn-round">
                      <i class="material-icons">close</i>
                  </button>
                </td>
              </tr>
            @endforeach
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('_partials.deleteModal')
  
@endsection

@section('modal')
  <div class="modal fade" id="student-absen-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h3 id="absen-modal-title">Student Absen</h3>
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
      async function editModal(absen_id) {
        try {
          const response = await HitData(`/admin/absen/${absen_id}/edit`, null, 'GET');
          $('#this-modal').html(response);
          $('#absen-modal-title').html('Edit Absen Student');
          $('#tgl').text("Keterangan Absen {{ $tgl }}");
          $('#student-absen-modal').modal('show');
        } catch (error) {
          console.log(error)
        }
      }

      async function detailReason(nis, nama, absen_id) {
        const response = await HitData(`/admin/absen/${absen_id}`, null, 'GET')
        $('#this-modal').html(response);
        $('#absen-modal-title').html(`Detail Absen 'Sakit' Student [${nis}] ${nama}`);
        $('#student-absen-modal').modal('show');
      }
      
      function deleteModal(nis, nama, id) {
        $("#delete-modal").modal('show')
        $("#this-content").text(`Absen [${nis}] ${nama} for Today`)
        $("#deleteData").attr('action', `/admin/absen/${id}`)
      }
    </script>
@endpush