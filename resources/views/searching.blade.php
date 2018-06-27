<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	
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

        @if (Auth::check())
        <div id="logBar">
            <span>
            <a href="/logout" >Wyloguj się</a>
                /
            <a href="/editProfile" >Edytuj profil</a>
            </span>
        </div>
         @else
            <div id="logBar">
            <span>
            <a href="/login">Zaloguj się</a>
            /
            <a href="/register">Zarejerstruj się</a>
            </span>
            </div>
        @endif

        <nav>
            <ul class="menu">
              <li><a href="/dyscyplina/trenerzy_personalni">Trenerzy personalni</a></li>/
              <li><a href="#">Trenerzy sportu</a></li>/
              <li><a href="/dyscyplina/dietetycy">Dietetycy</a></li>

            </ul>
        </nav>
    </header>

    <main>
        <article>
            <div id="content">


                <div id="dyscpiline-list" class="overlay">
                    <div class="overlay-content">
                        <a href="#" id="hide-dyscyplines" class="closebtn">&times;</a>
                        <div class="column">
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        </div>
                        <div class="column">
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        </div>
                        <div class="column">
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        </div>
                        <div class="column">
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        <a class="dyscypline-record" href="#"></a>
                        </div>
                        <div style="clear:both;"></div>


                       
                        
                    </div>
                </div>



                
                <div id="search-section">
                    <div id="search-options">
                            <ul class="search-list">
                                <li id="dyscypline-box">Dyscyplina <i id="show-dyscyplines" class="icon-down"></i></li>
                                <li class="input-px-diff"><input id="city-input" class="input-search" type="text" value="Miasto"></li>        
                            </ul>
                        <button id="search-button">Wyszukaj</button>
                    </div>
                </div>

                <div id="ads">
                    <aside>
                    </aside>
                </div>
                <div style="clear:both;"></div>
            
            </div>
            @if (session('success'))
                <div class="alert alert-info" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <p style="color:White">  {{ session('success') }} </p>
                </div>
            @endif

        </article>
    </main>
    
    <script type="text/javascript" src="{{asset('js/profile/search.js')}}"></script>
    
</body>
</html>