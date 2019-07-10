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
                    <ul class="navbar-nav mr-auto">
                        <li class="{{Request::is('/advisors') ? 'active' : ''}}">
                            <a class="nav-link" href="/advisors">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="{{Request::is('/degrees') ? 'active' : ''}}">
                            <a class="nav-link" href="/degrees">Degrees</a>
                        </li>
                        <li class="{{Request::is('/courses') ? 'active' : ''}}">
                            <a class="nav-link" href="/courses">Courses</a>
                        </li>
                        <li class="{{Request::is('/rules') ? 'active' : ''}}">
                            <a class="nav-link" href="/rules">Rules</a>
                        </li>
                        <li class="{{Request::is('/Fyp') ? 'active' : ''}}">
                            <a class="nav-link" href="/fyps/create">Four Year Plan</a>
                        </li>
                    </ul>

            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
                </ul>
            </div>
        </div>
    </nav>
</div>