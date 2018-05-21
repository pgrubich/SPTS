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
            <span>
            <a href="/login">Zaloguj się</a>
            /
            <a href="/register">Zarejerstruj się</a>
            </span>
        </div>

        

        <nav>
            <ul class="menu">
              <li><a href="#">Nawigacja1</a></li>/
              <li><a href="#">Nawigacja2</a></li>/
              <li><a href="#">Nawigacja3</a></li>/
              <li><a href="#">Nawigacja4</a></li>/
              <li><a href="#">Nawigacja5</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <div id="content">

                <div class="leftColumn">
                    <section>
                        <div class="profilePic"></div>

                        <div class="trener-details">
                            <ul class="detail-list">
                                <li>Jan Kowalski</li>
                                <li>603 603 603</li>
                                <li>j.kowal@gmail.com</li>
                                <li>Poznań, Wielkopolska</li>
                            </ul>
                        </div>
                    </section>
                </div>
                
                <div class="middleColumn">
                        <section>
                                <div id="section-nav">
                                    <ul class="section-menu">
                                            <li id="link1">Profil</li>
                                            <li id="link2">Kalendarz</li>
                                            <li id="link3">Cennik</li>
                                            <li id="link4">Galeria</li>
                                            <li id="link5">Opinie</li>
                                    </ul>
                                </div>
                            </section>
                    <section>
                        <div class="categories">
                            <h2 id="profile-info">Profil</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor, ex eu tincidunt rhoncus, ex diam placerat felis, eu rhoncus ex libero vestibulum risus. Integer mattis suscipit sem at suscipit. Proin scelerisque lectus efficitur ipsum luctus venenatis. Aliquam ultricies vehicula magna, ac facilisis odio tempor eu. Duis ut varius tellus. Vivamus tristique vitae sapien nec imperdiet. Quisque ac elit lectus. Praesent tempus tincidunt libero quis pretium. Maecenas id eros ut enim maximus molestie. Praesent elit velit, tincidunt eu nibh id, pharetra venenatis purus. Pellentesque a consectetur dui. In ultricies orci vitae sodales viverra.</p>
                        </div>
                    </section>

                    <section>
                        <div class="categories">
                            <h2 id="calendar-info">Kalendarz</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor, ex eu tincidunt rhoncus, ex diam placerat felis, eu rhoncus ex libero vestibulum risus. Integer mattis suscipit sem at suscipit. Proin scelerisque lectus efficitur ipsum luctus venenatis. Aliquam ultricies vehicula magna, ac facilisis odio tempor eu. Duis ut varius tellus. Vivamus tristique vitae sapien nec imperdiet. Quisque ac elit lectus. Praesent tempus tincidunt libero quis pretium. Maecenas id eros ut enim maximus molestie. Praesent elit velit, tincidunt eu nibh id, pharetra venenatis purus. Pellentesque a consectetur dui. In ultricies orci vitae sodales viverra.</p>
                        </div>
                    </section>

                    <section>
                        <div class="categories">
                            <h2 id="prices-info">Cennik</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor, ex eu tincidunt rhoncus, ex diam placerat felis, eu rhoncus ex libero vestibulum risus. Integer mattis suscipit sem at suscipit. Proin scelerisque lectus efficitur ipsum luctus venenatis. Aliquam ultricies vehicula magna, ac facilisis odio tempor eu. Duis ut varius tellus. Vivamus tristique vitae sapien nec imperdiet. Quisque ac elit lectus. Praesent tempus tincidunt libero quis pretium. Maecenas id eros ut enim maximus molestie. Praesent elit velit, tincidunt eu nibh id, pharetra venenatis purus. Pellentesque a consectetur dui. In ultricies orci vitae sodales viverra.</p>
                        </div>
                    </section>

                    <section>
                        <div class="categories">
                            <h2 id="gallery-info">Galeria</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor, ex eu tincidunt rhoncus, ex diam placerat felis, eu rhoncus ex libero vestibulum risus. Integer mattis suscipit sem at suscipit. Proin scelerisque lectus efficitur ipsum luctus venenatis. Aliquam ultricies vehicula magna, ac facilisis odio tempor eu. Duis ut varius tellus. Vivamus tristique vitae sapien nec imperdiet. Quisque ac elit lectus. Praesent tempus tincidunt libero quis pretium. Maecenas id eros ut enim maximus molestie. Praesent elit velit, tincidunt eu nibh id, pharetra venenatis purus. Pellentesque a consectetur dui. In ultricies orci vitae sodales viverra.</p>
                        </div>
                    </section>
                    <section>
                        <div class="categories">
                            <h2 id="reviews-info">Opinie</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor, ex eu tincidunt rhoncus, ex diam placerat felis, eu rhoncus ex libero vestibulum risus. Integer mattis suscipit sem at suscipit. Proin scelerisque lectus efficitur ipsum luctus venenatis. Aliquam ultricies vehicula magna, ac facilisis odio tempor eu. Duis ut varius tellus. Vivamus tristique vitae sapien nec imperdiet. Quisque ac elit lectus. Praesent tempus tincidunt libero quis pretium. Maecenas id eros ut enim maximus molestie. Praesent elit velit, tincidunt eu nibh id, pharetra venenatis purus. Pellentesque a consectetur dui. In ultricies orci vitae sodales viverra.</p>
                        </div>
                    </section>
                </div>

                <div id="ads">
                    <aside>
                    </aside>
                </div>
                <div style="clear:both;"></div>
            
            </div>
           
        </article>
    </main>
    

<script type="text/javascript" src="{{asset('js/profile/profileJson.js')}}"></script>
<script type="text/javascript" src="{{asset('js/profile/profileEngine.js')}}"></script>
</body>
</html>