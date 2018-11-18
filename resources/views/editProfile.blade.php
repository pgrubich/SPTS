<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
    
    <link rel="stylesheet" href="{{asset('css/css/buttons/bootstrap.min.css')}}" type="text/css" />
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/css/fontello.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/editProfile.css')}}" type="text/css" />
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
            <div class="container-fluid" id="logBar">
            <div class="logo">
                </div>
                <span>
                
                <a href="/profiles/{{ Auth::user()->id }}" ><i class="fas fa-user" style='color:#5f5d5d; margin-right:5px;'></i> Profil</a>
                <a href="/editProfile" ><i class="far fa-edit" style='color:#5f5d5d; margin-right:5px;'></i>Edytuj profil</a>
                <button onclick="location.href='/logout'" type="button" class="btn blue-button">Wyloguj się</button>
                </span>
            </div>
        </nav>
    </header>

    <main>
        <article>
            <div class="container-fluid edit-profile-content">
                
            <div class="leftColumn">

                <div class="editProfile-menu">
                   <p><span id="editMenu-option1" class="editMenu-option editMenu-option-checked">Dane podstawowe</span></p>
                   <p><span id="editMenu-option2" class="editMenu-option">Dane szczegółowe</span></p>
                   <p><span id="editMenu-option3" class="editMenu-option">Kalendarz</span></p>
                   <p><span id="editMenu-option4" class="editMenu-option">Galeria zdjęć</span></p>
                   <p><span  class="editMenu-option">Lokalizacja</span></p>
                   <p><span id="editMenu-option5" class="editMenu-option">Zmiana adresu e-mail</span></p>
                   <p><span id="editMenu-option6" class="editMenu-option">Zmiana hasła</span></p>
                </div>
                
            </div> 
            <div class="middleColumn">
                <div class="categories">
                    <div id="basic-edit">
                        <fieldset>
                            <legend>Dane podstawowe </legend>
                            
                            <form id="editPrimaryInfo" action='editPrimaryInfo' method = 'POST'></form>
                            <form id="addCity" action='addCity' method = 'POST'></form>
                                
                                <p>
                                <label style="margin-left: 45px;">
                                        Imię: 
                                        <input class="edit-name" form="editPrimaryInfo" name='name' type='text' placeholder='{{ Auth::user()->name }}' pattern=".{3,}">
                                </label>
                                </p>

                                <p>
                                <label style="margin-left: 45px;">
                                        Nazwisko: 
                                        <input class="edit-lastname" form="editPrimaryInfo" name='surname' type='text' placeholder='{{ Auth::user()->surname }}' pattern=".{3,}">
                                </label>
                                </p>

                                <p>
                                <label style="margin-left: 45px;">
                                        Data urodzenia:
                                        <input  class="edit-date" form="editPrimaryInfo" name='bdate' type="date" placeholder='{{ Auth::user()->bdate }}' >
                                <label style="margin-left: 45px;">
                                </p>
                                
                                <p style="margin-left: 45px;">
                                        Płeć
                                        <input form="editPrimaryInfo" type="radio" name="gender" value="f">
                                        <label for="female">kobieta</label>
                                        <input form="editPrimaryInfo" type="radio" name="gender" value="m">
                                        <label for="male">mężczyzna</label>
                                </p>

                                <p>
                                <label style="margin-left: 45px;">
                                    Telefon: 
                                    <input  class="edit-phone" form="editPrimaryInfo" name='phone' type='tel' placeholder='{{ Auth::user()->phone }}'>
                                </label>
                                </p>
                                
                                <p>
                                <label style="margin-left: 45px;">
                                    Instagram: 
                                    <input  class="edit-insta" form="editPrimaryInfo" name='instagram' type='text' placeholder='{{ Auth::user()->instagram }}' pattern=".{3,}">
                                </label>
                                </p>

                                <p>
                                <label style="margin-left: 45px;">
                                    Facebook: 
                                    <input class="edit-face"  form="editPrimaryInfo" name='facebook' type='text' placeholder='{{ Auth::user()->facebook }}' pattern=".{3,}">
                                </label>
                                </p>

                                <label style="margin-left: 45px;">
                                    <span id="show-cities">+ Dodaj miasto</span>:</br></br>
                                    <div id="edit-cities">
                                        <p>
                                            Miasto:
                                            {{ Auth::user()->id }}
                                            <input form="addCity" name='city' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Województwo:
                                            <input form="addCity" name='voivodeship' type="text" pattern=".{3,}" required>
                                        </p>
                                        <input form="addCity" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="addCity" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <input type="submit" value="Dodaj miasto" form="addCity">
                                    </div>
                                </label>



                                <input form="editPrimaryInfo" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                <input form="editPrimaryInfo" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input class="save-button" type="submit" value="Zapisz" form="editPrimaryInfo">

                            </form>

                        </fieldset>
                    </div>
                    <div id="specific-edit">
                    
                    <form id="editSpecificInfo" action='editSpecificInfo' method = 'POST'></form>
                    <form id="addCourse" action='addCourse' method = 'POST'></form>
                    <form id="addUni" action='addUni' method = 'POST'></form>
                    <form id="addTrainerOffer" action='addTrainerOffer' method = 'POST'></form>

                        <fieldset>
                            <legend>Dane szczegółowe</legend>
                                <p>
                                        <label >
                                        Opis trenera:
                                        <br />
                                        <textarea form="editSpecificInfo" class="edit-text" form="editSpecificInfo" name="description" placeholder='{{ Auth::user()->description }}' cols="90" rows="10" maxlength="500" minlength="5"></textarea>
                                        <input form="editSpecificInfo" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="editSpecificInfo" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <input class="add-button" type="submit" value="Aktualizuj opis" form="editSpecificInfo" >
                                        </label>
                                </p>
                                <p style="margin-top:45px;">
                                        Dyscypliny:
                                        <div id="dyscypline-list-editprofile" >
                                            <form id='updateDisciplines' action='updateDisciplines' method='POST'>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div style="clear:both;"></div>
                                            <input type='hidden' name='trainer_id' value='{{ Auth::user()->id }}'/>
                                            <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                            <input class="add-button" type="submit" value="Zmień dyscypliny" >
                                            </form>
                                        </div>
                                </p>
                                
                                <br />

                                <label>
                                Certyfikaty:
                                <br> </br>
                                    <span id="show-course" >+ Dodaj certyfikat </span> </br>
    
                                    <div id="edit-course">
                                        <p>
                                            Nazwa placówki:
                                            <input placeholder="Podaj nazwę placówki" class="edit-place" form="addCourse" name='place' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Nazwa kursu:
                                            <input placeholder="Podaj nazwę kursu" class="edit-course" form="addCourse" name='name' type="text" pattern=".{3,}">
                                        </p>
                                        <p style="display:inline-block">
                                            Data rozpoczęcia:
                                            <input class="edit-startdate" form="addCourse" name='begin_date' type="date">
                                        </p>
                                        <p style="margin-left:20px; display:inline-block;">
                                            Data zakończenia:
                                            <input class="edit-enddate" form="addCourse" name='end_date' type="date">
                                        </p>
                                        <p>
                                            Dodaj załącznik
                                        <input type="file" name="zalacznik" />
                                        </p>
                                        <input type='hidden' form="addCourse" name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="addCourse" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <div style="margin-bottom: 70px;">
                                        <input class="add-button" type="submit" value="Dodaj" form="addCourse">
                                        </div>  

                                        
                                    </div>
                                    <div id="cer-container"></div>
                                </label>

                                <br />

                                <label>
                                Uczelnie wyższe:
                                <br> </br>
                                    <span id="show-uni">+ Dodaj uczelnię wyższą</span></br></br>
                                    <div id="edit-uni">
                                        <p>
                                            Nazwa uczelni:
                                            <input class="edit-uni" form="addUni" name='name' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Kierunek:
                                            <input class="edit-spec" form="addUni" name='course' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p>
                                            Tytuł:
                                            <input class="edit-title" form="addUni" name='degree' type="text" pattern=".{3,}">
                                        </p>
                                        <p style="display:inline-block">
                                            Data rozpoczęcia:
                                            <input class="edit-startdate" form="addUni" name='begin_date' type="date">
                                        </p>
                                        <p style="margin-left:20px; display:inline-block;">
                                            Data zakończenia:
                                            <input class="edit-enddate" form="addUni" name='end_date' type="date">
                                        </p>
                                        <input type='hidden' form="addUni" name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="addUni" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <div style="margin-bottom: 70px;">
                                        <input class="add-button" type="submit" value="Dodaj uczelnię wyższą" form="addUni" >
</div>
                                    </div>
                                    <div id="uni-container" style="margin-top:50px;"></div>
                                </label>

                                <br />

                                <label>
                                Cennik:
                                <div>
</br>
                                    <span id="show-price" >+ Dodaj cennik</span>
                                    <div id="edit-price">
                                        <p>
                                            Nazwa zajęć:
                                            <input class="edit-lessons" form="addTrainerOffer" name='classes_name' type="text" pattern=".{3,}" required>
                                        </p>
                                        <p style="display:inline-block">
                                            Maksymalna liczba uczestników:
                                            <input class="edit-patric" form="addTrainerOffer" name='numbers_of_members' type="number" required>
                                        </p>
                                        <p style="margin-left:20px; display:inline-block;">
                                            Cena:
                                            <input class="edit-price" form="addTrainerOffer" name='price' type="number">
                                        </p>
                                        <input form="addTrainerOffer" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="addTrainerOffer" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <div style="margin-bottom: 70px;">
                                        <input class="add-button" type="submit" value="Dodaj ofertę do cennika" form="addTrainerOffer">
</div>
                                    </div>
                                    <div id="offers-container" style="margin-top:45px;"></div>
                                        
                                    </div>
                                </label>

                                <br />
                                <br />
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
                            <legend>Galeria zdjęć</legend>
                            

                        <form action='store' enctype="multipart/form-data" method = 'POST'>
                        <label>Dodaj zdjęcie</label>
                            <input type='file' name='photo_name' id='file'>
                            <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                            <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                            <input type='submit' value='Dodaj zdjęcie' name='submit'>
                            
                        </form>
                        <div id="content-gallery" class="gallery-content"></div>

                        </fieldset>
                    </div>

                    <div id="email-edit">

                    <form action='editEmailInfo' method = 'POST'>
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
                                <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input type="submit" value="Zmień">
                                </br>
                        </fieldset>

                    </form>
                    </div>
                    <div id="password-edit">

                    <form action='editPasswordInfo' method = 'POST'>
                         <fieldset>
                            <legend>Zmiana hasła</legend>

                                <p>
                                <label>
                                        Stare hasło: 
                                        <input name='current_password' type='password' required>
                                </label>
                                </p>

                                <p>
                                <label>
                                        Nowe hasło: 
                                        <input name='new_password' type='password' required>
                                </label>
                                </p>

                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input type="submit" value="Zmień">
                                </br>
                        </fieldset>

                    </form>
                    </div>

                       @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        @endif

                        @foreach (['danger', 'warning', 'success', 'info'] as $key)
                          @if(Session::has($key))
                            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                          @endif
                       @endforeach
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

    <input id="username-id" type="hidden" value='{{ Auth::user()->id }}' />
    <script type="text/javascript" src="{{asset('js/profile/editProfile.js')}}"></script>
</body>
</html>