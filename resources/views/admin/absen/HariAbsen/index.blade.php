@extends('layouts.app', ['activePage' => 'absen', 'titlePage' => 'Hari Absen Page'])

@section('breadcrumb')
    <div class="container">
      <h3>Hari Absen</h3>
    </div>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item disable"><a>Pages</a></li>
        <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item disable"><a href="{{ route('admin.absens') }}">Absen</a></li>
        <li class="breadcrumb-item active" aria-current="page">Hari Absen</li>
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
                  <h2 class="card-title">Hari Absen</h2>
                <form action="{{ route('admin.absen.hariAbsen.update', 1) }}" method="post">
                  @csrf
                  @method('put')

                @foreach ($datas as $data)
                  <div id="daysCheckbox">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="senin" id="senin" value="1" @if($data->senin == '1') checked="checked" @endif> Senin
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="selasa" id="selasa" value="1" @if($data->selasa == '1') checked="checked" @endif> Selasa
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="rabu" id="rabu" value="1" @if($data->rabu == '1') checked="checked" @endif> Rabu
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="kamis" id="kamis" value="1" @if($data->kamis == '1') checked="checked" @endif> Kamis
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="jumat" id="jumat" value="1" @if($data->jumat == '1') checked="checked" @endif> Jumat
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="sabtu" id="sabtu" value="1" @if($data->sabtu == '1') checked="checked" @endif> Sabtu
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="minggu" id="minggu" value="1" @if($data->minggu == '1') checked="checked" @endif> Minggu
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>
                @endforeach
                  <div class="text-end">
                    <button class="btn btn-primary" type="submit">Update</button>
                  </div>
                </form>
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