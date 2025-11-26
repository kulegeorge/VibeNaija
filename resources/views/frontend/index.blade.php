<!DOCTYPE html>
<html lang="en-us">
<head>

	<meta charset="utf-8" >
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Vibe NIgeria</title>

	<meta name="author" content="shiftthemes">
	<meta name="description" content="VibeNaija is an online cultural immersion platform designed to help Nigerian teenagers and young adults in the diaspora and at home, reconnect with their roots through interactive social and cultural challenges.
The platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).
The long-term vision is to create a global online community of young Nigerians who celebrate and share their heritage proudly.
">

	
 	

  	<!-- CSS files -->
	<link href="{{ asset('Frontend/fonts/Montserrat.css')}}" rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
    <link href="https:{{ asset('Frontend/css/font-awesome.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('Frontend/css/void.css') }}" id="_include_elegant_font">

	<link rel="stylesheet" href="{{ asset('Frontend/plugins/rs-plugin/css/settings.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('Frontend/css/void.css') }}" id="_include_owl_carousel">
	
	<link rel="stylesheet" href="{{ asset('Frontend/plugins/magnific-popup/magnific-popup.css') }}">
	


	
	<!-- Main CSS file -->
	<link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
	

<style>
    /* FORCE ALL TASK IMAGES TO BE SAME SIZE */
    .task-img {
        width: 100%;
        height: 220px;            /* fixed height for equal cards */
        object-fit: cover;        /* crop perfectly */
        border-radius: 10px;
        display: block;
    }

    /* FIX LABELS (TAG / BADGE STYLES) */
    .task-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }

    .task-badge {
        background: #f7f7f7;
        border: 1px solid #ddd;
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #333;
    }

    .task-badge.star {
        background: #ffe28a;
        border-color: #d6b85a;
    }

    .image-wrapper {
    overflow: hidden;
    border-radius: 10px;
}

.task-thumb {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform .35s ease;
}

.task-thumb:hover {
    transform: scale(1.08);
}

</style>


	

</head>
<body>

<div id="preloader">
	<div id="status">&nbsp;</div>
</div>



<!-- Global Wrapper -->
<div id="wrapper">


	<div class="h-wrapper">

		<!-- Top Bar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<ul class="top-menu">
							<li><a href="#aboutus">About</a></li>
						
							<li><a href="/login">Login</a></li>
							<li><a href="/register">Sign Up</a></li>
						</ul>
					</div>
					<!-- This column is hidden on mobiles -->
					<div class="col-sm-6">
						<div class="pull-right hidden-xs">
							<ul class="social-icon unstyled">
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header -->
		@include('frontend.body.header')

	</div>

	<!-- Do not remove this class -->
	<div class="push-top"></div>

	<!-- Slider -->
	@include('frontend.body.slider')
	<!-- END Slider-->



	<section class="section mt40">
		<div class="container">
			<div class="row mb40">

							<h3 class="title-medium color-on-dark">How We Work: The VibeNaija Experience</h3>
							<div class="br-bottom mb20"></div>
				<div class="col-sm-6 col-md-4 xs-box">
					<div class="box-services-a">
						<h3 class="title-small"><i class="fa fa-sign-in fa-bg"></i> Join & Set Your Vibe <a href="page_services_4.html#" class="link-read-more">read more</a></h3>
						<p>Sign up and create your profile. Choose the cultural interests that resonate with you, whether it's music, language, or history—there's a vibe for everyone!</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="box-services-a">
						<h3 class="title-small"><i class="fa fa-tasks fa-bg"></i> Accept Fun Cultural Challenges/Task <a href="page_services_4.html#" class="link-read-more">read more</a></h3>
						<p>Participate in weekly or monthly interactive tasks that explore Nigerian traditions, languages, cuisine, and lifestyle—all gamified to keep things fresh and exciting.</p>
					</div>
				</div>
				<div class="hidden-sm col-md-4">
					<div class="box-services-a">
						<h3 class="title-small"><i class="fa fa-star fa-bg"></i> Earn Badges & Level Up <a href="page_services_4.html#" class="link-read-more">read more</a></h3>
						<p>Complete challenges to earn points, unlock badges, and rise through the ranks. Every achievement brings you closer to mastering your heritage!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4 xs-box">
					<div class="box-services-a">
						<h3 class="title-uppercased mb10"><i class="fa icon_mobile fa-style5"></i> Connect & Celebrate Together <a href="page_services_4.html#" class="link-read-more">read more</a></h3>
						<p>Share your journey, stories, and wins with the VibeNaija community. Make friends, collaborate, and be part of a global celebration of Nigerian culture!</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="box-services-a">
						<h3 class="title-uppercased mb10"><i class="fa icon_lifesaver fa-style5"></i> Premium Support <a href="page_services_4.html#" class="link-read-more">read more</a></h3>
						<p>VibeNaija is built to support every young Nigerian on their journey of cultural rediscovery. Whether you're in the diaspora or at home, the platform offers a safe, engaging, and inclusive space where you can learn at your own pace/p>
					</div>
				</div>
				<div class="hidden-sm col-md-4">
					<div class="box-services-a">
						<h3 class="title-uppercased mb10"><i class="fa icon_lightbulb_alt fa-style5"></i> User-Friendly Nanture <a href="page_services_4.html#" class="link-read-more">read more</a></h3>
						<p>We designed with a clean, intuitive, and mobile-friendly interface that makes navigation simple for all users. Activities, challenges, and resources are easy to access, and the platform uses clear icons, thoughtful layouts, and interactive features to ensure a smooth experience</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<section class="section-bg section-dark p0 mb0 data-height-fix">

		<div class="row col-p0">
			<div class="col-sm-6 hidden-xs">
				<div class="box-services-d p0 bg-img bg11">
					<div class="bg-overlay"></div>
					<div class="set-height"></div>
				</div>
			</div>
		</div>

		<div class="section-caption" id="aboutus">
			<div class="container">
				<div class="row col-p0">
					<div class="col-sm-5 col-sm-offset-7 get-height">
						<div class="mb50 mt50">
							<h3 class="title-medium color-on-dark">About us</h3>
							<div class="br-bottom mb20"></div>
							<p class="mb50 color-on-dark">VibeNaija is an online cultural immersion platform designed to help Nigerian teenagers and young adults in the diaspora and at home, reconnect with their roots through interactive social and cultural challenges.
The platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).
The long-term vision is to create a global online community of young Nigerians who celebrate and share their heritage proudly.
</p>
							<div class="br-bottom mb20"></div>
							<h3 class="title-uppercased mb20 color-on-dark">Our skills</h3>
							<div class="progress">
							  	<div class="progress-bar" data-percentage="85"><span>Creativity 95%</span></div>
							</div>
							<div class="progress">
							  	<div class="progress-bar" data-percentage="70"><span>Initiatives 70%</span></div>
							</div>
							<div class="progress">
							  	<div class="progress-bar" data-percentage="100"><span>Learning 100%</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section-bg section-large section-dark mt20" id="advantages">
    <div class="container">
        <div class="row text-center mb40">
            <h2 class="color-on-dark title-shadow-a">What Makes Us Different</h2>
            <div class="br-bottom mx-auto mb20" style="width:70px;"></div>
            <p class="color-on-dark lead">
                VibeNaija is designed to inspire creativity, build confidence, and bring young people together through fun challenges and meaningful experiences.
            </p>
        </div>

        <div class="row col-p30">

            <!-- INTERACTIVE LEARNING -->
            <div class="col-sm-4 xs-box2">
                <i class="icon_lightbulb_alt color-on-dark fa-4x op8"></i>
                <h3 class="title-uppercased color-on-dark title-shadow-a mt20 mb10">Interactive Learning</h3>
                <div class="br-bottom mb20"></div>
                <p class="color-on-dark">
                    We create exciting tasks that teach new skills, encourage curiosity, 
                    and make personal development simple, fun, and rewarding for young people everywhere.
                </p>
            </div>

            <!-- COMMUNITY AND CONNECTIVITY -->
            <div class="col-sm-4 xs-box2">
                <i class="icon_chat_alt color-on-dark fa-4x op8"></i>
                <h3 class="title-uppercased color-on-dark title-shadow-a mt20 mb10">Community & Connection</h3>
                <div class="br-bottom mb20"></div>
                <p class="color-on-dark">
                    Our platform connects young people with shared interests, allowing them 
                    to express themselves, share their progress, and build lasting friendships.
                </p>
            </div>

            <!-- GROWTH & MOTIVATION -->
            <div class="col-sm-4">
                <i class="icon_adjust-vert color-on-dark fa-4x op8"></i>
                <h3 class="title-uppercased color-on-dark title-shadow-a mt20 mb10">Growth & Motivation</h3>
                <div class="br-bottom mb20"></div>
                <p class="color-on-dark">
                    With points, badges, and levels, we motivate users to stay engaged, challenge themselves,
                    celebrate milestones, and track their progress in a simple gamified system.
                </p>
            </div>

        </div>
    </div>
</section>




	<section class="section" id="tasks">
		<div class="container">
			<div class="row col-p20">
				<h3 class="title-medium color-on-dark">Some Recent Task</h3>
							<div class="br-bottom mb20"></div>
				
		@if(!empty($tasks))
								<!-- IMAGE -->
         
					@foreach($tasks as $task)
								   @php
                $thumb = null;

                if ($task->images) {
                    $images = json_decode($task->images);
                    if (!empty($images)) {
                        $thumb = asset('uploads/tasks/' . $images[0]);
                    }
                }

                if (!$thumb && $task->url) {
                    preg_match(
                        '/(?:youtu\\.be\\/|youtube\\.com\\/(?:embed\\/|v\\/|watch\\?v=|watch\\?.+&v=))([A-Za-z0-9_-]{11})/',
                        $task->url,
                        $matches
                    );
                    if (!empty($matches[1])) {
                        $youtubeId = $matches[1];
                        $thumb = "https://img.youtube.com/vi/$youtubeId/hqdefault.jpg";
                    }
                }

                if (!$thumb) {
                    $thumb = asset('images/default-task.jpg');
                }
            @endphp
				<div class="col-sm-6 col-md-4 xs-box3">
    <div class="box-services-f">

        <!-- Image -->
        <div class="portfolio-text portfolio-center mb20">
            <div class="view">
        <div class="image-wrapper">
    <img src="{{ $thumb }}" class="task-thumb" alt="">
</div>

            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <h3 class="title-uppercased br-bottom">
                {{ $task->taskname}}
                <a href="/register" class="link-read-more">sign up</a>
            </h3>

            <p>{{ Str::limit($task->task_description, 150) }}</p>

            <div class="task-badges">
    <span class="task-badge star">⭐ {{ $task->task_points }} pts</span>
    <span class="task-badge">{{ $task->badge_name ?? 'Badge' }}</span>
    <span class="task-badge">{{ $task->task_level ?? 'Level' }}</span>
</div>

        </div>

    </div>
</div>

				@endforeach

			@endif
			</div>
		</div>
	</section>

	<section class="section p0">
    <div class="row col-p0 max_height xs_max_height">

        <!-- POINTS SYSTEM -->
        <div class="col-sm-6 col-md-3">
            <div class="box-services-d box-services-e el_max_height">
                <div class="bg-overlay"></div>
                <div class="row col-p0">
                    <div class="col-sm-12">
                        <h3 class="title-uppercased title-shadow-a">earn points</h3>
                        <p class="mb0">
                            Complete tasks, take challenges, and stay active to earn points that boost your
                            ranking and unlock exciting rewards.
                        </p>
                        <i class="fa icon_tools"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- BADGES -->
        <div class="col-sm-6 col-md-3">
            <div class="box-services-d box-services-e dark el_max_height">
                <div class="bg-overlay"></div>
                <div class="row col-p0">
                    <div class="col-sm-12">
                        <h3 class="title-uppercased title-shadow-a">unlock badges</h3>
                        <p class="mb0">
                            Hit milestones and show off your achievements with beautifully designed 
                            badges that reflect your progress and skills.
                        </p>
                        <i class="fa icon_lightbulb_alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- LEVELS -->
        <div class="col-sm-6 col-md-3">
            <div class="box-services-d box-services-e green el_max_height">
                <div class="bg-overlay"></div>
                <div class="row col-p0">
                    <div class="col-sm-12">
                        <h3 class="title-uppercased title-shadow-a">climb levels</h3>
                        <p class="mb0">
                            The more you engage, the higher you go. Level up to unlock harder challenges 
                            and exclusive platform features.
                        </p>
                        <i class="fa icon_tag_alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- REWARDS -->
        <div class="col-sm-6 col-md-3">
            <div class="box-services-d box-services-e orange el_max_height">
                <div class="bg-overlay"></div>
                <div class="row col-p0">
                    <div class="col-sm-12">
                        <h3 class="title-uppercased title-shadow-a">get rewards</h3>
                        <p class="mb0">
                            Complete streaks, join weekly missions, and participate in community events 
                            to earn exciting digital and real-world rewards.
                        </p>
                        <i class="fa icon_shield"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


	<section class="section p0 mb50 max_height xs_max_height">
		<div class="row col-p0">
			<div class="col-sm-4 col-sm-push-8 xs-box3">
				<div class="box-services-d box-services-e dark el_max_height xs-pt0">
					<div class="row col-p0">

						<div class="col-sm-12">
							<h3 class="title-medium color-on-dark">What VibeNaija Members Say</h3>
							
							<div class="br-bottom mt0 mb20"></div>
							<h3 class="title-medium small title-shadow-a">Testimonials</h3>
							<p class="mb0 ">"The weekly challenges are creative and really connect me with my culture. It's awesome competing with friends for points!"</p>
							<i class="fa icon_quotations"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-8 col-sm-pull-4 xs-box">
				<div class="section-testimonials mt70 el_max_height">
					<div class="owl-carousel owl-portfolio">
						<div class="owl-el">
							<blockquote>
								<p>"VibeNaija is so much fun! I loved earning badges while learning about Nigerian proverbs. I feel closer to my roots now."</p>
								<footer>
									<h5>Aisha .O <span> Student UK </span></h5>
								</footer>
							</blockquote>
						</div>
						<div class="owl-el">
							<blockquote>
								<p>"The music and lifestyle tasks are my favorite! It’s exciting to see my culture celebrated in such a modern way."</p>
								<footer>
									<h5>Fatima .S <span> High Schooler Lagos </span></h5>
								</footer>
							</blockquote>
						</div>
						<div class="owl-el">
							<blockquote>
								<p>"VibeNaija helped me improve my Yoruba through fun language games. I even taught my little brother! Highly recommend."</p>
								<footer>
									<h5>David .O <span> Young Adult, Canada </span></h5>
								</footer>
							</blockquote>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</section>

	<!-- Footer wrapper -->
	@include('frontend.body.footer')
	
</div> <!-- END Global Wrapper -->




	<!-- Javascript files -->
	
     <script src="{{ asset('Frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>
	<div id="_include_main_plugins"></div>
	
	<script src="{{ asset('Frontend/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
	

<script src="{{ asset('Frontend/_demo/rs-slider.js') }}"></script>


	<div id="_include_main_plugins"></div>
	<div id="_include_owl_carousel"></div>
	<div id="_include_isotope"></div>
	
	<!-- Main javascript file -->
	<script src="{{ asset('Frontend/js/script.js') }}"></script>


	

</body>
</html>