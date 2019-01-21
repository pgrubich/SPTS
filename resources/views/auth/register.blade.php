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
                                <div class="col-md-10 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Zarejestruj się') }}
                                    </button>
                                    <a href="/login/facebook">
                                        <button type="button" class="btn btn-fb" >
                                            <i class="fab fa-facebook-f pr-1"><span style="font-family: Raleway; padding-left: 2px;"> Kontynuuj </span></i>
                                        </button>
                                    </a>
                                    <a href="/login/google">
                                        <button type="button" class="btn btn-gplus" >
                                            <i class="fab fa-google-plus-g pr-1"><span style="font-family: Raleway; padding-left: 2px;"> Kontynuuj </span> </i>
                                        </button>
                                    </a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
