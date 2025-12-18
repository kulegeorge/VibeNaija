<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="#" class="sidebar-brand">
          Vibe<span>Nigeria</span>
        </a>
        </div>

        <div class="navbar-content">
            <ul class="pc-navbar">

                {{-- ================= MAIN ================= --}}
                <li class="pc-item pc-caption">
                    <label>Main</label>
                </li>

                <li class="pc-item">
                    @if(Auth::check() && Auth::user()->can('role_management.menu'))
                        <a href="{{ route('admin.dashboard') }}" class="pc-link">
                    @else
                        <a href="{{ route('dashboard') }}" class="pc-link">
                    @endif
                        <span class="pc-micon"><i class="ph ph-house-line"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ url('/') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-globe"></i></span>
                        <span class="pc-mtext">Home Page</span>
                    </a>
                </li>

                {{-- ================= ADMIN: BADGES & LEVELS ================= --}}
                @if(Auth::check() && Auth::user()->can('role_management.menu'))
                <li class="pc-item pc-caption">
                    <label>Badges & Levels</label>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-medal"></i></span>
                        <span class="pc-mtext">Components</span>
                        <span class="pc-arrow"><i class="ph ph-caret-down"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('admin.Badges') }}" class="pc-link">
                                Admin Create Badges
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('admin.Levels') }}" class="pc-link">
                                Admin Create Levels
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                {{-- ================= ADMIN: CBT ================= --}}
                @if(Auth::check() && Auth::user()->can('role_management.menu'))
                <li class="pc-item pc-caption">
                    <label>CBT</label>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-book-open"></i></span>
                        <span class="pc-mtext">Topics & Exams</span>
                        <span class="pc-arrow"><i class="ph ph-caret-down"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('topics.create') }}" class="pc-link">
                                Admin Create Topics
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('All-topics.index') }}" class="pc-link">
                                Admin All Topics
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="{{ route('topics.index') }}" class="pc-link">
                                Take Exams
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                {{-- ================= ADMIN: TASK MANAGEMENT ================= --}}
                @if(Auth::check() && Auth::user()->can('role_management.menu'))
                <li class="pc-item pc-caption">
                    <label>Admin Activities</label>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-list-checks"></i></span>
                        <span class="pc-mtext">Tasks</span>
                        <span class="pc-arrow"><i class="ph ph-caret-down"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="{{ route('admin.Tasks') }}" class="pc-link">
                                Admin Create Task
                            </a>
                        </li>

                        <li class="pc-item">
                            <a href="{{ route('admin.showTask') }}" class="pc-link">
                                Admin Edit Task
                            </a>
                        </li>
                        
                        <li class="pc-item">
                            <a href="{{ route('admin.submissions') }}" class="pc-link">
                                Approve Tasks
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                {{-- ================= USER TASKS ================= --}}
                <li class="pc-item pc-caption">
                    <label>Task Activities</label>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link colapsed">
                        <span class="pc-micon"><i class="ph ph-clipboard-text"></i></span>
                        <span class="pc-mtext">My Tasks</span>
                        <span class="pc-arrow"><i class="ph ph-caret-down"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a href="{{ route('user.all-task') }}" class="pc-link">View All Tasks</a></li>
                        <li class="pc-item"><a href="{{ route('user.completed-task') }}" class="pc-link">Completed Tasks</a></li>
                        <li class="pc-item"><a href="{{ route('user.my.submissions') }}" class="pc-link">Submitted Tasks</a></li>
                        <li class="pc-item"><a href="{{ route('user.enrolled-task') }}" class="pc-link">Enrolled Tasks</a></li>
                    </ul>
                </li>

                {{-- ================= COMMUNITY ================= --}}
                <li class="pc-item pc-caption">
                    <label>Community</label>
                </li>

                <li class="pc-item">
                    <a href="/forum" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-chats-circle"></i></span>
                        <span class="pc-mtext">Join Community</span>
                    </a>
                </li>

                {{-- ================= ADMIN: EMAIL ================= --}}
                @if(Auth::check() && Auth::user()->can('role_management.menu'))
                <li class="pc-item pc-caption">
                    <label>Email System</label>
                </li>

                <li class="pc-item">
                    <a href="{{ route('emails.compose') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-envelope"></i></span>
                        <span class="pc-mtext">Compose Email</span>
                    </a>
                </li>
                @endif

                {{-- ================= ADMIN: ROLES & PERMISSIONS ================= --}}
                @if(Auth::check() && Auth::user()->can('role_management.menu'))
                <li class="pc-item pc-caption">
                    <label>Roles & Permissions</label>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-shield-check"></i></span>
                        <span class="pc-mtext">Access Control</span>
                        <span class="pc-arrow"><i class="ph ph-caret-down"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a href="{{ route('all.permission') }}" class="pc-link">All Permissions</a></li>
                        <li class="pc-item"><a href="{{ route('all.roles') }}" class="pc-link">All Roles</a></li>
                        <li class="pc-item"><a href="{{ route('add.roles.permission') }}" class="pc-link">Roles In Permission</a></li>
                        <li class="pc-item"><a href="{{ route('all.roles.permission') }}" class="pc-link">All Roles & Permissions</a></li>
                    </ul>
                </li>
                @endif

                {{-- ================= ADMIN: ADMIN MANAGEMENT ================= --}}
                @if(Auth::check() && Auth::user()->can('role_management.menu'))
                <li class="pc-item pc-caption">
                    <label>Admin Management</label>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="javascript:void(0)" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-users"></i></span>
                        <span class="pc-mtext">Administrators</span>
                        <span class="pc-arrow"><i class="ph ph-caret-down"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a href="{{ route('all.admin') }}" class="pc-link">All Admins</a></li>
                        <li class="pc-item"><a href="{{ route('add.admin') }}" class="pc-link">Add Admin</a></li>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
