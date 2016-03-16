<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SaveMyRecipe</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/flat/purple.css" rel="stylesheet">

	@if (env('APP_ENV') != 'local')
		<link href="{{ elixir('css/libs.css') }}" rel="stylesheet">
		<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
	@else
		<link href="{{ asset('css/libs.css') }}" rel="stylesheet">
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	@endif


	@include('partials.favicons')

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="container">

	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="{{ url('/') }}">
					<img class="inline img-circle" width="24" alt="SaveMyRecipe" src="{{ asset('images/logo.png') }}">
					SaveMy<b>Recipe</b>
				</a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">

				<ul class="nav navbar-nav">
					<li><a href="{{ url('/all') }}"><span class="icon ion-clipboard"></span> Recipes</a></li>
				</ul>
				@if (Auth::user())
		            <!-- left side of navbar -->

				@endif

	            <!-- right side of navbat -->
				<ul class="nav navbar-nav navbar-right">

					@if (Auth::user())

						<li><a href="{{ url('/recipes') }}"><span class="icon ion-clipboard"></span> CookBook</a></li>
						<li><a href="{{ url('/ingredients') }}"><span class="icon ion-ios-nutrition"></span> Ingredients</a></li>

						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-person"></i> {{ Auth::user()->name }} &nbsp;<span class="caret"></span></a>
						    <ul class="dropdown-menu">
						        <li><a href="{{ url('users/'.Auth::id().'/edit') }}"><i class="icon ion-plus"></i> &nbsp;&nbsp;&nbsp;Create Recipe</a></li>
						        <li><a href="{{ url('users/'.Auth::id().'/edit') }}"><i class="icon ion-compose"></i> &nbsp;&nbsp;&nbsp;Edit Your Profile</a></li>
								<li role="separator" class="divider"></li>
						        <li><a href="{{ url('/logout') }}"><i class="icon ion-log-out"></i> &nbsp;&nbsp;&nbsp;Logout</a></li>
						    </ul>
						</li>

					@endif

				</ul>

				@if ( ! Auth::user() )
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<li><a href="{{ url('/login') }}"><i class="icon ion-log-out"></i> Login</a></li>
						</ul>
						<a class="btn navbar-btn btn-primary" href="{{ url('/register') }}">Signup</a>
					</div>
				@endif
			</div>

	    </div><!-- /.container-fluid -->
	</nav>


	@yield('content.before')

	<div class="page-content container">

		{{-- print FLASH MESSAGES --}}
		@if ($message = Session::get('flash_message'))
			<div class="alert alert-success">
				{{ $message }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		@endif

		@if ($message = Session::get('flash_error'))
			<div class="alert alert-danger">
				{{ $message }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		@endif

		@if ($message = Session::get('flash_warning'))
			<div class="alert alert-warning">
				{{ $message }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
		@endif

		@yield('content')
	</div>

	@yield('content.after')


	<footer class="footer">
		<div class="container text-muted">
			&copy; {{ date('Y') }}. Created by <a href="http://vassi.it">Vasile Botoroga</a>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>


	@if (env('APP_ENV') != 'local')
		<script src="{{ elixir('js/libs.js') }}"></script>
		<script src="{{ elixir('js/app.js') }}"></script>
	@else
		<script src="{{ asset('js/libs.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
	@endif


</body>
</html>
