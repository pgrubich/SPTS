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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
            <div class="logo">
                </div>
                <span>
                
                <a href="/profiles/{{ Auth::user()->id }}" ><i class="fas fa-user" style='color:#5f5d5d; margin-right:5px;'></i> Profil</a>
                <a href="/editProfile" ><i class="far fa-edit" style='color:#5f5d5d; margin-right:5px;'></i>Edytuj profil</a>
                <button onclick="location.href='/logout'" type="button" class="btn blue-button">Wyloguj się</button>
                </span>
            </div>
            @else
            <div class="container-fluid" id="logBar">
                <div class="logo">
                </div>
                <span>
                <a href="/login" >Zaloguj się</a>
                <button onclick="location.href='/register'" type="button" class="btn blue-button">Zarejerstruj się</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
   
    <script type="text/javascript" src="{{asset('js/profile/search.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASwYHL3afDu086oPLiCJ_S-3lfh2GGTMA&libraries=places&callback=inputSearchCities&region=PL"></script>
    
</body>
</html>