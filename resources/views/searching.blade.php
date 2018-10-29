<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	
    <link rel="stylesheet" href="{{asset('css/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/css/fontello.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/searching.css')}}" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/profile/jquery.scrollTo.min.js')}}"></script>
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	
</head>

<body>

    <header>
        <nav>

            @if (Auth::check())
            <div class="container-fluid" id="logBar">
                <span>
                <a href="/logout" >Wyloguj się</a>
                    /
                <a href="/editProfile" >Edytuj profil</a>
                </span>
            </div>
            @else
            <div class="container-fluid" id="logBar">
                <div class="logo">
                </div>
                <span>
                <a href="/login" >Zaloguj się</a>
                <button type="button" class="btn blue-button">Zarejerstruj się</button>
                </span>
            </div>
            @endif
            <!-- <select> 
                <option value="" selected="selected">Wybierz</option> 
                <option value="/login">Zaloguj się</option> 
                <option value="/register">Zarejerstruj się</option> 
            </select>  -->
        </nav>
    </header>

    <main>
        <article>
            <div id="content" class="container-fluid">
                <div class="search-title">
                    <h1>Wyszukiwarka trenerów sportu.</h1>
                    <h6>Znajdź w łatwy i szybki sposób trenera wybranej dyscypliny w Twojej okolicy.</h6>
                </div>
                <div id="search-section">
                    <select id="disciplines-select" class="custom-select rounded">
                    </select>
                    <input type="text" id="city-search" class="rounded">
                        <!-- <ul class="search-list">
                            <li id="dyscypline-box">Dyscyplina <i id="show-dyscyplines" class="icon-down"></i></li>
                            <li class="input-px-diff"><input id="city-input" class="input-search" type="text" value="Miasto"></li>      
                        </ul> -->
                        <button id="search-button" class="rounded">Wyszukaj</button>
                </div>
            
            </div>
            @if (session('success'))
                <div class="alert alert-info" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <p style="color:White">  {{ session('success') }} </p>
                </div>
            @endif

        </article>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>   
    <script src="{{asset('js/profile/js/bootstrap.min.js')}}"></script>
   
    <script type="text/javascript" src="{{asset('js/profile/search.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASwYHL3afDu086oPLiCJ_S-3lfh2GGTMA&libraries=places&callback=inputSearchCities&region=PL"></script>
    
</body>
</html>