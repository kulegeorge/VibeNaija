@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $profileData = $user;
    $unreadNotifications = $user->unreadNotifications;
    $latestNotifications = $user->notifications->take(5);
@endphp


<nav class="navbar" style="background: linear-gradient(#fff, #dcdcdc);">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>

    <div class="navbar-content">

        <!-- Search -->
        <form class="search-form">
            <div class="input-group">
                <div class="input-group-text">
                    <i data-feather="search"></i>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>

        <ul class="navbar-nav">


            <!-- Profile Image Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown">
                    <i data-feather="grid"></i>
                </a>

                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Profile Images</p>
                    </div>

                    <div class="row g-0 p-1">
                        <div class="col-3 text-center">
                            <a href="{{ $user->role === 'Admin' ? route('admin.profile') : route('user.profile') }}"
                               class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <i data-feather="instagram" class="icon-lg mb-1"></i>
                                <p class="tx-12">Profile Image</p>
                            </a>
                        </div>
                    </div>

                    <div class="px-3 py-2 border-top"></div>
                </div>
            </li>



            <!-- Notifications Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown">
                    <i data-feather="bell"></i>

                    @if($unreadNotifications->count() > 0)
                        <div class="indicator">
                            <div class="circle"></div>
                        </div>
                    @endif
                </a>

                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">

                    <!-- Header -->
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>{{ $unreadNotifications->count() }} New Notifications</p>
                        <form action="{{ route('notifications.clear') }}" method="POST">
    @csrf
    <button type="submit" class="text-muted border-0 bg-transparent">
        Clear all
    </button>
</form>

                    </div>

                    <!-- Notifications List -->
                    <div class="p-1">

                        @foreach($latestNotifications as $notification)
                            @php
                                $data = $notification->data;
                            @endphp

                            <a href="{{ route('notifications.show', $notification->id) }}"
                               class="dropdown-item d-flex align-items-center py-2">

                                <!-- Icon -->
                                <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                    <i class="icon-sm text-white" data-feather="gift"></i>
                                </div>

                                <!-- Content -->
                                <div class="flex-grow-1 me-2">
                                    <p class="fw-bold">{{ $data['title'] ?? $data['thread_title'] ?? 'Notification' }}</p>

                                    <p class="tx-12 text-muted" style="white-space: normal; word-wrap: break-word;">
                                        {!! nl2br(e($data['message'] ?? $data['body'] ?? '')) !!}
                                    </p>
                                </div>
                            </a>
                        @endforeach

                    </div>

                    <!-- Footer -->
                   
                </div>
            </li>



            <!-- User Profile Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                    <img class="wd-30 ht-30 rounded-circle"
                         src="{{ $profileData->photo ? url('upload/'.$profileData->photo) : url('upload/no_image.jpg') }}"
                         alt="profile Image">
                </a>

                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">

                    <!-- Profile Summary -->
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 rounded-circle"
                                 src="{{ $profileData->photo ? url('upload/'.$profileData->photo) : url('upload/no_image.jpg') }}"
                                 alt="profile">
                        </div>

                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ $profileData->name }}</p>
                            <p class="tx-12 text-muted">{{ $profileData->email }}</p>
                        </div>
                    </div>


                    <ul class="list-unstyled p-1">

                        <!-- Profile -->
                        <li class="dropdown-item py-2">
                            <a href="{{ route('user.profile') }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <!-- Change Password -->
                        <li class="dropdown-item py-2">
                            <a href="{{ $user->role === 'Admin' ? route('admin.change.password') : '/profile' }}"
                               class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Change Password</span>
                            </a>
                        </li>

                        <!-- Switch User -->
                        <li class="dropdown-item py-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-black">
                                    <i class="me-2 icon-md" data-feather="repeat"></i>
                                    <span>Switch User</span>
                                </button>
                            </form>
                        </li>

                        <!-- Logout -->
                        <li class="dropdown-item py-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-black">
                                    <i class="me-2 icon-md" data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>
    </div>
</nav>
