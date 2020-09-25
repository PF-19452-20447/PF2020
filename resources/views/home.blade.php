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
                <br/>
                <div class="card-header">Dashboard</div>
                    <br/>
                    <center><h4> {{__('Welcome to our application')}} {{ explode(" ", Auth::user()->proprietario->nome)[0]}}!</h4></center>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        {{ Auth::user()->name }}, {{__('you are logged in!')}}
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    @endcanany
                    @cannot(['adminApp','adminFullApp'])
                    @can('accessAsLandlord')
                    <br/>
                    <div class="card-header">
                        <div class="card-header">
                            <center><h5>{{ __('To start is simple, follow these steps') }}</h5></center>
                        </div>
                        <h5>{{ __('Firstly') }}</h5>
                        <div id="numero1" class="card-body">
                            {{-- <img src="images/number1.png " /> --}}
                            <center><a class="btn" href="{{ route('imoveis.create') }}">
                                {{ __('Create Property') }}
                                <br/>
                                <p>{{ __('Create a card for your property') }}</p>
                            </a></center>

                        </div>

                        <br/>
                        <h5>{{__('Then')}}</h5>
                        <div id="numero2" class="card-body">
                            {{-- <img src="images/number2.png " /> --}}
                            <center><a class="btn" href="{{ route('inquilinos.create') }}">
                                {{ __('Create Tenant') }}
                                <br/>
                                <p>{{ __('Create a card for your tenant') }}</p>
                            </a></center>

                        </div>

                        <br/>
                        <h5>{{__('Finaly')}}</h5>
                        <div id="numero3" class="card-body">
                            {{-- <img src="images/number3.png " /> --}}
                            <center><a class="btn" href="{{ route('contratos.create') }}">
                                {{ __('Create Contract') }}
                                <br/>
                                <p>{{ __('Create a card for your contract') }}</p>
                            </a></center>

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
                                Contracts
                                <br/>

                            </a>

                        </div>

                        <br/>
                        <div id="numero2" class="card-body">
                            <img src="images/money.png " />
                            <a class="btn" href="{{ route('rendas.index') }}">
                                Incomes
                                <br/>

                            </a>

                        </div>

                        <br/>
                        <div id="numero3" class="card-body">
                            <img src="images/house.png " />
                            <a class="btn" href="{{ route('imoveis.index') }}">
                                Properties
                                <br/>

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

