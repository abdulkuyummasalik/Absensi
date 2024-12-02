@extends('layouts.app', ['activePage' => 'student-home'])

@section('content')
    <div class="content" style="margin-top: 100px">
      @include('student._profile')

      @include('student._absences')
    </div>
@endsection

@section('modal')

  @if ($errors->any())
      <script>
        $(function () {
          $("#desc-absen").modal('show')
        });
      </script>
  @endif

  @include('student._modalAbsences')
@endsection

@push('js')
    <script>
      function absenceCome(id, time) {
       try {
        $.ajax({
            url: `/student/absen`,
            data: {
                _token: "{{ csrf_token() }}",
                id, time
            },
            type: "POST",
            success: (response) => {
                console.log(`${time}: ${response.msg}`)
                md.welcomeNotif(response.msg)
                setInterval(() => {
                  location.reload()
                }, 3000);
            },
            error: (error) => {
                console.log(error.responseJSON)
            }
        })
        $("#absent-button").addClass("disabled");
        $("#absent-button").attr("disabled", "disabled");
       } catch (error) {
         console.log(error)
       }
      }

      function absenceDescShow(id, nis) {
        $("#desc-absen").modal('show')
      }

      function absenceOut(id, time) {
       try {
        $.ajax({
            url: `/student/absen/${id}`,
            data: {
                _token: "{{ csrf_token() }}",
                time
            },
            type: "PUT",
            success: (response) => {
                console.log(`${time}: ${response.msg}`)
                md.byeByeNotif(response.msg)
                setInterval(() => {
                  location.reload()
                }, 3000);
            },
            error: (error) => {
                console.log(error.responseJSON)
            }
        })
        $("#out-button").addClass("disabled");
        $("#out-button").attr("disabled", "disabled");
       } catch (error) {
         console.log(error)
       }
      }
    </script>
@endpush
