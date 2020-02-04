<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu nav-list" id="side-menu">
            <li class="nav-header ">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('backend/img/admin1.png') }}" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">Administrator<b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('show.profile') }}">Profile</a></li>
                        <li><a href="{{ route('password.change') }}">Change Password</a></li>
                        <li class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <li class="{{ Request::is('question-template*') ? 'active' : '' }}">
                <a href="{{ route('question-templates.index') }}"><i class="fa fa-file-text"></i><span class="nav-label">Question Template</span></a>
            </li>

             <li class="{{ Request::is('questions*') ? 'active' : '' }}">
                <a href="{{ route('questions.index') }}"><i style="font-size: 20px" class="fa fa-question"></i> <span class="nav-label">Questions</span></a>
            </li>

            <li class="{{ Request::is('departments*') ? 'active' : '' }}">
                <a href="{{ route('departments.index') }}"><i style="font-size: 15px" class="fa fa-users"></i><span class="nav-label">Departments</span></a>
            </li>

            <li class="{{ Request::is('subjects*') ? 'active' : '' }}">
                <a href="{{ route('subjects.index') }}"><i class="fa fa-book" aria-hidden="true"></i> <span class="nav-label">Subjects</span></a>
            </li>

        </ul>
    </div>
</nav>
