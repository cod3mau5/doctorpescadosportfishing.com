<ul class="nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('fishing-report.index') }}">
      <i class="ni ni-book-bookmark text-danger"></i> Fishing Report
    </a>
  </li>
  {{-- @if( auth()->user()->role == '2') --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/pangas') }}">
        <i class="fa fa-anchor text-blue" aria-hidden="true"></i> Pangas
      </a>
    </li>
  {{-- @endif --}}
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/admin/charters') }}">
      <i class="fa fa-ship text-success" aria-hidden="true"></i> Charters
    </a>
  </li>

</ul>