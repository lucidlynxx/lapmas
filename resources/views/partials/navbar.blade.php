<header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">LAPMAS</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>

        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
        
        @auth
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <button class="dropdown-item">
                <a href="/dashboard" class="text-decoration-none text-dark">My Dashboard &emsp;<i class="bi bi-layout-text-window-reverse"></i></a> 
              </button>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal">
                  Logout &emsp;&emsp;&emsp;&emsp;&ensp;<i class="bi bi-box-arrow-right"></i>
                </button>
            </li>
          </ul>
        @else
        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">Login</a>
        @endauth

      </nav>
    </div>
  </header>