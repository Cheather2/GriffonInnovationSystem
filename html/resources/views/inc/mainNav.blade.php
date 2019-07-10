<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-laravel">
        <div class="container">
            <a class="navbar-brand ml-0" href="{{ url('/') }}">
                {{ 'Griffon Innovation System' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @guest
                @if (Route::has('register'))
                <ul class="navbar-nav mr-auto">
                  <li class="{{Request::is('/') ? 'active' : ''}}">
                      <a class="nav-link" href="/">Help <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
                @endif
                @else
                <ul class="navbar-nav mr-auto">
                  <li class="{{Request::is('/') ? 'active' : ''}}">
                      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="{{Request::is('/account') ? 'active' : ''}}">
                      <a class="nav-link" href="/account">My Account</a>
                    </li>
                    <li class="{{Request::is('fyps/studentSearchFyp') ? 'active' : ''}}">
                        <a class="nav-link" href="fyps/studentSearchFyp">My Four Year Plan</a>
                    </li>
                </ul>
                @endguest

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a href="{{ url('auth/google') }}"class="btn btn-warning">Login With Google</a>
                        </li>

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>