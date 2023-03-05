<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

    @vite('resources/sass/app.scss')

    <!-- Custom styles for this Page-->
    @yield('custom_styles')

</head>
<body dir="rtl" class="theme-light">
    <div class="page">
        <div class="sticky-top">
			<header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
				<div class="container-xl">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
						<span class="navbar-toggler-icon"></span>
					</button>
					<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
						<a href=".">
							<img src="{{ url('img/logo.jpg') }}" width="128" height="128" alt="كلية التربية" >
						{{-- <img src="{{ url('img/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image"> --}}
						</a>
					</h1>
					<div class="navbar-nav flex-row order-md-last">

						@auth
						<div class="d-none d-md-flex">
							<a href="?theme=dark" class="nav-link px-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
							  <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
							  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path></svg>
							</a>
							<a href="?theme=light" class="nav-link px-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
							  <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
							  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path></svg>
							</a>
							<div class="nav-item dropdown d-none d-md-flex me-3">
							  <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications" aria-expanded="false">
								<!-- Download SVG icon from http://tabler-icons.io/i/bell -->
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path><path d="M9 17v1a3 3 0 0 0 6 0v-1"></path></svg>
								<span class="badge bg-red"></span>
							  </a>							  
							</div>
						  </div>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
								<x-layout.picture url="{{auth()->user()->getAvatar(200)}}" />
								<div class="d-none d-xl-block ps-2">
									{{ auth()->user()->name ?? null }}
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
								<a href="{{ route('admin.profile.show') }}" class="dropdown-item">{{ __('الملف الشخصي') }}</a>
								<div class="dropdown-divider"></div>
								<form method="POST" action="{{ route('admin.logout') }}">
									@csrf
									<a href="{{ route('admin.logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
										{{ __('تسجيل الخروج') }}
									</a>
								</form>
							</div>
						</div>
						@endauth

					</div>
				</div>
			</header>

         	 @include('layouts.navigation')

			</div>
			<div class="page-wrapper">

				@yield('content')

				<x-layout.footer/>
        	</div>
      	</div>
    </div>

    <!-- Core plugin JavaScript-->
	<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    {{-- @vite('resources/js/app.js') --}}

    <!-- Page level custom scripts -->
    @yield('custom_scripts')

</body>
</html>
