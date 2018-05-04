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
    <link rel="stylesheet" href="{{asset('css/editProfile.css')}}" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/profile/jquery.scrollTo.min.js')}}"></script>
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	
</head>

<body>

    <header>

        <div id="logBar">
            <button>Zaloguj się</button>
            <button> Zarejerstruj się</button>
        </div>

        <h1 class="logo">Znajdź swojego trenera</h1>

        <nav>
            <ul class="menu">
              <li><a href="#">Navigacja1</a></li>
              <li><a href="#">Navigacja2</a></li>
              <li><a href="#">Navigacja3</a></li>
              <li><a href="#">Navigacja4</a></li>
              <li><a href="#">Navigacja5</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <article>
            <div id="content">
                
            <div class="leftColumn">

                <div class="editProfile-menu">
                   <p><span id="editMenu-option1" class="editMenu-option"> 1. Informacje podstawowe</span></p>
                   <p><span id="editMenu-option2" class="editMenu-option"> 2. Informacje szczegółowe</span></p>
                   <p><span id="editMenu-option3" class="editMenu-option"> 3. Mój kalendarz</span></p>
                   <p><span id="editMenu-option4" class="editMenu-option"> 4. Galeria zdjęć</span></p>
                   <p><span id="editMenu-option5" class="editMenu-option"> 5. Zmiana hasła lub e-mail</span></p>
                </div>
                
            </div> 
            <div class="middleColumn">
                <div class="categories">

                    <div id="basic-edit">
                        <fieldset>
                            <legend>Informacje podstawowe</legend>
                            <form>
                                <p>
                                        Imię: <input type="text" />
                                </p>
                                <p>
                                        Nazwisko: <input type="text" />
                                </p>
                                <p>
                                        Data urodzenia: <input type="date" />
                                </p>
                                
                                <p>
                                        Płeć
                                        <input type="radio" name="gender" value="f">
                                        <label for="female">kobieta</label>
                                        <input type="radio" name="gender" value="m">
                                        <label for="male">mężczyzna</label>
                                </p>
                                <p>
                                        Adres e-mail: <input type="text" />
                                </p>
                                <p>
                                        Telefon komórkowy: <input type="text" />
                                </p>
                                <p>
                                        Telefon: <input type="text" />
                                </p>

                                <input type="submit" value="Zapisz">
                            </form>
                        </fieldset>
                    </div>
                    <div id="specific-edit">
                        <fieldset>
                            <legend>Informacje szczegółowe</legend>
                            <form>
                                <p>
                                        Opis trenera:</br> <textarea name="message" rows="10" cols="30"></textarea>
                                </p>
                                <p>

                                       Dyscypliny:
                                        <br />
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina

                                        <br />
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina

                                        <br />
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina

                                        <br />
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina

                                        <br />
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina

                                        <br />
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina
                                        <input type="checkbox" /> dyscyplina

                                        <br />
                                </p>
                                <p>Cennik: <input type="text" /> </p>
                                <p>
                                Certyfikaty: </br> <textarea name="message" rows="10" cols="30"></textarea>
                                </p>        
                                <input type="submit" value="Zapisz">
                            </form>
                        </fieldset>
                    </div>

                    <div id="calendar-edit">
                        <fieldset>
                            <legend>Mój kalendarz</legend>
                            <form>
                                in progress
                                <input type="submit" value="Zapisz">
                            </form>
                        </fieldset>
                        
                    </div>
                    <div id="gallery-edit">
                        <fieldset>
                            <legend>Moja galeria</legend>
                            <form>
                            <p> Zdjęcie profilowe: <input type="file" /> </p>
                            <p> Galeria zdjęć: <input type="file" /> </p>
                                <input type="submit" value="Zapisz">
                            </form>
                        </fieldset>
                    </div>
                    <div id="password-edit">
                        <fieldset>
                            <legend>Zmiana hasła lub e-mail</legend>
                                <button> Resetuj hasło </button> </br>
                                <button> Resetuj e-mail </button>
                        </fieldset>
                    </div>
                </div>
                  
            </div>

                <div id="ads">
                    <aside>
                    </aside>
                </div>
                <div style="clear:both;"></div>
            
            </div>
           
        </article>
    </main>
    
    <script type="text/javascript" src="{{asset('js/profile/editProfile.js')}}"></script>
</body>
</html>