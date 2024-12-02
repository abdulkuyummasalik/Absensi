<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="60" height="60" viewBox="0 0 226 226" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,226v-226h226v226z" fill="none"></path><g fill="#ffffff"><path d="M93.82531,13.56c-1.9179,-0.00004 -3.62705,1.21017 -4.26398,3.01922l-66.70531,189.84c-0.48664,1.38313 -0.27222,2.91637 0.5752,4.11293c0.84742,1.19656 2.22254,1.90778 3.68878,1.90785h33.60867c1.9179,0.00004 3.62705,-1.21017 4.26398,-3.01922l16.40266,-46.70078h63.20938l16.40266,46.70078c0.63693,1.80905 2.34609,3.01926 4.26398,3.01922h33.60867c1.46624,-0.00007 2.84137,-0.7113 3.68878,-1.90785c0.84742,-1.19656 1.06184,-2.7298 0.5752,-4.11293l-66.70531,-189.84c-0.63693,-1.80905 -2.34609,-3.01926 -4.26398,-3.01922zM97.02992,22.6h31.94016l63.52719,180.8h-24.02133l-16.41149,-46.70078c-0.63693,-1.80905 -2.34609,-3.01926 -4.26398,-3.01922h-69.60094c-1.9179,-0.00004 -3.62705,1.21017 -4.26398,3.01922l-16.41149,46.70078h-24.02133zM111.55219,58.76c-1.9179,-0.00004 -3.62706,1.21017 -4.26399,3.01922l-23.82711,67.8c-0.48664,1.38313 -0.27222,2.91637 0.5752,4.11293c0.84742,1.19656 2.22254,1.90778 3.68878,1.90785h50.54984c1.46624,-0.00007 2.84137,-0.7113 3.68878,-1.90785c0.84742,-1.19656 1.06184,-2.7298 0.5752,-4.11293l-23.82711,-67.8c-0.63693,-1.80905 -2.34609,-3.01926 -4.26399,-3.01922zM113,72.77906l18.89219,53.78094h-37.78438z"></path></g></g></svg>
          </div>
          <p class="card-category">
            Absences
          </p>
          <h2 class="card-title">
            {{ date('D, M Y') }}
          </h2>
        </div>
        <div class="card-body">
        @isset($info)
          <div class="stats">
            <div class="row">
              <div class="col-lg-2">
            @foreach (Auth::user()->student as $student)
                @if($info == 'empty')
                  <button class="btn btn-md btn-primary" id="come-button" type="button" onclick="absenceCome('{{ $student->id }}', '{{ now()->format('H:i:s') }}')">
                    <i class="material-icons">login</i> Come
                  </button>
                @endif
              @if (now()->format('H:i:s') >= $gate_close_come)
                <script>
                  $("#come-button").addClass("disabled");
                  $("#come-button").attr("disabled", "disabled");
                </script>
              @endif
              </div>
              <div class="col-lg-2">
              @if ($info == 'empty')
                <button class="btn btn-md btn-warning" id="absent-button" type="button" onclick="absenceDescShow('{{ $student->id }}')">
                <i class="material-icons">report_problem</i> Absent</button>
              @else 
                <script>
                  $("#come-button").addClass("disabled");
                  $("#come-button").attr("disabled", "disabled");
                </script>
              @endif
              </div>
              <div class="col-6"></div>
              <div class="col-lg-1">
                @if($info == 'exist')
                  <button class="btn btn-md btn-primary" id="out-button" type="button" onclick="absenceOut('{{ $absen_id[0]['id'] }}', '{{ now()->format('H:i:s') }}')">
                    Out <i class="material-icons">logout</i>
                  </button>
                @endif
              @if (now()->format('H:i:s') <= $home_time || $info == 'home')
                <script>
                  $("#out-button").addClass("disabled");
                  $("#out-button").attr("disabled", "disabled");
                </script>
              @endif

              @if($absen_ket == 'izin' || $absen_ket == 'sakit')
                <script>
                  $("#out-button").remove();
                </script>
              @endif

              @if (now()->format('H:i:s') >= $home_time && $info == 'empty')
                <script>
                  $("#out-button").addClass("disabled");
                  $("#out-button").attr("disabled", "disabled");
                </script>
              @endif
            @endforeach
              </div>
            </div>
          </div>
        @endisset
        </div>
      </div>
    </div>
  </div>
</div>