@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $profileData = $user;
    $unreadNotifications = $user->unreadNotifications;
    $latestNotifications = $user->notifications->take(5);
@endphp

<header class="pc-header">
    <div class="header-wrapper">

        <!-- LEFT -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ph ph-list"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ph ph-list"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!-- RIGHT -->
        <div class="ms-auto">
            <ul class="list-unstyled d-flex align-items-center">

                <!-- THEME SWITCHER -->
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0"
                       href="#"
                       data-bs-toggle="dropdown">
                        <i class="ph ph-sun-dim"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <button class="dropdown-item" data-theme="dark">
                            <i class="ph ph-moon"></i> Dark
                        </button>
                        <button class="dropdown-item" data-theme="light">
                            <i class="ph ph-sun"></i> Light
                        </button>
                        <button class="dropdown-item" data-theme="default">
                            <i class="ph ph-cpu"></i> Default
                        </button>
                    </div>
                </li>

                <!-- NOTIFICATIONS -->
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0"
                       href="#"
                       data-bs-toggle="dropdown">
                        <i class="ph ph-bell"></i>
                        @if($unreadNotifications->count() > 0)
                            <span class="badge bg-success pc-h-badge">
                                {{ $unreadNotifications->count() }}
                            </span>
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header">
                            <h6 class="mb-0">
                                {{ $unreadNotifications->count() }} New Notifications
                            </h6>
                        </div>

                        <div class="dropdown-body notification-scroll">
                            @forelse($latestNotifications as $notification)
                                @php $data = $notification->data; @endphp
                                <a href="{{ route('notifications.show', $notification->id) }}"
                                   class="dropdown-item notification-item">
                                    <strong>
                                        {{ $data['title'] ?? $data['thread_title'] ?? 'Notification' }}
                                    </strong>
                                    <div class="small text-muted">
                                        {{ $data['message'] ?? $data['body'] ?? '' }}
                                    </div>
                                </a>
                            @empty
                                <span class="dropdown-item text-muted">
                                    No notifications
                                </span>
                            @endforelse
                        </div>

                        <div class="dropdown-footer text-center">
                            <form method="POST" action="{{ route('notifications.clear') }}">
                                @csrf
                                <button class="btn btn-sm btn-light w-100">
                                    Clear Notifications
                                </button>
                            </form>
                        </div>
                    </div>
                </li>

                <!-- USER PROFILE -->
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="profileDropdown"
                       data-bs-toggle="dropdown">
                        <img src="{{ $profileData->photo
                                ? url('upload/'.$profileData->photo)
                                : url('upload/no_image.jpg') }}"
                             class="rounded-circle"
                             style="width:30px;height:30px;"
                             alt="Profile">
                    </a>

                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">

                        <div class="dropdown-header text-center">
                            <img src="{{ $profileData->photo
                                    ? url('upload/'.$profileData->photo)
                                    : url('upload/no_image.jpg') }}"
                                 class="rounded-circle mb-2"
                                 style="width:50px;height:50px;">
                            <h6 class="mb-0">{{ $profileData->name }}</h6>
                            <small class="text-muted">{{ $profileData->email }}</small>
                        </div>

                        <a href="{{ route('user.profile') }}" class="dropdown-item">
                            <i class="ph ph-user-circle"></i>
                            Profile & Settings
                        </a>

                        <a href="{{ $user->role === 'Admin'
                                    ? route('admin.change.password')
                                    : route('profile.edit') }}"
                           class="dropdown-item">
                            <i class="ph ph-lock"></i>
                            Change Password
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- ✅ LOGOUT (DO NOT TOUCH) -->
                        <a href="{{ route('logout') }}"
                           class="dropdown-item text-danger"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="ph ph-sign-out"></i>
                            Log Out
                        </a>

                        <form id="logout-form"
                              method="POST"
                              action="{{ route('logout') }}"
                              class="d-none">
                            @csrf
                        </form>

                    </div>
                </li>

            </ul>
        </div>

    </div>
</header>

<!-- SAFE STYLES -->
<style>
.notification-scroll {
    max-height: 300px;
    overflow-y: auto;
}
.notification-item:hover {
    background: rgba(0,0,0,0.05);
}
</style>

<!-- SAFE JS -->
<script>
document.addEventListener('click', function (e) {
    const themeBtn = e.target.closest('[data-theme]');
    if (themeBtn && window.layout_change) {
        layout_change(themeBtn.dataset.theme);
    }
});
</script>
