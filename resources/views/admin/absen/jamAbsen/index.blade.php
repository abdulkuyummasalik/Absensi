@extends('layouts.app', ['activePage' => 'absen', 'titlePage' => 'Jam Absen Page'])

@section('breadcrumb')
    <div class="container">
      <h3>Jam Absen</h3>
    </div>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item disable"><a>Pages</a></li>
        <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item disable"><a href="{{ route('admin.absen.index') }}">Absen</a></li>
        <li class="breadcrumb-item active" aria-current="page">Jam Absen</li>
      </ol>
    </nav>
@endsection

@section('content')
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header card-header-icon card-header-primary">
                <div class="card-icon">
                  <i class="material-icons">schedule</i>
                </div>
              </div>
              <div class="card-body">
                  <h2 class="card-title">Jam Absen Datang</h2>
                      {{-- <h4>{{ $data[0]['jam_masuk'] }}</h4> --}}
                  <input type="time" name="jam_masuk" id="jam_masuk" class="form-control" placeholder="Jam Datang"
                  value="{{ $data[0]['jam_masuk'] }}" onchange="updateJamDatang()">
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header card-header-icon card-header-success">
                <div class="card-icon">
                  <i class="material-icons">schedule</i>
                </div>
              </div>
              <div class="card-body">
                  <h2 class="card-title">Jam Absen Pulang</h2>
                      {{-- <h4>{{ $data[0]['jam_pulang'] }}</h4> --}}
                  <input type="time" name="jam_pulang" id="jam_pulang" class="form-control" placeholder="Jam Pulang" value="{{ $data[0]['jam_pulang'] }}" onchange="updateJamPulang()">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('js')
    <script>
      async function updateJamDatang() {
        try {
          var data = {
            _token: '{{ csrf_token() }}',
            jam_masuk: $("#jam_masuk").val()
          }
          const response = await HitData(`/admin/jamAbsen/1`, data, 'PUT');
        } catch (error) {
          location.reload()
        }
      }

      async function updateJamPulang() {
        try {
          var data = {
            _token: '{{ csrf_token() }}',
            jam_pulang: $("#jam_pulang").val()
          }
          const response = await HitData(`/admin/jamAbsen/1`, data, 'PUT');
        } catch (error) {
          location.reload()
        }
      }
    </script>
@endpush