@extends('layouts.app', ['activePage' => 'absen', 'titlePage' => 'Daily Absen Pages'])

@section('breadcrumb')
  <div class="container">
    <h3>Absen</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.absens') }}">Absen</a></li>
    @if ($type == 'daily')
      <li class="breadcrumb-item disable"><a href="{{ route('admin.absen.daily-sort') }}">Daily Absen</a></li>
    @elseif ($type == 'rayonDaily')
      <li class="breadcrumb-item disable"><a href="{{ route('admin.absen.rayon-daily-sort') }}">Rayon Daily Absen</a></li>
    @endif
      <li class="breadcrumb-item active" aria-current="page">Create Absen Daily</li>
    </ol>
  </nav>
@endsection

@section('content')
    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Create Absen Student</h3>
          </div>
          <div class="card-body">
            <div class="studentRayon">
              <label for="rayonDataList" class="form-label">Pick Student Rayon</label>
              <input class="form-control" name="studentRayon" list="rayonOption" id="rayonDataList" onchange="getStudent()" placeholder="Type to search..." @if($type == 'rayonDaily') value="{{ $rayon->rayon }}" @endif required>
              <datalist id="rayonOption">
                @foreach ($rayons as $rayon)
                    <option value="{{ $rayon->rayon }}">
                @endforeach
                {{-- <option value="San Francisco">
                <option value="New York">
                <option value="Seattle">
                <option value="Los Angeles">
                <option value="Chicago"> --}}
              </datalist>
            </div>
            <div class="studentList @if($type != 'rayonDaily') d-none @endif" style="margin-top: 25px">
              <label for="studentDataList" class="form-label">Pick Student from Rayon <span id="studentDataLabel"></span></label>
              <input class="form-control" name="studentRayon" list="studentOption" id="studentDataList" placeholder="Type to search..." required>
                <datalist id="studentOption">
                  @if ($type == 'rayonDaily') 
                    @foreach ($students as $student)
                        <option value="{{ $student['nama'] }}" id="optionStudent" class="studentValue">
                    @endforeach
                  @endif
                  {{-- <option id="optionStudent" value=""> --}}
                  {{-- <option value="San Francisco">
                  <option value="New York">
                  <option value="Seattle">
                  <option value="Los Angeles">
                  <option value="Chicago"> --}}
                </datalist>
            </div>
            <div class="studentAbsen d-none" style="margin-top: 25px">
              <h4>Keterangan Absen</h4>
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="studentAbsen" id="absenHadir" value="hadir"> Hadir
                  <span class="circle">
                      <span class="check"></span>
                  </span>
                </label>
              </div>
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="studentAbsen" id="absenTelat" value="telat"> Telat
                  <span class="circle">
                      <span class="check"></span>
                  </span>
                </label>
              </div>
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="studentAbsen" id="absenIzin" value="izin"> Izin
                  <span class="circle">
                      <span class="check"></span>
                  </span>
                </label>
              </div>
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="studentAbsen" id="absenSakit" value="sakit"> Sakit
                  <span class="circle">
                      <span class="check"></span>
                  </span>
                </label>
              </div>
              <div class="form-check form-check-radio form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="studentAbsen" id="absenAlpa" value="alpa"> Alpa
                  <span class="circle">
                      <span class="check"></span>
                  </span>
                </label>
              </div>
            </div>
            
            <div id="izin-condition" class="d-none">
              <div class="form-group bmd-form-group">
                <h5>Reason 'Izin'</h5>
                <div class="input-group">
                  <input type="text" name="reason" value="{{ old('reason') }}" id="izin-reason" class="form-control" placeholder="Reason...">
                </div>
              </div>
            </div>

          <form id="absenSakitForm" action="{{ route('admin.absen.sakit') }}" method="post">
            @csrf
            <div id="sakit-condition" class="d-none">
              <div class="form-group bmd-form-group">
                <h5>Reason 'Sakit'</h5>
                <input type="hidden" name="student_name">
                <div class="input-group">
                  <input type="text" name="reason" value="{{ old('reason') }}" id="sakit-reason" class="form-control" placeholder="Reason..." required>
                </div>
              </div>
              <div class="form-file-upload bmd-form-group">
                <h5>Surat Dokter</h5>
                <div class="input-group">
                  <input type="file" name="pict" id="pict" accept="image/*" required>
              </div>
            </div>
          </form>

          </div>
          <div class="card-footer">
            <button class="btn btn-secondary" onclick="cancelModal()">Cancel</button>
            <button class="btn btn-primary d-none" id="sendAbsen" onclick="sendAbsen()">Submit</button>
            <button class="d-none" id="absenSakit" type="submit" form="absenSakitForm"></button>
          </div>
        </div>
      </div>
    </div>

    
@endsection

@section('modal')
<div class="modal fade" id="cancel-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cancel modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modal-content">Are you sure you want to cancel student Absen?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="{{ route('admin.absen.daily-sort') }}"><button type="button" class="btn btn-primary">Yes</button></a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
    <script>
      async function getStudent() {
        var rayon = $("#rayonDataList").val()
        $(".studentList").removeClass("d-none")
        $("#studentDataLabel").text(rayon)
        var data = {
          rayon
        }
        const response = await HitData('/admin/absen/create', data, 'GET')
        $(".studentValue").remove()
        $("#studentDataList").val('')
        const students = response.student
        for (const obj of students) {
          $("#studentOption").append(`<option class='studentValue' value='${obj['nama']}'>`)
        }
      }

      $("#studentDataList").change(function() {
        $(".studentAbsen").removeClass("d-none")
      });

      $(".studentAbsen").change(function() {
        // var a = $("input[type='radio'][name='studentAbsen']:checked").val()
        // alert(a)
        if ($("input[type='radio'][name='studentAbsen']:checked")) {
          $("#sendAbsen").removeClass('d-none')
        }

        if ($("input[type='radio'][name='studentAbsen']:checked").val() === 'sakit') {
          $("#sakit-condition").removeClass('d-none')
          $("#izin-condition").addClass('d-none');
        } else if ($("input[type='radio'][name='studentAbsen']:checked").val() === 'izin') {
          $("#izin-condition").removeClass('d-none')
          $("#sakit-condition").addClass('d-none')
        }
      });

      function cancelModal() {
        $("#cancel-modal").modal('show')
      }

      async function sendAbsen() {
        var student = $("#studentDataList").val()
        var ket = $("input[type='radio'][name='studentAbsen']:checked").val()
        var data = {
          _token: "{{ csrf_token() }}",
          student_name: student,
          ket: ket
        }
        const response = await HitData('/admin/absen', data, 'POST')
        if (ket !== 'izin' && ket !== 'sakit') {
          md.successNotif(response.msg)
          setInterval(() => {
            location.href = '/admin/daily/absen'
          }, 1000);
        }
        if (ket == 'izin') {
          var reason = $("#izin-reason").val()
          let data = {
            _token: "{{ csrf_token() }}",
            student_name: student,
            reason: reason
          }
          const response = await HitData('/admin/izin/absen', data, 'POST')
          console.log(response.msg)
          md.successNotif(response.msg)
          setInterval(() => {
            location.href = '/admin/daily/absen'
          }, 1000);
        } else if (ket == 'sakit') {
          $("input[name='student_name']").val(student);
          $("button[type='submit']").click();
        }

      }
      
    </script>
@endpush