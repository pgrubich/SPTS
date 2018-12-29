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
    <link rel="stylesheet" href="{{asset('css/cropper/jquery.Jcrop.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/lightbox/lightbox.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/profile/lightbox/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{asset('js/profile/jquery.scrollTo.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <script src="{{asset('js/profile/jquery.Jcrop.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" rel="stylesheet">
</head>

<body>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<header>
        <nav>
            <div class="container-fluid" id="logBar">
            <div class="logo">
                </div>
                <span>
                
                <a href="/profiles/{{ Auth::user()->id }}" ><i class="fas fa-user" style='color:#5f5d5d; margin-right:5px;'></i> Profil</a>
                <a href="/editProfile" ><i class="far fa-edit" style='color:#5f5d5d; margin-right:5px;'></i>Edytuj profil</a>
                <button onclick="location.href='/logout'" style="font-size:16px;" type="button" class="btn blue-button">Wyloguj się</button>
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
                            <div style="margin-left: 100px;">
                            <form id="editPrimaryInfo" action='editPrimaryInfo' method = 'POST'></form>
                            <form id="addCity" action='addCity' method = 'POST'></form>
                                
                                <p>
                                <label  >
                                        Imię: 
                                        <input class="edit-name" form="editPrimaryInfo" name='name' type='text' placeholder='{{ Auth::user()->name }}' value='{{ Auth::user()->name }}' pattern="[A-ZĄĘŹŻŚÓĆNŁ][a-ząęźżśóćńł]{2,10}" title="Pierwsza litera wielka, maksymalnie 11 znaków">
                                </label>
                                </p>

                                <p>
                                <label  >
                                        Nazwisko: 
                                        <input class="edit-lastname" form="editPrimaryInfo" name='surname' type='text' placeholder='{{ Auth::user()->surname }}' value='{{ Auth::user()->surname }}' pattern="[A-ZĄĘŹŻŚÓĆNŁ][a-ząęźżśóćńł]{2,10}" title="Pierwsza litera wielka, maksymalnie 11 znaków">
                                </label>
                                </p>

                                <p>
                                <label>
                                        Data urodzenia:
<input  class="edit-date" form="editPrimaryInfo" name='bdate' type="date" placeholder='{{ Auth::user()->bdate }}' value='{{ Auth::user()->bdate }}' max="2000-11-01" min="1920-11-01">
                                </label  >
                                </p>
                                
                                <p  >
                                        Płeć:
                                        <span style="margin-left:104px;">
                                        <label class="container-radio" >
                                        <input style="margin-left: 125px;" form="editPrimaryInfo" type="radio" name="gender" value="f">
                                        kobieta  <span class="checkmark-radio"></span></label>
                                        
                                        <label class="container-radio" >
                                        <input form="editPrimaryInfo" type="radio" name="gender" value="m">    
                                        mężczyzna  <span class="checkmark-radio"></span></label>
</span>
                                </p>
                                <p>
                                <label  >
                                    Telefon: 
                                    <input  class="edit-phone" form="editPrimaryInfo" name='phone' type='tel' placeholder='{{ Auth::user()->phone }}' value='{{ Auth::user()->phone }}' pattern="([0-9]{3}-[0-9]{3}-[0-9]{3})|([0-9]{9})" title="Numer w formacie 123-456-789 lub 123456789.">
                                </label>
                                </p>
                                
                                <p>
                                <label  >
                                    Instagram: 
                                    <input  class="edit-insta" form="editPrimaryInfo" name='instagram' type='text' placeholder='{{ Auth::user()->instagram }}' value='{{ Auth::user()->instagram }}' pattern="^[a-z\d\.]{5,}$" title="Nazwa użytkownika. Minimum 5 znaków">
                                </label>
                                </p>

                                <p>
                                <label  >
                                    Facebook: 
                                    <input class="edit-face"  form="editPrimaryInfo" name='facebook' type='text' placeholder='{{ Auth::user()->facebook }}' value='{{ Auth::user()->facebook }}' pattern="^[a-z\d\.]{5,}$" title="Nazwa użytkownika. Minimum 5 znaków">
                                </label>
                                </p>

                                <p>
                                <label  >
                                    Strona WWW: 
                                    <input class="edit-page"  form="editPrimaryInfo" name='page' type='text' placeholder='{{ Auth::user()->page }}' value='{{ Auth::user()->page }}' pattern="^(https?://)?([a-zA-Z0-9]([a-zA-ZäöüÄÖÜ0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$" >
                                </label>
                                </p>

                                <label  >
                                    <span id="show-cities">+ Dodaj miasto: </span>
                                    <div id="edit-cities">
                                    <p>
                                            Miasto:
                                            <input class="edit-city" form="addCity" name='city' minlength="2" maxlength="40" type="text" pattern="^[A-ZĄĘŹŻŚÓĆNŁ][a-ząęźżśóćńł]+(?:[\s-][a-ząęźżśóćńłA-ZĄĘŹŻŚÓĆNŁ]+)*$" required>
                                        </p>
                                        <p>
                                            Województwo:
                                            <input class="edit-voi" form="addCity" name='voivodeship' minlength="2" maxlength="40" type="text" pattern="^[A-ZĄĘŹŻŚÓĆNŁ][a-ząęźżśóćńł]+(?:[\s-][a-ząęźżśóćńłA-ZĄĘŹŻŚÓĆNŁ]+)*$" required>
                                        </p>
                                        <input form="addCity" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="addCity" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <input class="city-add-button" type="submit" value="Dodaj miasto" form="addCity">
                                    </div>
                                </label>


                                <div>
                                <input form="editPrimaryInfo" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                <input form="editPrimaryInfo" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input class="save-button" type="submit" value="Zapisz" form="editPrimaryInfo">
                                </div>

                            </form>
</div>
                        </fieldset>
                    </div>
                    <div id="specific-edit">
                    
                    <form id="editSpecificInfo" action='editSpecificInfo' method = 'POST'></form>
                    <form id="addCourse" action='addCourse' enctype="multipart/form-data" method = 'POST'></form>
                    <form id="addUni" action='addUni' method = 'POST'></form>
                    <form id="addTrainerOffer" action='addTrainerOffer' method = 'POST'></form>

                        <fieldset>
                            <legend>Dane szczegółowe</legend>
                                <p>
                                        <label >
                                        Opis:
                                        <br />
                                        <textarea form="editSpecificInfo" class="edit-text" form="editSpecificInfo" name="description" cols="90" rows="10" maxlength="2048" minlength="5" title="Minimalna liczba znaków to 5, a maksymalna 2000 ">{{ Auth::user()->description }}</textarea>                                        <input form="editSpecificInfo" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="editSpecificInfo" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <input class="add-button" type="submit" value="Aktualizuj opis" form="editSpecificInfo" >
                                        </label>
                                </p>
                                <p style="margin-top:45px;">
                                        Dyscypliny:
                                        <div id="dyscypline-list-editprofile" >
                                            <form id='updateDisciplines' action='updateDisciplines' method='POST'>
                                            <div style="width:27%" class="dyscypline-column-editprofile">
                                            </div>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div style="width:28%" class="dyscypline-column-editprofile">
                                            </div>
                                            <div style="width:20%" class="dyscypline-column-editprofile">
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
                                            <input placeholder="Podaj nazwę placówki" class="edit-place" form="addCourse" name='place' type="text" pattern=".{3,}" required title="Wprowadź co najmniej 3 znaki.">
                                        </p>
                                        <p style="display: inline-block;">
                                            Nazwa kursu:
                                            <input placeholder="Podaj nazwę kursu" class="edit-course" form="addCourse" name='name' type="text" pattern=".{3,}" title="Wprowadź co najmniej 3 znaki.">
                                        </p>
                                        <p style="display:inline-block">
                                            Data rozpoczęcia:
                                            <input class="edit-startdate" form="addCourse" name='begin_date' type="date" max="2018-12-31" min="1900-01-01">
                                        </p>
                                        <p style="margin-left:20px; display:inline-block;">
                                            Data zakończenia:
                                            <input class="edit-enddate" form="addCourse" name='end_date' type="date" max="2018-12-31" min="1900-01-01">
                                        </p>
                                        <p>
                                            Dodaj załącznik
                                        < <input form="addCourse" type="file" name="zalacznik" accept="image/jpeg,image/gif,image/png,application/pdf" >
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
                                Wykształcenie:
                                <br> </br>
                                    <span id="show-uni">+ Dodaj wykształcenie</span></br></br>
                                    <div id="edit-uni">
                                        <p>
                                            Nazwa uczelni:
                                            <input class="edit-uni" form="addUni" name='name' type="text" pattern=".{3,}" required title="Wprowadź co najmniej 3 znaki.">
                                        </p>
                                        <p  style="display: inline-block;">
                                            Kierunek:
                                            <input class="edit-spec" form="addUni" name='course' type="text" pattern=".{3,}" required title="Wprowadź co najmniej 3 znaki.">
                                        </p>
                                        <p  style="display: inline-block;">
                                        Tytuł zawodowy:
                                            <input class="edit-title" form="addUni" name='degree' type="text" pattern=".{3,}" title="Wprowadź co najmniej 3 znaki.">
                                        </p>
                                        <p style="display:inline-block">
                                            Data rozpoczęcia:
                                            <input class="edit-startdate" form="addUni" name='begin_date' type="date" max="2018-12-31" min="1900-01-01">
                                        </p>
                                        <p style="margin-left:20px; display:inline-block;">
                                            Data zakończenia:
                                            <input class="edit-enddate" form="addUni" name='end_date' type="date" max="2018-12-31" min="1900-01-01">
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
                                            <input class="edit-lessons" form="addTrainerOffer" name='classes_name' type="text" pattern=".{3,}" required title="Wprowadź co najmniej 3 znaki.">
                                        </p>
                                        <p style="display:inline-block">
                                            Maksymalna liczba uczestników:
                                            <input class="edit-patric" form="addTrainerOffer" name='numbers_of_members' type="number" min='1' max='20' required>
                                        </p>
                                        <p style="margin-left:20px; display:inline-block;">
                                            Cena:
                                            <input class="edit-price" form="addTrainerOffer" name='price' type="number" step="0.01">
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
                            <div>
                            <!-- <img style="width:10%;" id="image" src="./css/images/athlete.jpg"> -->
                            </div>
               

                        <div id="ex2" class="modal" style="max-width: 540px; min-height: 500px;">
                        <form id="profile-pic-choose-form" action='store' method = 'POST'>
                        <span style="font-size:20px; font-weight:900; ">Wybierz zdjęcie profilowe</span>
                        <div id="profilePicPick">

                        </div>

                                
                        <!-- Modal HTML embedded directly into document -->
                        
                        <div style="margin-top:15px;" id="abc"></div>
                        <input style="position: absolute; bottom: 15px; right: 20px;" class="submit-b" type='submit' value='Ustaw jako zdjęcie profilowe' name='submit'>
                            
                        </form>
                        
                        </div>
                        


                    
                        <!-- Modal HTML embedded directly into document -->
                        <div id="ex1" class="modal" style="height:600px; width: 800px;">
                        <form id="profile-pic-form" action='addProfilePicture' enctype="multipart/form-data" method = 'POST'>
                        <span style="font-size:20px; font-weight:900; ">Dodaj zdjęcie</span>
                                <input style="margin-top:20px;" type='file' name='photo_name' id='profile-img'>
                                <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                
                        <!-- Modal HTML embedded directly into document -->
                        
                        <div style="margin-top:15px;" id="xyz"></div>
                        <input style="position: absolute; bottom: 15px; right: 20px;" class="submit-b" type='submit' value='Dodaj zdjęcie profilowe' name='submit'>
                            
                        </form>
                        
                        </div>
                        <br>
                        Zdjęcie profilowe
                        <br> <br>
                        <!-- Link to open the modal -->
                        <div style="display:flex; justify-content: center; align-items:center;">
                        <a style="color:#757575; width:20%; display:inline-block; text-align:center;  margin-top: 24px;" href="#ex1" rel="modal:open"><div>
                        <p><i style=" font-size:28px" class="far fa-image"></i></p>
                        <p>Dodaj zdjęcie profilowe</p>
                        </div></a>
                        <a style="color:#757575; width:20%; display:inline-block; text-align:center; margin-top: 24px;" href="#ex2" rel="modal:open"><div>
                        <p><i style=" font-size:28px" class="far fa-images"></i></p>
                        <p>Wybierz zdjęcie z galerii</p>
                        </div></a>
                        <a id="del-profile-pic" style="cursor:pointer; color:#757575; width:20%; display:inline-block; text-align:center;"><div>
                        <p><i style=" font-size:28px" class="far fa-trash-alt"></i></p>
                        <p>Usuń</p>
                        </div></a>
                        <div class="profilePic" style="width:30%; display:inline-block;"></div>
                    </div>







                        



















                        <br>
                        <p style="width:100%;">Pozostałe zdjęcia</p><br>
                        <form action='store' enctype="multipart/form-data" method = 'POST'>
                        <label>Dodaj zdjęcie</label>
                                <input type='file' name='photo_name' id='file'>
                                <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                <input class="submit-b" type='submit' value='Dodaj zdjęcie' name='submit'>
                            
                        </form>
                        <br>
                        <div id="content-gallery" class="gallery-content">

                        </div>

                        </fieldset>
                    </div>

                    <div id="email-edit">

                    <form action='editEmailInfo' method = 'POST'>
                         <fieldset>
                            <legend>Zmiana email</legend>
                            <div style="margin-left: 100px;">
                                <p>
                                <label>
                                        Aktualny adres email: 
                                        <input class="edit-email-actual" name='current_email' type='email' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                </label>
                                </p>

                                <p>
                                <label>
                                        Nowy adres email: 
                                        <input class="edit-email" name='new_email' type='email' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                </label>
                                </p>

                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input style="margin-left: 69%;" class="submit-b" type="submit" value="Zmień">
                                </br>
                                </div>
                        </fieldset>

                    </form>
                    </div>
                    <div id="password-edit">

                    <form action='editPasswordInfo' method = 'POST'>
                         <fieldset>
                            <legend>Zmiana hasła</legend>
                            <div style="margin-left: 100px;">

                                <p>
                                <label>
                                        Aktualne hasło: 
                                        <input class="edit-password-actual" name='current_password' type='password' minlength="3" maxlength="20" required>
                                </label>
                                </p>

                                <p>
                                <label>
                                        Nowe hasło: 
                                        <input class="edit-password" name='new_password' type='password' minlength="3" maxlength="20" required>
                                </label>
                                </p>

                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input style="margin-left: 69%;" class="submit-b" type="submit" value="Zmień">
                                </br>
                                    </div>
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