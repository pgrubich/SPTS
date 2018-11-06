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
    <link rel="stylesheet" href="{{asset('css/profiles.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/css/fontello.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/lightbox/lightbox.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/profile/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/profile/lightbox/lightbox-plus-jquery.min.js')}}"></script>
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
            <div class="container-fluid profile-content">

                <div class="leftColumn">
                    <section>
                         <div class="profilePic">
                            
                         </div>



                        <div class="trener-details">
                            <ul class="detail-list">
                            <li class="stars-info"></li>
                                <li>
                                    <span id="name-info">Jan Kowalski</span><br/>
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span id="city-info">
                                        Poznań, Wielkopolska
                                    </span>
                                </li>
                                <li class="detail-info ">
                                <i class="fas fa-phone "></i>
                                    Numer telefonu <br/>
                                    <span id="phone-info">
                                        603 184 710
                                    </span>
                                </li>
                                <li class="detail-info">
                                <i class="far fa-envelope "></i>
                                    Email<br/>
                                    <span id="mail-info">j.kowal@gmail.com</span>
                                    
                                </li>
                                <li class="detail-info">
                                <i class="fab fa-facebook "></i>
                                    Facebook<br/>
                                    <span id="fb-info"><a href="#">Zobacz profil</a></span>
                                </li>
                                <li class="detail-info"> 
                                <i class="fab fa-instagram "></i>
                                    Instagram<br/>
                                    <span id="inst-info"><a href="#">Zobacz profil</a></span>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                
                <div class="middleColumn">
                        <div id="section-nav">
                            <ul class="section-menu">
                                <li id="link1">Profil</li>
                                <li id="link2">Wykształcenie</li>
                                <li id="link3">Kalendarz</li>
                                <li id="link4">Cennik</li>
                                <li id="link5">Galeria</li>
                                <li id="link6">Lokalizacja</li>
                                <li id="link7">Opinie</li>
                            </ul>
                        </div>
                     <div class="categories">
                        <div class="categories-header">
                            <i class="far fa-bookmark"></i>
                            Doświadczenie i umiejętności</div>
                        <div class="categories-content"></div>
                    </div>
                    <div class="categories">
                        <div class="categories-header">
                        <i class="fas fa-certificate"></i>
                            Certyfikaty</div>
                        <div class="categories-content"></div>
                    </div>
                    <div class="categories">
                        <div class="categories-header">
                        <i class="fas fa-graduation-cap"></i>
                        Wykształcenie</div>
                        <div class="categories-content"></div>
                    </div>

                    <section>
                        <div class="categories">
                        <div class="categories-header">
                        <i class="far fa-calendar-alt"></i>
                        Kalendarz</div>
                        <div class="categories-content"></div>
                        </div>
                    </section>

                    <section>
                        <div class="categories">
                            <div class="categories-header">
                            <i class="fas fa-shopping-bag"></i>Cennik</div>
                                <div class="categories-content">
                                <table id="price-table">
                                    <tr >
                                        <th>Typ zajęć</th>
                                        <th>Maksymalna liczba osób</th>
                                        <th>Cena / 1h</th>
                                    </tr>
             
                                </table>    
                                </div>
                            </div>
                    </section>

                    <section>
                        <div class="categories">
                        <div class="categories-header">
                        <i class="far fa-images"></i>
                        Galeria</div>
                        <div class="categories-content gallery-content"></div>
                        </div>
                    </section>
                    <section>
                        <div class="categories">
                        <div class="categories-header">
                        <i class="far fa-comments"></i>
                        Opinie</div>

                        <div class="categories-content">
                            

                            <form class="comment-box" action='/profiles/addOpinion' method = 'GET'>

                            <label>
                                Imię:
                                <input placeholder="Podaj imię..." class="review-input-name" name='name' type='text' required pattern=".{3,}">
                            </label>
                            <br>
                            <label>
                                Adres email: 
                                <input placeholder="Podaj email..." class="review-input-email" name='email' type='email' required>
                            </label>
                            <br>
                                Ocena
                                <input type="radio" name="rating" id="str1" value="1"><label for="str1"></label>
                                <input type="radio" name="rating" id="str2" value="2"><label for="str2"></label>
                                <input type="radio" name="rating" id="str3" value="3"><label for="str3"></label>
                                <input type="radio" name="rating" id="str4" value="4"><label for="str4"></label>
                                <input type="radio" name="rating" id="str5" value="5"><label for="str5"></label>
                            <br>
                            <label>
                                <br>
                                <textarea class="review-input-description" placeholder="Oceń trenera..." name="description" cols="70" rows="10" required maxlength="500" minlength="5"></textarea>
                            </label>
                            <br>
                                <input type='hidden' name='trainer_id' value='{!! Request::segment(2) !!}'/>
                            <input class="submit-button" type="submit">
                            </form> 
                          
                            </div>

						</div>  
                    </section>
                </div>      
            </div>
           
        </article>
    </main>
    
<script type="text/javascript" src="{{asset('js/profile/profileJson.js')}}"></script>
<script type="text/javascript" src="{{asset('js/profile/profileEngine.js')}}"></script>
</body>
</html>