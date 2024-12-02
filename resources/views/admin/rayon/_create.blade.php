<div class="modal fade" id="create-rayon" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Create Rayon Data</h3>
            <button type="button" id="close-button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
        </div>
        <div class="modal-body">
            <form class="form" id="createRayon" method="POST" action="{{ route('admin.rayon.store') }}">
              @csrf
                <div class="card-body">
                    <div class="form-group bmd-form-group{{ $errors->has('rayon') ? ' has-danger' : '' }}">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">room</i></div>
                          </div>
                          <input type="text" name="rayon" id="rayon" class="form-control" placeholder="Rayon Name...">
                        </div>
                        @if ($errors->has('rayon'))
                          <script>
                            $(function () {
                              // $("#show-create-modal").click();
                              // $("#create-rayon").modal('show')
                            });
                          </script>
                          <div id="rayon-error" class="error text-danger text-right pl-3" for="rayon" style="display: block;">
                            <p>{{ $errors->first('rayon') }}</p>
                          </div>
                        @endif
                    </div>
                    
                    <div class="form-group bmd-form-group{{ $errors->has('pembimbing') ? ' has-danger' : '' }}">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">person</i></div>
                          </div>
                          <input type="text" name="pembimbing" id="pembimbing" class="form-control" placeholder="Pembimbing Rayon Name...">
                        </div>
                        @if ($errors->has('pembimbing'))
                          <script>
                            $(function () {
                              // $("#show-create-modal").click();
                              // $("#create-rayon").modal('show')
                            });
                          </script>
                          <div id="pembimbing-error" class="error text-danger text-right pl-3" for="pembimbing" style="display: block;">
                            <p>{{ $errors->first('pembimbing') }}</p>
                          </div>
                        @endif
                    </div>
                    
                    <div class="form-group bmd-form-group{{ $errors->has('no_hp') ? ' has-danger' : '' }}">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">smartphone</i></div>
                          </div>
                          <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No HP Pembimbing Rayon...">
                        </div>
                        @if ($errors->has('no_hp'))
                          <script>
                            $(function () {
                              // $("#show-create-modal").click();
                              // $("#create-rayon").modal('show')
                            });
                          </script>
                          <div id="no_hp-error" class="error text-danger text-right pl-3" for="no_hp" style="display: block;">
                            <p>{{ $errors->first('no_hp') }}</p>
                          </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-end">
            <button form="createRayon" href="" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Save') }}</button>
        </div>
      </div>
  </div>
</div>