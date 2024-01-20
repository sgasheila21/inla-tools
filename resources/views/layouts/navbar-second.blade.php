<nav class="navbar navbar-expand-lg sticky-top navbar-light shadow bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home"><img src="{{ asset('storage/images/INLA_TEXT.png') }}" alt="" height="30"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
        <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() == 'data' ? 'active' : '' }}" href="{{ route('data') }}">Data</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() == 'analysis' ? 'active' : '' }}" href="{{ route('analysis') }}">Analysis</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ request()->route()->getName() == 'variable' ? 'active' : '' }}" href="{{ route('variable') }}">Variable</a>
        </li>
      </ul>
    </div>
    <div class="vertical-line"></div>
    <div class="navbar-text ms-auto">
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="me-2">Hi, {{ head(explode(' ', auth()->user()->name)) }}</div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('change.password') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                        </svg>
                        Change Password</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                          <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                        </svg>
                        Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>


  </div>
</nav>

<!-- EXTRA CSS -->
<style>
  .navbar-nav .nav-link {
    color: #00A099 !important;
  }

  .navbar-nav .nav-link.active {
    color: #BBCF33 !important;
  }

  .vertical-line {
        border-left: 1px solid #ccc;
        height: 30px;
        margin: 0 10px;
    }
</style>

<!-- EXTRA SCRIPT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.nav-link').on('click', function() {
      $('.nav-link').removeClass('active');
      $(this).addClass('active');
    });
  });
</script>
