<div class="modal-body">
    <form class="form" id="createAdmin" method="POST" action="{{ route('admin.admin.store') }}">
      @csrf
        <div class="card-body">
            <div class="form-group bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">person</i></div>
                  </div>
                  <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Admin Name...">
                </div>
                @if ($errors->has('name'))
                  <script>
                    $(function () {
                      // $("#create-Admin").modal('show');
                    });
                  </script>
                  <div id="name-error" class="error text-danger text-right pl-3" for="name" style="display: block;">
                    <p>{{ $errors->first('name') }}</p>
                  </div>
                @endif
            </div>
            <div class="form-group bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">mail</i></div>
                  </div>
                  <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Admin Email...">
                </div>
                @if ($errors->has('email'))
                  <script>
                    $(function () {
                      // $("#create-Admin").modal('show');
                    });
                  </script>
                  <div id="email-error" class="error text-danger text-right pl-3" for="email" style="display: block;">
                    <p>{{ $errors->first('email') }}</p>
                  </div>
                @endif
            </div>
            <div class="form-group bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">face</i></div>
                  </div>
                  <input type="text" name="username" value="{{ old('username') }}" id="username" class="form-control" placeholder="Admin Username...">
                </div>
                @if ($errors->has('username'))
                  <script>
                    $(function () {
                      $("#create-Admin").modal('show');
                    });
                  </script>
                  <div id="username-error" class="error text-danger text-right pl-3" for="username" style="display: block;">
                    <p>{{ $errors->first('username') }}</p>
                  </div>
                @endif
            </div>
            <div class="form-group bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">lock</i></div>
                  </div>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Admin Password...">
                </div>
                @if ($errors->has('password'))
                  <script>
                    $(function () {
                      // $("#create-Admin").modal('show');
                    });
                  </script>
                  <div id="password-error" class="error text-danger text-right pl-3" for="password" style="display: block;">
                    <p>{{ $errors->first('password') }}</p>
                  </div>
                @endif
            </div>
        </div>
    </form>
</div>
<div class="modal-footer justify-content-end">
    <button form="createAdmin" href="" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Save') }}</button>
</div>