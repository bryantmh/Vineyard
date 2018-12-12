<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vineyard</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/layout.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
		

    </head>
    <body>
	 	<div class="containing-element">
	 		<header>
				<nav class="bg-dark fixed-top navbar">
					<div class="container-fluid">
						<div class="navbar-header">
							<h1><i class="fab fa-pagelines"></i><a class="navbar-brand" href="/">Vineyard</a></h1>
						</div>

						<button class="btn btn-danger navbar-btn" id="feedbackBtn" href="" onclick="javascript:toggleFeedbackWindow(); return false;"style="font-size: 1.5em;">Post</button>
					</div>
				</nav>
				<span id="feedbackContainer" style="position: fixed;"></span>
			</header>
	 		
      		@yield('content')
      		
    	</div>
    </body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

</html>