@extends('layouts.app')
<head>
<style>
    #numero1{
        border: 2px solid	rgba(190,190,190,0.5);
        border-radius: 5px;
    }

    .card-body{
        background-color: white;
    }

    #numero2{
        border: 2px solid	rgba(190,190,190,0.5);
        border-radius: 5px;
    }

    #numero3{
        border: 2px solid	rgba(190,190,190,0.5);
        border-radius: 5px;
    }

</style>
</head>

@section('content')
@canany(['adminApp', 'adminFullApp', 'accessAsTenant', 'accessAsLandlord'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <br></br>
                <div class="card-header">Dashboard</div>
                    <br></br>
                    <h4>Welcome to our application! {{-- Auth::user()->proprietario->imoveis->pluck('id') --}}
                        <?php
                       /* $user= Auth::user();
                        $fiadores_ids = [];
                        foreach($user->proprietario->inquilinos as $inquilino){
                         $fiadores_ids = array_merge($fiadores_ids,  $inquilino->fiadores->pluck('id')->toArray());
                         echo(json_encode($fiadores_ids).",");
                          //  echo($inquilino->id.",");
                         // echo(json_encode($inquilino->fiadores->pluck('id')).",");
                          /*foreach($inquilino->fiadores as $fiador){
                            // $fiadores_ids = array_merge($fiadores_ids,  $inquilino->fiadores->pluck('id')->toArray());
                                echo($fiador->id.",");
                              //echo(json_encode($inquilino->fiadores->pluck('id')).",");
                            }*//*
                        }*/

                        ?>
                        </h4>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        {{ Auth::user()->name }}, you are logged in!
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endauth
                    @endcanany
                    @cannot(['adminApp','adminFullApp'])
                    @can('accessAsLandlord')
                    <br></br>
                    <div class="card-header">
                        <div class="card-header">
                            <h5>{{ __('To start is simple, step 1,2,3') }}</h5>
                        </div>
                        <div id="numero1" class="card-body">
                            <img src="images/number1.png " />
                            <a class="btn" href="{{ route('imoveis.create') }}">
                                {{ __('Create Property') }}
                                <br></br>
                                <p>{{ __('Create a card for your property') }}</p>
                            </a>

                        </div>

                        <br></br>
                        <div id="numero2" class="card-body">
                            <img src="images/number2.png " />
                            <a class="btn" href="{{ route('inquilinos.create') }}">
                                {{ __('Create Tenant') }}
                                <br></br>
                                <p>{{ __('Create a card for your tenant') }}</p>
                            </a>

                        </div>

                        <br></br>
                        <div id="numero3" class="card-body">
                            <img src="images/number3.png " />
                            <a class="btn" href="{{ route('contratos.create') }}">
                                {{ __('Create Contract') }}
                                <br></br>
                                <p>{{ __('Create a card for your contract') }}</p>
                            </a>

                        </div>

                    </div>
                    @endcan
                    @endcannot

                    <br>
                    <br>
                    @cannot(['accessAsLandlord', 'adminFullApp', 'adminApp'])
                    @can(['accessAsTenant'])
                    <div class="card-header">
                        <div class="card-header">

                        </div>
                        <div id="numero1" class="card-body">
                            <img src="images/contracts.png " />
                            <a class="btn" href="{{ route('contratos.index') }}">
                                {{ __('Contracts') }}
                                <br></br>

                            </a>

                        </div>

                        <br></br>
                        <div id="numero2" class="card-body">
                            <img src="images/money.png " />
                            <a class="btn" href="{{ route('rendas.index') }}">
                                {{ __('Incomes') }}
                                <br></br>

                            </a>

                        </div>

                        <br></br>
                        <div id="numero3" class="card-body">
                            <img src="images/house.png " />
                            <a class="btn" href="{{ route('imoveis.index') }}">
                                {{ __('Properties') }}
                                <br></br>
                                
                            </a>

                        </div>

                    </div>
                    @endcan
                    @endcannot
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

