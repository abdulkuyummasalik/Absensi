<div class="modal-content">
  <div class="modal-header">
      <h3 class="modal-title">Choose Rayon</h3>
      <button type="button" id="close-button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="material-icons">clear</i>
      </button>
  </div>
  <div class="modal-body"> 
      <form class="form" id="chooseRayon" method="GET" action="{{ route('admin.absen.rayon-daily-sort') }}">
          <div class="card-body">
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons">room</i></div>
                </div>
                <select class="form-control" data-style="btn btn-link" id="input-rayon" name="rayon">
                  @foreach ($rayons as $rayon)
                      <option value="{{ $rayon->id }}">Rayon {{ $rayon->rayon }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
      </form>
  </div>
  <div class="modal-footer justify-content-end">
      <button form="chooseRayon" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Okay') }}</button>
  </div>
</div>