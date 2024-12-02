<div class="modal fade" id="desc-absen" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Absence Reason</h3>
            <button type="button" id="close-button" class="close" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">clear</i>
            </button>
        </div>
        <div class="modal-body">
            <form class="form" id="descAbsen" method="POST" action="" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div id="condition-choose">
                    <h4>{{ __('Choose Condition Below') }}</h4>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="condition" id="choose-izin" value="izin"> Izin
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-radio form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="condition" id="choose-sakit" value="sakit"> Sakit
                        <span class="circle">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                  </div>

                    <div id="izin-condition" class="d-none">
                      <div class="form-group bmd-form-group{{ $errors->has('reason') ? ' has-danger' : '' }}">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">help_outline</i></div>
                          </div>
                          <input type="text" name="reason" value="{{ old('reason') }}" id="izin-reason" class="form-control" placeholder="Reason...">
                        </div>
                        @if ($errors->has('reason'))
                          <script>
                            $(function () {
                              // $("#create-reason").modal('show')
                            });
                          </script>
                          <div id="reason-error" class="error text-danger text-right pl-3" for="izin-reason" style="display: block;">
                            <p>{{ $errors->first('reason') }}</p>
                          </div>
                        @endif
                      </div>
                    </div>

                    <div id="sakit-condition" class="d-none">
                      <div class="form-group bmd-form-group{{ $errors->has('reason') ? ' has-danger' : '' }}">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">help_outline</i></div>
                          </div>
                          <input type="text" name="reason" value="{{ old('reason') }}" id="sakit-reason" class="form-control" placeholder="Reason...">
                        </div>
                        @if ($errors->has('reason'))
                          <script>
                            $(function () {
                              // $("#create-reason").modal('show')
                            });
                          </script>
                          <div id="reason-error" class="error text-danger text-right pl-3" for="sakit-reason" style="display: block;">
                            <p>{{ $errors->first('reason') }}</p>
                          </div>
                        @endif
                      </div>
                      <div class="form-file-upload bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">camera_alt</i></div>
                            <input type="file" name="pict" id="pict" accept="image/*">
                          </div>
                      </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-end">
            <button id="desc-button" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Save') }}</button>
            <button id="desc-sakit-button" type="submit" form="descAbsen" class="btn btn-primary btn-link btn-wd btn-lg d-none">{{ __('Save') }}</button>
        </div>
      </div>
  </div>
</div>

@push('js') 
  <script>
    function izinAbsen(id) {
      var reason = $("#izin-reason").val()

      try {
        $.ajax({
            url: `/student/absen/izin`,
            data: {
                _token: "{{ csrf_token() }}",
                id, reason
            },
            type: "POST",
            success: (response) => {
              $("#desc-absen").modal('hide')
                console.log(response.msg)
                md.infoNotif(response.msg)
                setInterval(() => {
                  location.reload()
                }, 3000);
            },
            error: (error) => {
                console.log(error)
            }
        })
        $("#absent-button").addClass("disabled");
        $("#absent-button").attr("disabled", "disabled");
      } catch (error) {
        console.log(error)
      }
    }

    $(function () {
      $("#choose-izin").click(function() {
        if ($("input#choose-izin:checked")) {
          $("#izin-condition").removeClass("d-none");
          $("#sakit-condition").addClass("d-none");
          $("#descAbsen").attr('action', '');
          $("#desc-button").click(function() {
            izinAbsen('{{ Auth::user()->student[0]['id'] }}')
          })
        }
      })
      $("#choose-sakit").click(function() {
        if ($("input#choose-sakit:checked")) {
          $("#sakit-condition").removeClass("d-none");
          $("#izin-condition").addClass("d-none");
          $("#descAbsen").attr('action', '/student/absen/sakit');
          $("#desc-button").click(function() {
            $("#desc-sakit-button").click();
          })
        }
      })
    });
  </script>
@endpush