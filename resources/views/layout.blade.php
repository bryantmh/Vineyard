<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vineyard</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/layout.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    </head>
    <body>
	 	<div class="containing-element">
	 		<header>
				<nav class="bg-dark static-top">
					<div>
						<h1><i class="fab fa-pagelines"></i><a class="navbar-brand" href="#">Vineyard</a></h1>
					</div>
					{{-- <div class="navbar navbar-expand-md navbar-dark">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTabs" aria-controls="navTabs" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navTabs">
							<div class="navbar-nav">
								
							</div>
						</div>
					</div> --}}
				</nav>
			</header>
	 		<div class="page-content" id="main-content" role="main">
      			@yield('content')
      		</div>
    	</div>
    </body>
</html>