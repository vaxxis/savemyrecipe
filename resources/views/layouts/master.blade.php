<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel CRUD App</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/flatly/bootstrap.min.css" rel="stylesheet"> -->
	<style>
		body {
			padding-top: 100px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="{{ url('/') }}">SaveMyRecipe</a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">

				@if (Auth::user())
		            <!-- left side of navbar -->
		            <ul class="nav navbar-nav">
		                <li><a href="{{ url('/recipes') }}">Recipes</a></li>
		                <li><a href="{{ url('/ingredients') }}">Ingredients</a></li>
		                <li><a href="{{ url('/ingredienttypes') }}">IngredientTypes</a></li>
		            </ul>
				@endif

	            <!-- right side of navbat -->
				<ul class="nav navbar-nav navbar-right">
					@if ( ! Auth::user() )
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					@else
						<li class="navbar-text"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</li>
						<li><a href="{{ url('/logout') }}">Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
					@endif
				</ul>
			</div>

	    </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@yield('content')
	</div>

	<hr/>

	<div class="container">
	    &copy; {{ date('Y') }}. Created by <a href="http://vassi.it">Vasile Botoroga</a>
	    <br/>
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>