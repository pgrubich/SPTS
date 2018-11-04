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
        </nav>
    </header>


    <main>
        <nav>
            <div class="container-fluid" id="filter-container">
                <div class="main-filter">
                    <span class="filter-text">
                        Wynik wyszukiwania dla:
                    </span>
                    <div class="discipline-value">
                    Trener Personalny
                    </div>
                    <span class="filter-text">
                    w miejscowości: 
                    </span>
                    <div class="city-value">
                    Poznań (Wielkopolskie)
                    </div>
                    <div class="result-value">
                    (5 wyników)
                    </div>
                </div>

                <div class="place-filter">
                    <select class="custom-select rounded">
                        <option>Miejsce</option>
                    </select>
                </div>
                <div class="age-filter">
                    <select class="custom-select rounded">
                        <option>Wiek</option>
                    </select>
                </div>
                <div class="sex-filter">
                    <select  class="custom-select rounded">
                        <option>Płeć</option>
                    </select>
                </div>
                <div class="prize-filter">
                    <select  class="custom-select rounded">
                        <option>Cena</option>
                    </select>
                </div>
                <div class="button-filter">
                    <a href="#">Wyczyść</a>
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
</body>
</html>