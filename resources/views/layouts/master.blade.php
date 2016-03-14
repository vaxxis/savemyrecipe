<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SaveMyRecipe</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/flat/purple.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
	<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

	<style>
		html {
		    position: relative;
		    min-height: 100%;
		}
		body {
			padding-top: 80px;
			font-size: 16px;
			font-family: 'Lato';
			margin-bottom: 100px; /* for stiky footer */
		}
		.page-content {
			padding-top: 30px;
			padding-bottom: 30px;
		}

		.form-control {
			font-size: 16px;
			height: 40px;
		}
		.checkbox .icheckbox_flat-purple {
			margin-right: 10px;
			margin-left: -20px;
			margin-top: -4px;
		}

		/* summernote wysiwyg editor */
		.note-editor.note-frame {
		    border: 1px solid #CCCCCC;
		}
		.note-popover .popover-content, .panel-heading.note-toolbar {
		    padding: 0 0px 10px 10px;
		    margin: 0;
		}
		.note-popover .popover-content>.btn-group, .panel-heading.note-toolbar>.btn-group {
		    margin-top: 10px;
		    margin-right: 10px;
		    margin-left: 0;
		}

		.page-title > .icon,
		.modal-title > .icon {
			color: #ddd;
		}

		.footer {
			position: absolute;
		    bottom: 0;
		    width: 100%;
			padding: 40px 0;
		    height: 100px;
		    background-color: #f5f5f5;
		}
		.footer a {
			color: black;
		}

		.modal-header {
			padding: 25px;
		}
		.modal-header .close {
			padding: 2px;
			font-size: 200%;
		}
		.modal-body {
			padding: 30px!important;
		}

		.ingredient {
			margin: 0;
			padding: 10px;
			font-size: 18px;
		}

		.navbar-nav > li .icon {
		    opacity: 0.7;
		}

		.lead {
			font-weight: 400;
		}

		.margin0 {
			margin: 0;
		}

		.jumbotron p {
			font-weight: 300;
		}
		
		/* utility */
		.thin { font-weight: 100; }
		.light { font-weight: 300; }
		.normal { font-weight: 400; }
		.semibold { font-weight: 600; }
		.bold { font-weight: 700; }
		.ultrabold { font-weight: 900; }

		/* animate on load */
		.page-content {
			animation: 0.35s fade-up-enter;
		}

		@keyframes fade-up-enter {
		  0% {
		    opacity: 0;
		    transform: translateY(20px)
		  }
		  100% {
		    opacity: 1;
		    transform: translateY(0)
		  }
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
			.jumbotron {
			    padding-top: 80px;
			    padding-bottom: 80px;
			    margin-top: -30px;
			}
			.container {
				max-width: 960px!important;
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
	            <a class="navbar-brand" href="{{ url('/') }}">
								<span class="icon ion-pizza"></span>
								SaveMy<b>Recipe</b>
							</a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">

				@if (Auth::user())
		            <!-- left side of navbar -->
		            <ul class="nav navbar-nav">
		                <li><a href="{{ url('/recipes') }}"><span class="icon ion-clipboard"></span> CookBook</a></li>
		                <li><a href="{{ url('/ingredients') }}"><span class="icon ion-ios-nutrition"></span> Ingredients</a></li>
		            </ul>

				@endif

	            <!-- right side of navbat -->
				<ul class="nav navbar-nav navbar-right">
					@if ( ! Auth::user() )
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
					@else
						<li class="navbar-text"><span class="icon ion-person"></span> {{ Auth::user()->name }}</li>
						<li><a href="{{ url('/logout') }}">Logout <i class="icon ion-log-out"></i></a></li>
					@endif
				</ul>
			</div>

	    </div><!-- /.container-fluid -->
	</nav>


	@yield('content.before')

	<div class="page-content container">

		{{-- print FLASH MESSAGES --}}
		@if (Session::get('flash_message'))
			<div class="alert alert-success">
				{{ Session::get('flash_message') }}
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

		// enable bootstrap tooltips
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	});
	</script>
</body>
</html>
