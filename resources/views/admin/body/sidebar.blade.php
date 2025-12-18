<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('admin.dashboard') }}" class="b-brand text-primary">
                <img src="{{ asset('Backend/assets/images/logo-white.svg') }}"
                     class="img-fluid logo-lg"
                     alt="logo" />
            </a>
        </div>

        <div class="navbar-content">
            <ul class="pc-navbar">

                <!-- Navigation -->
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

                {{-- ================= ADMIN ONLY ================= --}}
                @if(Auth::check() && Auth::user()->can('role_management.menu'))

                <!-- Badges & Levels -->
                <li class="pc-item pc-caption">
                    <label>Badges & Levels</label>
                </li>

                <li class="pc-item">
                    <a href="{{ route('admin.Badges') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-medal"></i></span>
                        <span class="pc-mtext">Create Badges</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('admin.Levels') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-ladder"></i></span>
                        <span class="pc-mtext">Create Levels</span>
                    </a>
                </li>

                <!-- CBT -->
                <li class="pc-item pc-caption">
                    <label>CBT</label>
                </li>

                <li class="pc-item">
                    <a href="{{ route('topics.create') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-pencil"></i></span>
                        <span class="pc-mtext">Create Topics</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('All-topics.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-books"></i></span>
                        <span class="pc-mtext">All Topics</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('topics.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-clipboard-text"></i></span>
                        <span class="pc-mtext">Take Exams</span>
                    </a>
                </li>

                <!-- Tasks Admin -->
                <li class="pc-item pc-caption">
                    <label>Admin Tasks</label>
                </li>

                <li class="pc-item">
                    <a href="{{ route('admin.Tasks') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-list-checks"></i></span>
                        <span class="pc-mtext">Create Tasks</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('admin.submissions') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-file-text"></i></span>
                        <span class="pc-mtext">Approve Tasks</span>
                    </a>
                </li>

                <!-- Email -->
                <li class="pc-item pc-caption">
                    <label>Email</label>
                </li>

                <li class="pc-item">
                    <a href="{{ route('emails.compose') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-envelope"></i></span>
                        <span class="pc-mtext">Compose Email</span>
                    </a>
                </li>

                <!-- Role & Permission -->
                <li class="pc-item pc-caption">
                    <label>Role & Permission</label>
                </li>

                @if(Auth::user()->can('all.permissions'))
                <li class="pc-item">
                    <a href="{{ route('all.permission') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-key"></i></span>
                        <span class="pc-mtext">All Permissions</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can('all.roles'))
                <li class="pc-item">
                    <a href="{{ route('all.roles') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-shield"></i></span>
                        <span class="pc-mtext">All Roles</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can('roles_in_permission'))
                <li class="pc-item">
                    <a href="{{ route('add.roles.permission') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-lock-key"></i></span>
                        <span class="pc-mtext">Roles In Permission</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can('all_role_and_permission'))
                <li class="pc-item">
                    <a href="{{ route('all.roles.permission') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-lock"></i></span>
                        <span class="pc-mtext">Roles & Permissions</span>
                    </a>
                </li>
                @endif

                <!-- Admin Management -->
                <li class="pc-item pc-caption">
                    <label>Admin Management</label>
                </li>

                @if(Auth::user()->can('all.administrators'))
                <li class="pc-item">
                    <a href="{{ route('all.admin') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-users"></i></span>
                        <span class="pc-mtext">All Admins</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->can('add.adminstrators'))
                <li class="pc-item">
                    <a href="{{ route('add.admin') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-user-plus"></i></span>
                        <span class="pc-mtext">Add Admin</span>
                    </a>
                </li>
                @endif

                @endif
                {{-- =============== END ADMIN ONLY ================= --}}

                <!-- User Tasks -->
                <li class="pc-item pc-caption">
                    <label>Task Activities</label>
                </li>

                <li class="pc-item">
                    <a href="{{ route('user.all-task') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-clipboard"></i></span>
                        <span class="pc-mtext">All Tasks</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('user.enrolled-task') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-bookmark"></i></span>
                        <span class="pc-mtext">Enrolled Tasks</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('user.completed-task') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-check-circle"></i></span>
                        <span class="pc-mtext">Completed Tasks</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="{{ route('user.my.submissions') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-upload"></i></span>
                        <span class="pc-mtext">Submitted Tasks</span>
                    </a>
                </li>

                <!-- Community -->
                <li class="pc-item pc-caption">
                    <label>Community</label>
                </li>

                <li class="pc-item">
                    <a href="/forum" class="pc-link">
                        <span class="pc-micon"><i class="ph ph-chats-circle"></i></span>
                        <span class="pc-mtext">Forum</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->
