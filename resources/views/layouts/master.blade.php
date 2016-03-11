<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SaveMyRecipe</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/flat/purple.css" rel="stylesheet">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
	<style>
		body {
			padding-top: 100px;
			font-size: 16px;
		}
		.form-control {
			font-size: 16px;
			height: 40px;
		}
		.checkbox .icheckbox_flat-purple {
			margin-right: 10px;
			margin-left: -10px;
			margin-top: -4px;
		}

		@media (min-width: 768px) {
			.navbar-nav>li>a,
			.navbar-brand,
			.navbar-text {
				margin-top: 0;
				margin-bottom: 0;
			    padding-top: 25px;
			    padding-bottom: 25px;
			}
		}
	</style>
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
	<script src="//cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.min.js"></script>

	<script>
	// TODO: Move this to a self main.js file
	$(document).ready(function(){
		$('input').iCheck({
			checkboxClass: 'icheckbox_flat-purple',
			radioClass: 'iradio_flat-purple'
		});

		// enable wysiwyg editor
		$('.wysiwyg').summernote({
			placeholder: 'Write here...',
			dialogsFade: true,
			height: 250,
			disableDragAndDrop: true,
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'strikethrough']],
				['para', ['ul', 'ol', 'paragraph']],
				['misc', ['clear']],
				['misc1', ['link']],
				['misc2', ['undo', 'redo']],
				['misc3', ['fullscreen', 'codeview']],
				['misc4', ['help']]
			]
		});
	});
	</script>
</body>
</html>