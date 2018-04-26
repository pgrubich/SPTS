<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/profile/jquery.scrollTo.min.js')}}"></script>
</head>
<body>
<div id="container">

    <div id="logRegBar">
        <button class="logReg">Zaloguj się</button>
        <button class="logReg"> Zarejerstruj się</button></div>


    <div id="logo">
        <h2 style="text-align:center;">Nazwa-serwisu</h2>
    </div>

    <div id ="nav">
        <div class="navButton">nav1</div>
        <div class="navButton">nav2</div>
        <div class="navButton">nav3</div>
        <div class="navButton">nav4</div>
        <div class="navButton">nav5</div>
        <div style="clear:both;"></div>
    </div>

    <div id="profile">
        <div id="twoSections">
            <div id="photo">zdjęcie</div>
            <div id="informations">xyz</div>
        </div>
        
        
        
        <div id="profileContent">
            <div id ="profileNav">
                <div id="link1" class="profileNavButton">Profil</div>
                <div id="link2" class="profileNavButton">Kalendarz</div>
                <div id="link3" class="profileNavButton">Cennik</div>
                <div id="link4" class="profileNavButton">Galeria</div>
                <div id="link5" class="profileNavButton">Opinie</div>
                <div  style="clear:both;"></div>
            </div>

            <div id="profil1" class="profileBlock">
                Profil </br></br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor, ex eu tincidunt rhoncus, ex diam placerat felis, eu rhoncus ex libero vestibulum risus. Integer mattis suscipit sem at suscipit. Proin scelerisque lectus efficitur ipsum luctus venenatis. Aliquam ultricies vehicula magna, ac facilisis odio tempor eu. Duis ut varius tellus. Vivamus tristique vitae sapien nec imperdiet. Quisque ac elit lectus. Praesent tempus tincidunt libero quis pretium. Maecenas id eros ut enim maximus molestie. Praesent elit velit, tincidunt eu nibh id, pharetra venenatis purus. Pellentesque a consectetur dui. In ultricies orci vitae sodales viverra.
            </div>
            <div id="kalendarz" class="profileBlock">
                Kalendarz </br></br>
                Donec nibh ex, consectetur et lectus sit amet, euismod pulvinar nulla. Donec feugiat luctus erat, id varius ipsum condimentum tincidunt. Vivamus efficitur ligula vel consectetur eleifend. In hac habitasse platea dictumst. Nullam vitae convallis tellus, ut tincidunt orci. Sed eu tempor enim. Integer magna lectus, posuere a iaculis a, viverra at eros. Curabitur in malesuada tellus. Donec dignissim ligula a nisl consectetur venenatis. Integer vel aliquam nisl, in rutrum justo. In hac habitasse platea dictumst. Suspendisse consequat nulla non purus lacinia sodales. Ut posuere nec tortor nec tempor. Integer vitae gravida magna. Vivamus mattis dolor sit amet diam ultricies, ac hendrerit quam elementum. Cras vitae euismod tortor.
            </div>
            <div id="cennik" class="profileBlock">
                Cennik </br></br>
                Vestibulum hendrerit dui auctor elit sagittis, id fermentum erat sodales. Ut odio purus, placerat at laoreet eu, tincidunt id sem. Nam mattis congue odio a imperdiet. Cras venenatis id dolor nec placerat. Duis sed ipsum eget purus ullamcorper eleifend vitae a leo. Vivamus eu feugiat dui. Pellentesque pulvinar tristique libero, vitae pellentesque orci porta ut. Praesent tempor sem ac venenatis egestas. Nulla porttitor turpis scelerisque metus placerat, sed ornare leo blandit. Aliquam cursus nisi vel turpis pellentesque sollicitudin. Nulla facilisi. Sed rutrum elit in dolor viverra, eget blandit ligula luctus. Nam quis purus in orci maximus pharetra. Nulla faucibus odio ut sapien sodales, at tincidunt mauris finibus. In nec tortor lobortis, viverra ligula quis, elementum metus. Aliquam commodo efficitur tortor, ac posuere tortor facilisis et.
            </div>
            <div id="xyz" class="profileBlock">
                Galeria </br></br>
                Mauris lobortis pulvinar neque, a mattis mauris congue vel. Vivamus ut malesuada libero, quis gravida sem. Nullam et ex sed ex fringilla tincidunt. Integer dapibus laoreet urna, quis mattis risus congue vitae. Etiam ut sagittis est, ut pulvinar ipsum. In sed convallis eros, eget interdum lacus. Donec vel risus ultrices, auctor lorem ac, porta dolor.
            </div>
            <div id="opinie" class="profileBlock">
                Opinie </br></br>
                Fusce dictum consequat dolor, ut tempus tortor laoreet eget. Fusce sed urna volutpat, luctus tellus id, varius massa. Curabitur nunc sapien, blandit id auctor ac, iaculis sit amet nunc. Curabitur elementum bibendum lorem, quis ultricies arcu commodo ac. Donec tempor interdum gravida. Cras gravida nibh eu eros bibendum, nec placerat diam aliquet. Nulla condimentum, urna nec hendrerit tempus, justo purus accumsan eros, at eleifend turpis odio sed tortor. Vivamus finibus dui non imperdiet dapibus. Morbi ullamcorper, metus sit amet laoreet venenatis, ligula nisi eleifend diam, non auctor turpis risus sit amet odio. Ut vitae consequat sapien, accumsan rutrum arcu. Vestibulum ut elit arcu.
            </div>


        </div>
        

       

    </div>





</div>

<script type="text/javascript" src="{{asset('js/profile/profileJson.js')}}"></script>
<script type="text/javascript" src="{{asset('js/profile/profileEngine.js')}}"></script>

</body>
</html>