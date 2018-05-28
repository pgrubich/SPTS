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

        @if (Auth::check())
        <div id="logBar">
            <span>
            <a href="/logout" >Wyloguj się</a>
             /
             <a href="/login">Zaloguj się</a>
            /
            <a href="/register">Zarejerstruj się</a>
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
                
            <div class="leftColumn">

                <div class="editProfile-menu">
                   <p><span id="editMenu-option1" class="editMenu-option"> 1. Informacje podstawowe</span></p>
                   <p><span id="editMenu-option2" class="editMenu-option"> 2. Informacje szczegółowe</span></p>
                   <p><span id="editMenu-option3" class="editMenu-option"> 3. Mój kalendarz</span></p>
                   <p><span id="editMenu-option4" class="editMenu-option"> 4. Galeria zdjęć</span></p>
                   <p><span id="editMenu-option5" class="editMenu-option"> 5. Zmiana adresu e-mail</span></p>
                   <p><span id="editMenu-option6" class="editMenu-option"> 6. Zmiana hasła</span></p>
                </div>
                
            </div> 
            <div class="middleColumn">
                <div class="categories">

                    <div id="basic-edit">
                        <fieldset>
                            <legend>Informacje podstawowe dla </legend>
                            
                            <form action='editPrimaryInfo' method = 'GET'>
                                
                                <p>
                                <label>
                                        Imię: 
                                        <input name='name' type='text' placeholder='{{ Auth::user()->name }}' pattern=".{3,}">
                                </label>
                                </p>

                                <p>
                                <label>
                                        Nazwisko: 
                                        <input name='surname' type='text' placeholder='{{ Auth::user()->surname }}' pattern=".{3,}">
                                </label>
                                </p>

                                <p>
                                <label>
                                        Data urodzenia:
                                        <input name='bdate' type="date" placeholder='{{ Auth::user()->bdate }}' >
                                <label>
                                </p>
                                
                                <p>
                                        Płeć
                                        <input type="radio" name="gender" value="f">
                                        <label for="female">kobieta</label>
                                        <input type="radio" name="gender" value="m">
                                        <label for="male">mężczyzna</label>
                                </p>

                                <p>
                                <label>
                                    Telefon: 
                                    <input name='phone' type='tel' placeholder='{{ Auth::user()->phone }}'>
                                </label>
                                </p>
                                
                                <p>
                                <label>
                                    Instagram: 
                                    <input name='instagram' type='text' placeholder='{{ Auth::user()->instagram }}' pattern=".{3,}">
                                </label>
                                </p>

                                <p>
                                <label>
                                    Facebook: 
                                    <input name='facebook' type='text' placeholder='{{ Auth::user()->facebook }}' pattern=".{3,}">
                                </label>
                                </p>

                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>

                                <input type="submit" value="Zapisz">

                            </form>

                        </fieldset>
                    </div>
                    <div id="specific-edit">
                    
                    <form id="editSpecificInfo" action='editSpecificInfo' method = 'GET'></form>
                    <form id="addCourse" action='addCourse' method = 'GET'></form>
                    <form id="addUni" action='addUni' method = 'GET'></form>
                    <form id="addTrainerOffer" action='addTrainerOffer' method = 'GET'></form>

                        <fieldset>
                            <legend>Informacje szczegółowe</legend>
                                <p>
                                        <label>
                                        Opis trenera:
                                        <br />
                                        <textarea form="editSpecificInfo" name="description" placeholder='{{ Auth::user()->description }}' cols="70" rows="10" maxlength="500" minlength="5"></textarea>
                                        </label>
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
                                
                                <br />

                                <label>
                                Certyfikaty:
                                <br> </br>
                                    <span id="show-course" >+ Dodaj certyfikat</span>: </br></br>
    
                                    <div id="edit-course">
                                        <p>
                                            Nazwa placówki:
                                            <input form="addCourse" name='place' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Nazwa kursu:
                                            <input form="addCourse" name='name' type="text" pattern=".{3,}">
                                        </p>
                                        <p>
                                            Data rozpoczęcia:
                                            <input form="addCourse" name='begin_date' type="date">
                                        </p>
                                        <p>
                                            Data zakończenia:
                                            <input form="addCourse" name='end_date' type="date">
                                        </p>
                                        <input type='hidden' form="addCourse" name='id' value='{{ Auth::user()->id }}'/>
                                        <input type="submit" value="Dodaj certyfikat" form="addCourse">
                                    </div>
                                </label>

                                <br />

                                <label>
                                Uczelnie wyższe:
                                <br> </br>
                                    <span id="show-uni">+ Dodaj uczelnię wyższą</span>:</br></br>
                                    <div id="edit-uni">
                                        <p>
                                            Nazwa uczelni:
                                            <input form="addUni" name='name' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Kierunek:
                                            <input form="addUni" name='course' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Tytuł:
                                            <input form="addUni" name='degree' type="text" pattern=".{3,}">
                                        </p>
                                        <p>
                                            Data rozpoczęcia:
                                            <input form="addUni" name='begin_date' type="date">
                                        </p>
                                        <p>
                                            Data zakończenia:
                                            <input form="addUni" name='end_date' type="date">
                                        </p>
                                        <input type='hidden' form="addUni" name='id' value='{{ Auth::user()->id }}'/>
                                        <input type="submit" value="Dodaj uczelnię wyższą" form="addUni" >

                                    </div>
                                </label>

                                <br />

                                <label>
                                Cennik:
                                <br> </br>
                                    <span id="show-price">+ Dodaj cennik</span>:</br></br>
                                    <div id="edit-price">
                                        <p>
                                            Nazwa zajęć:
                                            <input form="addTrainerOffer" name='classes_name' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Cena:
                                            <input form="addTrainerOffer" name='price' type="number">
                                        </p>
                                        <p>
                                            Liczba uczestników:
                                            <input form="addTrainerOffer" name='numbers_of_members' type="number" required>
                                        </p>
                                        <input form="addTrainerOffer" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input type="submit" value="Dodaj ofertę do cennika" form="addTrainerOffer">
                                    </div>
                                </label>

                                <input form="editSpecificInfo" type='hidden' name='id' value='{{ Auth::user()->id }}'/>

                                <br />
                                <br />
                                <input type="submit" value="Zapisz" form="editSpecificInfo">
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
                            

                        <form action='updateProfilePhoto' method = 'GET'>
                        <label>Dodaj zdjęcie profilowe</label>
                            <input type='file' name='file' id='file'>
                            <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                            <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                            <input type='submit' value='Dodaj zdjęcie' name='submit'>
                        </form>


                        </fieldset>
                    </div>

                    <div id="email-edit">

                    <form action='editEmailInfo' method = 'GET'>
                         <fieldset>
                            <legend>Zmiana email</legend>

                                <p>
                                <label>
                                        Aktualny adres email: 
                                        <input name='current_email' type='email' pattern="{{ Auth::user()->email }}" required>
                                </label>
                                </p>

                                <p>
                                <label>
                                        Nowy adres email: 
                                        <input name='new_email' type='email' required>
                                </label>
                                </p>

                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>

                                <input type="submit" value="Zmień">
                                </br>
                        </fieldset>

                    </form>
                    </div>
                    <div id="password-edit">

                    <form action='editPasswordInfo' method = 'GET'>
                         <fieldset>
                            <legend>Zmiana hasła</legend>

                                <p>
                                <label>
                                        Stare hasło: 
                                        <input name='current_password' type='password' pattern="{{ Auth::user()->email }}" required>
                                </label>
                                </p>

                                <p>
                                <label>
                                        Nowe hasło: 
                                        <input name='new_password' type='password' required>
                                </label>
                                </p>

                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>

                                <input type="submit" value="Zmień">
                                </br>
                        </fieldset>

                    </form>
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