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
    <link rel="stylesheet" href="{{asset('css/profilesResults.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/css/fontello.css')}}" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/profile/jquery.scrollTo.min.js')}}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        </nav>
    </header>


    <main>
        <nav>
            <div class="container-fluid" id="filter-container">
                <div class="main-filter">
                    <span class="filter-text">
                        Wynik wyszukiwania dla:
                    </span>
                    <div id="discipline-value">
                    </div>
                    <span class="filter-text">
                    w miejscowości: 
                    </span>
                    <div class="city-value">
                        <input type="text" id="city-search-results" class="rounded">
                    </div>
                    <div class="result-value">
                    (5 wyników)
                    </div>
                </div>

                <div class="place-filter">
                    <select id="training-place" class="custom-select rounded">
                        <option>Miejsce</option>
                        <option>U trenera</option>
                        <option>U klienta</option>
                        <option>W terenie</option>
                    </select>
                </div>
                <div class="age-filter">
                    <p>
                    <input type="text" id="age" readonly style="border:0; color:#4bc0e3; font-weight:bold; text-align:center;">
                    </p>
                    <div id="age-slider-range"></div>
                </div>
                <div class="sex-filter">
                    <select id="trainer-sex" class="custom-select rounded">
                        <option>Płeć</option>
                        <option>Mężczyzna</option>
                        <option>Kobieta</option>
                    </select>
                </div>
                <div class="prize-filter">
                    <p>
                    <input type="text" id="amount" readonly style="border:0; color:#4bc0e3; font-weight:bold; text-align:center;">
                    </p>
                    <div id="slider-range"></div>
                </div>
                <div class="button-filter">
                    <span id="clearAll">Wyczyść</span>
                    <button type="button" class="btn blue-button">Filtruj wyniki</button>
                </div>
            </div>
        </nav>
        <article>
            <div id="profiles-content">
                <div id="trainers-container" class="container-fluid">
                    
                </div>
            
            </div>
           
        </article>
    </main>
    
    <script type="text/javascript" src="{{asset('js/profile/profilesResult.js')}}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASwYHL3afDu086oPLiCJ_S-3lfh2GGTMA&libraries=places&callback=inputSearchCities&region=PL"></script>
</body>
</html>