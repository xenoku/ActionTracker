<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-body">
        <div class="container-fluid px-0" style="width: 90%;">
            <a class="navbar-brand" href="#">Action tracker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link @if( Request::is('main') ) active @endif" href={{url('main')}}>Main</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if( Request::is('activities') ) active @endif" href="{{url('activities')}}">Activities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if( Request::is('sessions') ) active @endif" href="{{url('sessions')}}">Sessions</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link active" href="#">
                        <i class="fa fa-user" style="font-size:20px; color:white;"></i>
                        <span>  </span>{{ Auth::user()->name }}
                    </a>
                    <a class="btn btn-outline-success my-2 my-sm-0" href="{{url('logout')}}">Exit</a>
                </ul>
            </div>
        </div>
    </nav>
</header>