<div class="container">
  <div class="row">
    <div class="col-lg-7">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">person</i>
          </div>
          @foreach (Auth::user()->student as $student)
          <p class="card-category">
                {{ $student->nis }}
          </p>
          <h2 class="card-title">
            {{ $student->nama }}
          </h2>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">school</i> 
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="material-icons">group</i>
          </div>
          @foreach (Auth::user()->student as $student)
          <p class="card-category">
                {{ $student->rayon->rayon }}
          </p>
          <h2 class="card-title">
            {{ $student->rombel->rombel }}
          </h2>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">school</i> 
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>