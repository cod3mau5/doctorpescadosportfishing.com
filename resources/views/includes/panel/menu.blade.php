   <!-- Heading -->
   <h6 class="navbar-heading text-muted">@if(auth()->user()->role == 'admin')Gestionar datos @else Menú @endif</h6>
  <!-- Navigation -->
  <ul class="navbar-nav">

            @include('includes.panel.menu.'. auth()->user()->role)

 

          <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('formLogOut').submit();">
              <i class="ni ni-key-25"></i> Cerrar Sesión
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:none!important" id="formLogOut">
              @csrf
            </form>
          </li>
        </ul>

        @if(auth()->user()->role == 'admin')
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading text-muted">Reportes</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/charts/appointments/line')}}">
                <i class="ni ni-sound-wave text-yellow"></i> Frecuencia de citas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/charts/doctors/bars')}}">
                <i class="ni ni-spaceship text-orange"></i> Médicos más activos
              </a>
            </li>
          </ul>
        @endif