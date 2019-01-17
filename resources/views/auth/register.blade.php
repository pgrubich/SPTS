<<<<<<< HEAD

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
	
    <link rel="stylesheet" href="{{asset('../css/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('../css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('../css/css/fontello.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('../css/login.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <header>
        <nav>

            @if (Auth::check())
            <div class="container-fluid" id="logBar">
            <div class="logo">
=======
@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('css/register.css')}}" type="text/css" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rejestracja') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potwierdź hasło') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div id="checkbox-container">
                            <input type="checkbox" name="policy" id="policy" class="form-control{{ $errors->has('policy') ? ' is-invalid' : '' }}">
                            <span>
                                Potwierdzam, że zapoznałam(em) się z treścią <a href="/privacy">Polityki Prywatności</a> i akceptuję jej postanowienia.<br>
                            </span>
                            @if ($errors->has('policy'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('policy') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zarejestruj się') }}
                                </button>
                                <a class="btn btn-primary" href="/login/facebook">
                                    Facebook
                                </a>

                                <a class="btn btn-primary" href="/login/google">
                                    Google
                                </a>
                            </div>
                        </div>
                    </form>
>>>>>>> e4e3b58495be211db1e5ef9bf5ab2df8ac48f4e7
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

    <main style="width:100%; height:100%; border-top: 1px solid #ebeaea;">
    <form method="POST" action="{{ route('register') }}">
    <div style="padding-right: 20%;padding-left: 20%;" class="container-fluid mainContainer">
        <div style="width:50%;"><div id="registerPic"></div></div>
        
        <div style="width:50%; padding-right:10%;padding-left:10%">
        <div style="width: 270px;height: 64px;">
        <a href="/login/facebook"><div class="facebookR"></div></a>
        </div>
        <div style="width: 270px;height: 64px;">
        <a href="/login/google"><div class="google"></div></a>
        </div>
        <div style="width: 100%;    margin-top: 16px; height: 20px;border-bottom: 2px solid lightgrey; text-align: center">
    <span style=" font-size: 15px;;color: lightgrey;background-color: white;padding: 2px 10px;line-height: 36px;">
        LUB <!--Padding is optional-->
    </span>
    </div>
    <input value="{{ old('email')}}" class="input-loginR" placeholder="Email" name='email' type="email"  required title="Wprowadź co najmniej 3 znaki." required>
    <input class="input-loginR" placeholder="Powtórz Email" name='email2' type="email"  required title="Wprowadź co najmniej 3 znaki." required>
    <input class="input-loginR" placeholder="Hasło" name='password' type="password"  required title="Wprowadź co najmniej 3 znaki." required>
    <input class="input-loginR" placeholder="Powtórz Hasło" name='password2' type="password"  required title="Wprowadź co najmniej 3 znaki." required>
    <input style="margin-top:20px;" type="checkbox" name="regulamin" value="regulamin" required> Akceptuję regulamin <br>
    <input style="margin-top:20px;" class="submit-login" type="submit" value="Zarejestruj się" >
</form>
        </div>
    </div>
    </main>
    
</body>
</html>






