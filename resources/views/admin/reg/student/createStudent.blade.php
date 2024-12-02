<div class="modal-body">
    <form class="form" id="createStudent" method="POST" action="{{ route('admin.student.store') }}">
      @csrf
      @if(Session::has('error')) 
        {{ $errors }}
      @endif
        <div class="card-body">
            <div class="form-group bmd-form-group{{ $errors->has('nis') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">tag</i></div>
                  </div>
                  <input type="text" name="nis" id="nis" minlength="8" maxlength="8" value="{{ old('nis') }}" class="form-control" placeholder="Student NIS...">
                </div>
            </div>
            <div class="form-group bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">person</i></div>
                  </div>
                  <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Student Name...">
                </div>
            </div>
            <div class="form-group bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons">mail</i></div>
                  </div>
                  <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Student Email...">
                </div>
                @if ($errors->has('email'))
                  <script>
                    $(function () {
                      // $("#create-student").modal('show');
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
                  <input type="text" name="username" value="{{ old('username') }}" id="username" class="form-control" placeholder="Student Username...">
                </div>
                @if ($errors->has('username'))
                  <script>
                    $(function () {
                      $("#create-student").modal('show');
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
                  <input type="password" name="password" id="password" minlength="6" class="form-control" placeholder="Student Password...">
                </div>
                @if ($errors->has('password'))
                  <script>
                    $(function () {
                      // $("#create-student").modal('show');
                    });
                  </script>
                  <div id="password-error" class="error text-danger text-right pl-3" for="password" style="display: block;">
                    <p>{{ $errors->first('password') }}</p>
                  </div>
                @endif
            </div>
            <hr>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons">group</i></div>
                </div>
              <select class="form-control" data-style="btn btn-link" id="input-rombel" name="rombel">
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
              <select class="form-control" data-style="btn btn-link" id="input-rayon" name="rayon">
                @foreach ($rayons as $rayon)
                    <option value="{{ $rayon->id }}">Rayon {{ $rayon->rayon }}</option>
                @endforeach
              </select>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer justify-content-end">
    <button form="createStudent" class="btn btn-primary btn-link btn-wd btn-lg">{{ __('Save') }}</button>
</div>