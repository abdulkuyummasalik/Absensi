<div class="modal fade" id="create-rombel" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Create Rombel Data</h3>
            <button type="button" id="close-button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
        </div>
        <div class="modal-body">
            <form class="form" id="createRombel" method="POST" action="{{ route('admin.rombel.store') }}">
              @csrf
                <div class="card-body">
                    <div class="form-group bmd-form-group{{ $errors->has('rombel') ? ' has-danger' : '' }}">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">class</i></div>
                          </div>
                          <input type="text" name="rombel" id="rombel" class="form-control" placeholder="Rombel Name...">
                        </div>
                        @if ($errors->has('rombel'))
                          <script>
                            $(function () {
                              // $("#create-rombel").modal('show')
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
            <button form="createRombel" href="" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Save') }}</button>
        </div>
      </div>
  </div>
</div>