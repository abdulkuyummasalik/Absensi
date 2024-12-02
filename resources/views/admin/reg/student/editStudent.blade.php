<div class="modal-body">
    <form class="form" id="editStudent" method="POST">
      @csrf
      @method('put')
        <div class="card-body">
          <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons">tag</i></div>
                </div>
                <input type="text" name="nis" id="nis-up" minlength="8" maxlength="8" value="{{ $data[0]['nis'] }}" class="form-control" placeholder="Student NIS...">
              </div>
          </div>
          <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons">person</i></div>
                </div>
                <input type="text" name="name" id="name-up" value="{{ $data[0]['nama'] }}" class="form-control" placeholder="Student Name...">
              </div>
          </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons">group</i></div>
                </div>
              <select class="form-control" data-style="btn btn-link" id="rombel-up" name="rombel">
                <option value="{{ $data[0]['rombel_id'] }}">Rombel {{ $data[0]['rombel']['rombel'] }}</option>
                <option disabled>___________</option>
                @foreach ($rombels as $rombel)
                    <option value="{{ $rombel->id }}">Rombel {{ $rombel->rombel }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons">room</i></div>
                </div>
              <select class="form-control" data-style="btn btn-link" id="rayon-up" name="rayon">
                <option value="{{ $data[0]['rayon_id'] }}">Rayon {{ $data[0]['rayon']['rayon'] }}</option>
                <option disabled>___________</option>
                @foreach ($rayons as $rayon)
                    <option value="{{ $rayon->id }}">Rayon {{ $rayon->rayon }}</option>
                @endforeach
              </select>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer justify-content-end">
    <button type="button" onclick="updateStudent({{ $data[0]['nis'] }})" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Update') }}</button>
</div>

<script>
  function updateStudent(id) {
    var rayon = $("#rayon-up").val()
    var rombel = $("#rombel-up").val()
    var nis = $("#nis-up").val()
    var name = $("#name-up").val()

   try {
    $.ajax({
        url: `/admin/student/${id}`,
        data: {
            _token: "{{ csrf_token() }}",
            rayon, rombel, nis, name
        },
        type: "PUT",
        success: (response) => {
            console.log(response)
        },
        error: (error) => {
            console.log(error)
        }
    })
    location.reload()
   } catch (error) {
     console.log(error)
   }
  }
</script>