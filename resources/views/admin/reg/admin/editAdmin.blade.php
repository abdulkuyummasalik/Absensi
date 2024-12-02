<div class="modal-body">
  <form class="form" id="editAdmin" method="POST">
    @csrf
    @method('put')
      <div class="card-body">
        <div class="form-group bmd-form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="material-icons">person</i></div>
              </div>
              <input type="text" name="name" id="name-up" value="{{ $data->nama }}" class="form-control" placeholder="Admin Name...">
            </div>
        </div>
      </div>
  </form>
</div>
<div class="modal-footer justify-content-end">
  <button type="button" onclick="updateAdmin({{ $data->id }})" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Update') }}</button>
</div>

<script>
function updateAdmin(id) {
  var name = $("#name-up").val()

 try {
  $.ajax({
      url: `/admin/admin/${id}`,
      data: {
          _token: "{{ csrf_token() }}",
          name
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