<div class="modal fade" id="update-rombel" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Update Rombel Data</h3>
            <button type="button" id="close-button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
        </div>
        <div class="modal-body">
            <form class="form" id="updateRombel" action="">
              @csrf
              @method('put')
                <div class="card-body">
                    <div class="form-group bmd-form-group{{ $errors->has('rombel') ? ' has-danger' : '' }}">
                      <p id="rombel" style="display: none"></p>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">class</i></div>
                          </div>
                          <input type="text" name="rombel" id="rombel-up" value="" class="form-control" placeholder="Rombel Name...">
                          <input type="hidden" name="id" id="id" value="">
                        </div>
                        @if ($errors->has('rombel'))
                          <script>
                            $(function () {
                              $("#show-edit-modal").click();
                            });
                          </script>
                          <div id="rombel-error" class="error text-danger text-right pl-3" for="rombel" style="display: block;">
                            <p>{{ $errors->first('rombel') }}</p>
                          </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-end">
            <button type="button" id="update-button" {{-- form="updaterombel" href="" --}} onclick="updateRombel()"  class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Update') }}</button>
        </div>
      </div>
  </div>
</div>

@push('js')
    <script>
      function updateRombel() {
        var id = $("p#rombel").val()
        var rombel = $("input#rombel-up").val()

       try {
        $.ajax({
            url: `/admin/rombel/${id}`,
            data: {
                _token: "{{ csrf_token() }}",
                rombel
            },
            type: "PUT",
            success: (response) => {
                resolve(response.responseJSON)
            },
            error: (error) => {
                console.log(error.responseJSON)
            }
        })
        location.reload()
       } catch (error) {
         console.log(error)
       }
      }
    </script>
@endpush