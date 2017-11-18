<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! route('home') !!}">{!! config('app.name') !!}</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            @auth
                <ul class="nav navbar-nav">
                    <li @if(isInPath('home')) class="active" @endif>
                        <a href="{!! route('home') !!}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
                    </li>

                    <li class="dropdown @if(isInPath('contacts')) active @endif">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-user"></span> Contacts<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{!! route('contacts.index') !!}">All Contacts</a>
                            </li>
                            <li>
                                <a href="{!! route('contacts.index',['is_company'=>1]) !!}">Companies</a>
                            </li>
                            <li>
                                <a href="{!! route('contacts.index',['is_company'=>0]) !!}">Persons</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            @endauth
            <ul class="nav navbar-nav navbar-right">
                @admin
                <li class="dropdown @if(isInPath('admin')) active @endif">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-star"></span>Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li @if(isInPath('users')) class="active" @endif>
                            <a href="{!! route('users.index') !!}">Users</a>
                        </li>
                    </ul>
                </li>
                @endadmin

                @auth
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-tasks"></span>{!! auth()->user()->info !!}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li @if(isInPath('contacts')) class="active" @endif>
                                <a href="{!! route('contacts.edit',auth()->user()->contact_id) !!}">Edit Profile</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li @if(isInPath('login')) class="active" @endif>
                        <a href="{!! route('login') !!}">Login</a>
                    </li>
                    <li @if(isInPath('register')) class="active" @endif>
                        <a href="{!! route('register') !!}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
