<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      @if (Auth::user()->role == 'student')
        <div class="row">
            <h1 style="font-size: 5em" class="ml-4" id="time"></h1>
            <h2 style="font-size: 3em;" id="second"></h2>
        </div>
      @endif
      {{-- <a class="navbar-brand" href="#">{{ $titlePage }}</a> --}}
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form">
        <div class="input-group no-border">
        <input type="text" list="searchList" id="searchInput" value="" class="form-control" placeholder="Search...">
        <datalist id="searchList">

        </datalist>
        <button type="button" onclick="locationHref()" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href=@if (Auth::user()->role == 'admin') {{ route('admin.dashboard') }} @elseif (Auth::user()->role == 'student') {{ route('student.dashboard') }} @endif>
            <i class="material-icons">dashboard</i>
            <p class="d-lg-none d-md-block">
              {{ __('Stats') }}
            </p>
          </a>
        </li>
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification">5</span>
            <p class="d-lg-none d-md-block">
              {{ __('Some Actions') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">{{ __('Mike John responded to your email') }}</a>
            <a class="dropdown-item" href="#">{{ __('You have 5 new tasks') }}</a>
            <a class="dropdown-item" href="#">{{ __('You\'re now friend with Andrew') }}</a>
            <a class="dropdown-item" href="#">{{ __('Another Notification') }}</a>
            <a class="dropdown-item" href="#">{{ __('Another One') }}</a>
          </div>
        </li> --}}
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            {{-- <a class="dropdown-item" href="#">{{ __('Settings') }}</a> --}}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  $(window).on('load', function(){
    time();
    searchBar();
  })

  function time() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    // $("#time#").text(`${h}:${m}:${s}`);
    $("h1#time").text(`${h}.${m}`);
    // $("h1#minute").text(m);
    $("h2#second").text(s);
    setTimeout(time, 1000);
  }
  
  function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
  }

  async function searchBar() {
    const response = await HitData('{{ route('search') }}', null, 'GET')
    const student = response.data_student
    const admin = response.data_admin
    @if (Auth::user()->role == 'admin')
      for (const obj of admin) {
        $("#searchList").append(`<option href="${obj['href']}" value="${obj['page']}" class="searchValue">${obj['desc']}</option>`)
      }
    @endif
    
    @if (Auth::user()->role == 'student') 
      for (const obj of student) {
        $("#searchList").append(`<option href="${obj['href']}" value="${obj['page']}" class="searchValue">${obj['desc']}</option>`)
      }
    @endif 
  }

  async function locationHref() {
    var search_key = $("#searchInput").val()
    const response = await HitData('{{ route('search') }}', null, 'GET')
    const student = response.data_student
    const admin = response.data_admin
    @if (Auth::user()->role == 'student') 
      for (const obj of student) {
        if (obj['page'] == search_key) {
          var href_key = obj['href']
        }
      }
    @elseif (Auth::user()->role == 'admin')
      for (const obj of admin) {
        if (obj['page'] == search_key) {
          var href_key = obj['href']
        }
      }
    @endif
    location.href = href_key
  }
</script>