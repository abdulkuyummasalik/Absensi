<div class="modal-body">
  <form action="">
    <div class="studentAbsen">
      <h4>[{{ $student->nis }}] {{ $student->nama }}</h4>
      <h5>{{ $student->rayon->rayon }} - {{ $student->rombel->rombel }}</h5>
      <h3 id="tgl">Keterangan Absen</h3>
      <div class="form-check form-check-radio form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="studentAbsen" id="absenHadir" value="hadir" @if ($absen_ket == 'hadir') checked @endif > Hadir
          <span class="circle">
              <span class="check"></span>
          </span>
        </label>
      </div>
      <div class="form-check form-check-radio form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="studentAbsen" id="absenTelat" value="telat" @if ($absen_ket == 'telat') checked @endif > Telat
          <span class="circle">
              <span class="check"></span>
          </span>
        </label>
      </div>
      <div class="form-check form-check-radio form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="studentAbsen" id="absenIzin" value="izin" @if ($absen_ket == 'izin') checked @endif > Izin
          <span class="circle">
              <span class="check"></span>
          </span>
        </label>
      </div>
      <div class="form-check form-check-radio form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="studentAbsen" id="absenSakit" value="sakit" @if ($absen_ket == 'sakit') checked @endif > Sakit
          <span class="circle">
              <span class="check"></span>
          </span>
        </label>
      </div>
      <div class="form-check form-check-radio form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="studentAbsen" id="absenAlpa" value="alpa" @if ($absen_ket == 'alpa') checked @endif > Alpa
          <span class="circle">
              <span class="check"></span>
          </span>
        </label>
      </div>
      <div id="reason" class="d-none">
        <div class="form-group bmd-form-group">
          <h5>Reason '<span id="title"></span>'</h5>
          <input type="hidden" name="student_name">
          <div class="input-group">
            <input type="text" name="reason" value="{{ old('reason') }}" id="sakit-reason" class="form-control" placeholder="Reason..." required>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="modal-footer">
  <button class="btn btn-primary" type="button" onclick="updateAbsen('{{ $absen['id'] }}')">Update</button>
</div>

<script>
  async function updateAbsen(id) {
    var ket = $("input[type='radio'][name='studentAbsen']:checked").val()
    var reason = $("input[name='reason']").val()
    var data = {
      _token: "{{ csrf_token() }}",
      ket, reason
    }
    const response = await HitData(`/admin/absen/${id}`, data, 'PUT')
    $('#student-absen-modal').modal('hide');
    md.successNotif(response.msg)
    setInterval(() => {
      location.reload()
    }, 1000);
  }

  $("input[type='radio']").click(function() {
    var ket = $("input[type='radio'][name='studentAbsen']:checked").val()
    if (ket == 'izin' || ket == 'sakit') {
      $("#reason").removeClass('d-none');
      $("span#title").html(ket);
    } else if (ket == 'alpa' || ket == 'hadir' || ket == 'telat') {
      $("#reason").addClass('d-none');
    }
  })
</script>