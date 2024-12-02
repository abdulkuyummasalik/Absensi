<div class="sidebar" data-color=@if(Auth::user()->role == 'admin') {{"azure"}} @elseif(Auth::user()->role == 'student') {{ "green" }} @endif data-background-color="black" data-image="https://i.pinimg.com/originals/be/42/db/be42db03bb31cee54782fd5ca8580206.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    {{-- <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a> --}}
    <a href="" class="simple-text logo-normal">
      {{ __('Project Absensi') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @if(Auth::user()->role == 'student')
      <li title="Dashboard Student" rel="tooltip" class="nav-item{{ $activePage == 'student-home' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('student.dashboard') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li title="Profile User" rel="tooltip" class="nav-item {{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <span class="sidebar-mini"> UP </span>
          <span class="sidebar-normal">{{ __('User profile') }} </span>
        </a>
      </li>
      @elseif(Auth::user()->role == 'admin')
      <div id="admin-page">
        <li title="Dashboard Admin" rel="tooltip" class="nav-item{{ $activePage == 'dashboard-admin' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="material-icons">dashboard</i>
              <p>{{ __('Dashboard') }}</p>
          </a>
        </li>
        
      <li class="nav-item {{ ($activePage == 'absen' || $activePage == 'rayon' || $activePage == 'rombel' || $activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#adminControl" aria-expanded="true">
          <i class="material-icons">apps</i>
          <p>{{ __('Admin Pages') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ ($activePage == 'absen' || $activePage == 'rayon' || $activePage == 'rombel' || $activePage == 'reg-user' || $activePage == 'profile') ? ' show' : '' }}" id="adminControl">
          <ul class="nav">
            <li title="Absen" rel="tooltip" class="nav-item {{ $activePage == 'absen' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.absens') }}">
                <span class="sidebar-mini"> AP </span>
                <span class="sidebar-normal">{{ __('Absen Pages') }} </span>
              </a>
            </li>
            <li title="Rayon" rel="tooltip" class="nav-item{{ $activePage == 'rayon' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.rayon.index') }}">
                <span class="sidebar-mini"> RP </span>
                <span class="sidebar-normal"> {{ __('Rayon Pages') }} </span>
              </a>
            </li>
            <li title="Rombel" rel="tooltip" class="nav-item{{ $activePage == 'rombel' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.rombel.index') }}">
                <span class="sidebar-mini"> RP </span>
                <span class="sidebar-normal"> {{ __('Rombel Pages') }} </span>
              </a>
            </li>
            <li title="User Reg" rel="tooltip" class="nav-item{{ $activePage == 'reg-user' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Registrations') }} </span>
              </a>
            </li>
            
            <li title="Profile Page" rel="tooltip" class="nav-item{{ ($activePage == 'profile') ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#userControl" aria-expanded="true">
                <i class="material-icons">class</i>
                <p>{{ __('User Pages') }}
                  <b class="caret"></b>
                </p>
              </a>
              <div class="collapse {{ ($activePage == 'profile') ? ' show' : '' }}" id="userControl">
                <ul class="nav">
                  <li title="Profile User" rel="tooltip" class="nav-item {{ $activePage == 'profile' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                      <span class="sidebar-mini"> UP </span>
                      <span class="sidebar-normal">{{ __('User profile') }} </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </li>
      </div>
      
      {{-- <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('User Pages') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item {{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li> --}}

      {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li> --}}

      {{-- <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> --}}
      @endif
    </ul>
  </div>
</div>
