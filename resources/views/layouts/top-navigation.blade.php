<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom fixed-top ml-60">
    <div class="container-fluid">
        <a class="navbar-brand pl-3 text-secondary mr-5" href="{{ url('/') }}">
            <small>{{ config('app.name') }} <sup><span class="fal fa-copyright mr-2"></span></sup></small>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown nyumbani-search">
                    <a id="nyumbani-search" class="nav-link dropdown-toggle" href="#" role="searchbox" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <div class="align-items-center mr-2">
                            <span class="fad fa-search"></span>
                            <span class="ml-2 text-muted">Search Me</span>
                        </div>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-search border-0 shadow-sm py-0" aria-labelledby="navbarDropdown">
                        <div class="w-100 py-2 px-2 border-radius">
                            <form action="" method="get">
                                @csrf

                                <div class="input-group input-group-sm mb-1">
                                    <input type="text" name="nyumbani_search" class="form-control form-control-sm" placeholder="What are you looking for..." aria-label="" aria-describedby="basic-addon2">
                                    <div class="input-group-append search-me" id="inputGroup-sizing-sm">
                                      <button type="submit" id="search" class="btn btn-primary-sm input-group-text">
                                          <span class="far fa-search"></span>
                                      </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if (empty($disable))
                        <li class="nav-item dropdown border-right">
                            <a id="create_ticket" class="nav-link dropdown-toggle mr-1 py-1" href="{{ route('ticket.create') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                                <div class="align-items-center mr-2">
                                    <button type="button" class="btn btn-outline-success btn-sm">
                                        <span class="fal fa-plus mr-1"></span> Create Ticket
                                    </button>
                                </div>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle ml-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="align-items-center mr-2">
                                <span class="fal fa-bell text-dark"></span>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right notifications dropdown-md border-0 shadow-sm py-0" aria-labelledby="navbarDropdown">
                            <span class="with-arrow">
                                <span class="primary-color"></span>
                            </span>

                            <div class="w-100 py-2 px-4 primary-color border-radius-top-only">
                                <span class="text-left text-white font-bold">Notifications <span class="ml-2 notification-count">23</span></span>
                            </div>

                            <div class="notification-center ps-active-y">
                                <ul class="list-style-none font-small px-0">
                                    <li>
                                        <a href="" class="notification-item">
                                            <div class="notification-content text-secondary">
                                                <span class="mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                                                <span class="time font-small text-muted">a few seconds ago</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="" class="notification-item">
                                            <div class="notification-content text-secondary">
                                                <span class="mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                                                <span class="time font-small text-muted">a few seconds ago</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="" class="notification-item">
                                            <div class="notification-content text-secondary">
                                                <span class="mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                                                <span class="time font-small text-muted">a few seconds ago</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <a href="" class="notification-bucket">
                                <div class="w-100 py-2 item justify-content-center px-2 text-center ">
                                    <span class="text-secondary">View all notifications</span>
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle py-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/avatars/'.Auth::user()->avatar.'.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                                <span class="far fa-chevron-down ml-2"></span>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-md border-0 shadow-sm py-0" aria-labelledby="navbarDropdown">
                            <span class="with-arrow">
                                <span class="primary-color"></span>
                            </span>

                            <div class="w-100 py-2 primary-color px-4 border-radius-top-only">
                                <span class="text-left text-white mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span><br>
                                <span class="text-left text-white">{{ Auth::user()->email }}</span>
                            </div>

                            <a class="dropdown-item py-2" href="">
                                {{ __('Settings & Account Details') }}
                            </a>

                            <a class="dropdown-item py-2" href="">
                                {{ __('Help & Information') }}
                            </a>

                            <a class="dropdown-item py-2" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Sign Out') }}
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