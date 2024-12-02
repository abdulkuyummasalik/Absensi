<div class="modal-content">
  <div class="modal-header">
      <h3 class="modal-title">Choose Date Absen</h3>
      <button type="button" id="close-button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="material-icons">clear</i>
      </button>
  </div>
  <div class="modal-body"> 
      <form class="form" id="chooseDate" method="GET" action="{{ route('admin.absen.date-sort') }}">
          <div class="card-body">
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons">room</i></div>
                </div>
                <input type="date" name="date" id="dateAbsen" class="form-control">
              </div>
            </div>
          </div>
      </form>
  </div>
  <div class="modal-footer justify-content-end">
      <button form="chooseDate" type="submit" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Okay') }}</button>
  </div>
</div>
