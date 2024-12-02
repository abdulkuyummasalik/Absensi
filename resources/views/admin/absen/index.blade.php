@extends('layouts.app', ['activePage' => 'absen', 'titlePage' => 'Absen Pages'])

@section('breadcrumb')
  <div class="container">
    <h3>Absen</h3>
  </div>
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item disable"><a>Pages</a></li>
      <li class="breadcrumb-item disable"><a href="{{ route('admin.dashboard') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Absen</li>
    </ol>
  </nav>
@endsection

@section('content')
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
              <div class="card-header card-header-info">
                  <h4 class="card-title">Look Absences for this Day</h4>
                  <p class="category">Daily Absences</p>
              </div>
              <div class="card-body">
                <a class="card-link" href="{{ route('admin.absen.daily-sort') }}">Go to page...</a>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-header card-header-success">
                  <h4 class="card-title">Look Absences Sort from Rayon</h4>
                  <p class="category">Rayon Daily Absences</p>
              </div>
              <div class="card-body">
                <a class="card-link" href="#" onclick="chooseRayon()">Go to page...</a>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-header card-header-success">
                  <h4 class="card-title">Look Absences With Additional Date</h4>
                  <p class="category">Show Absences</p>
              </div>
              <div class="card-body">
                <a class="card-link" href="#" onclick="chooseDate()">Go to page...</a>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
              <div class="card-header card-header-primary">
                  <h4 class="card-title">Control Jam Absen</h4>
                  <p class="category">Jam Absen</p>
              </div>
              <div class="card-body">
                <a class="card-link" href="{{ route('admin.absen.jamAbsen.index') }}">Go to page...</a>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Control Hari Absen</h4>
                <p class="category">Hari Absen</p>
            </div>
            <div class="card-body">
              <a class="card-link" href="{{ route('admin.absen.hariAbsen.index') }}">Go to page...</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('modal')
  <div class="modal fade" id="choose-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-login" role="document">
        <div id="content-modal"></div>
    </div>
  </div>
@endsection

@push('js')
    <script>
      async function chooseRayon() {
        const response = await HitData('/admin/rayonChoose/absen', null, 'GET')
        $("#content-modal").html(response)
        $("#choose-modal").modal('show')
      }
      async function chooseDate() {
        const response = await HitData('/admin/dateChoose/absen', null, 'GET')
        $("#content-modal").html(response)
        $("#choose-modal").modal('show')
      }
      // function rayonSort() {
      //   var rayon = $("#input-rayon").val();
        
      //   try {
      //     $.ajax({
      //         url: `/admin/rayonDaily/absen`,
      //         data: {
      //             _token: "{{ csrf_token() }}",
      //             rayon
      //         },
      //         type: "POST",
      //         success: (response) => {
      //             console.log(response)
      //         },
      //         error: (error) => {
      //             console.log(error)
      //         }
      //     })
      //   } catch (error) {
      //     console.log(error)
      //   }
      // }
    </script>
@endpush