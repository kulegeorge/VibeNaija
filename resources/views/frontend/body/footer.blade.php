
<footer class="footer-wrapper footer-bg">
    <div class="container">

        {{-- MAIN FOOTER --}}
        <div class="row py-5">

            {{-- BRAND / ABOUT --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <h3 class="footer-title">Vibe Nigeria</h3>
                <p class="text-white small">
                   An online cultural immersion platform designed to help Nigerian teenagers and young adults in the diaspora and at home, reconnect with their roots through interactive social and cultural challenges.
The platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).
                </p>

                <ul class="footer-social list-inline mt-3">
                    <li class="list-inline-item text-white">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ route('forum.threads.index') }}">
                            <i class="fa fa-comments"></i>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- QUICK LINKS --}}
            <div class="col-lg-2 col-md-6 mb-4">
                <h4 class="footer-title">Platform</h4>
                <ul class="footer-links list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('user.all-task') }}">All Tasks</a></li>
                    <li><a href="{{ route('user.enrolled-task') }}">My Tasks</a></li>
                    <li><a href="{{ route('notifications.index') }}">Notifications</a></li>
                </ul>
            </div>

            {{-- COMMUNITY --}}
            <div class="col-lg-2 col-md-6 mb-4">
                <h4 class="footer-title">Community</h4>
                <ul class="footer-links list-unstyled">
                    <li><a href="{{ route('forum.threads.index') }}">Forum</a></li>
                    <li><a href="{{ route('user.completed-task') }}">Completed Tasks</a></li>
                    <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                    <li><a href="{{ route('profile.edit') }}">Settings</a></li>
                </ul>
            </div>

            {{-- SUBSCRIBE --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <h4 class="footer-title">Stay Updated</h4>
                <p class="text-muted small">
                    Get notified about new tasks, computer based tests, and platform updates.
                </p>

                <form action="{{ route('subscribe') }}" method="POST" class="footer-subscribe">
                    @csrf
                    <div class="input-group">
                        <input 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            placeholder="Enter your email" 
                            required
                        >
                        <button class="btn btn-primary btn-block" type="submit">
                            Subscribe
                        </button>
                    </div>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    @if(session('success'))
                        <small class="text-warning">{{ session('success') }}</small>
                    @endif
                </form>
            </div>

        </div>

        {{-- FOOTER BOTTOM --}}
        <div class="row border-top pt-3">
            <div class="col-md-6 text-center text-md-start">
                <small class="text-muted">
                    &copy; {{ now()->year }} Vibe Nigeria. All rights reserved.
                </small>
            </div>

            <div class="col-md-6 text-center text-md-end">
                <small class="text-muted">
                    Tasks • Computer Based Tests • Community • Growth
                </small>
            </div>
        </div>

    </div>
</footer>
