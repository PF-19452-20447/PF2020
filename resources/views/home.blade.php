@extends('layouts.app')
<head>
<style>
    #numero1{
        border: 2px solid	rgba(190,190,190,0.5);
        border-radius: 5px;
    }

    .card-body{
        background-color: white;
        width:
    }

    #numero2{
        border: 2px solid	rgba(190,190,190,0.5);
        border-radius: 5px;
    }

    #numero3{
        border: 2px solid	rgba(190,190,190,0.5);
        border-radius: 5px;
    }

    .homeIco{
        height: 100px;
    }
    .img-header{
        height: 50px;
        margin:10px;
    }
    .flex-container{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        align-content: space-around;
        align-items: baseline;
        margin-bottom: 50px;
    }

    .flex-item{
        margin: 20px;
        border-radius: 15px;
        width: 30%;
        height: 100px;
        background-color: white;
        box-shadow:
        /* The top layer shadow */
            0 1px 1px rgba(0,0,0,0.15),
                /* The second layer */
            0 10px 0 -5px #eee,
                /* The second layer shadow */
            0 10px 1px -4px rgba(0,0,0,0.15),
                /* The third layer */
            0 20px 0 -10px #eee,
                /* The third layer shadow */
            0 20px 1px -9px rgba(0,0,0,0.15);
        }
</style>
</head>

@section('content')
@canany(['adminApp', 'adminFullApp', 'accessAsTenant', 'accessAsLandlord'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Auth::user()->proprietario)
                    <center><h2> {{__('Welcome ')}} {{ explode(" ", Auth::user()->proprietario->nome)[0]}}!</h2></center>
            @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @auth
                {{-- {{ Auth::user()->name }}, {{__('you are logged in!')}}
                    <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> --}}
            @else
                <a href="{{ route('login') }}">{{ __('Login') }}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @endauth



                <br/>
                @if(Auth::user()->hasRole("Landlord"))
                <div class="card-header">
                    <h5>{{ __("To start it's simple, follow these steps:") }}</h5>
                    <h5>{{ __('Firstly') }}</h5>
                    <div id="numero1" class="card-body">

                        {{-- <img src="images/number1.png " /> --}}
                        <center><a class="btn" href="{{ route('imoveis.create') }}">
                            <img class="homeIco" src="images/house.png " />
                            <p>{{ __('Create a card for your property') }}</p>
                        </a></center>


                    </div>

                    <br/>
                    <h5>{{__('Then')}}</h5>
                    <div id="numero2" class="card-body">
                        {{-- <img src="images/number2.png " /> --}}
                        <center><a class="btn" href="{{ route('inquilinos.create') }}">
                            <img class="homeIco" src="images/person.png " />
                            <p>{{ __('Create a card for your tenant') }}</p>
                        </a></center>


                    </div>

                    <br/>
                    <h5>{{__('Finally')}}</h5>
                    <div id="numero3" class="card-body">

                        {{-- <img src="images/number3.png " /> --}}
                        <center><a class="btn" href="{{ route('contratos.create') }}">
                            <img class="homeIco" src="images/contract.png " />
                            <p>{{ __('Create a card for your contract') }}</p>
                        </a></center>


                    </div>

                </div>

            </div>
        @elseif(Auth::user()->hasRole(["Admin","SuperAdmin"]))
            <center><img class="img-header" src="images/person.png"></center>
            <div class="flex-container">
                {{-- users card --}}
                <div class="card flex-item">
                    <a href="{{ route('users.index') }}"><h5 class="card-header">{{__('Users')}}</h5></a>
                <p>{{__('Users registered')}}: {{ App\User::all()->count()}}  </p>
                </div>
                {{-- landlord cards --}}
                <div class="card flex-item">
                    <a href="{{ route('proprietarios.index') }}"><h5 class="card-header">{{__('Landlords')}}</h5></a>
                    <p>{{__('Landlord profiles')}}: {{ App\Proprietario::all()->count()}}</p>
                </div>
                {{-- tenant cards --}}
                <div class="card flex-item">
                    <a href="{{ route('inquilinos.index') }}"><h5 class="card-header">{{__('Tenant')}}</h5></a>
                    <p>{{__('Tenant cards')}}: {{ App\Inquilino::all()->count()}} </p>
                </div>
                {{-- guarantor cards --}}
                <div class="card flex-item">
                    <a href="{{ route('fiador.index') }}"><h5 class="card-header">{{__('Guarantor')}}</h5></a>
                    <p>{{__('Guarantor cards')}}: {{ App\Fiador::all()->count()}} </p>
                </div>
            </div>
            <center><img class="img-header" src="images/house.png"></center>
            <div class="flex-container">
                {{-- preperty card --}}
                <div class="card flex-item">
                    <a href="{{ route('imoveis.index') }}"><h5 class="card-header">{{__('Property')}}</h5></a>
                <p>{{__('Properties registered')}}: {{ App\Imovel::all()->count()}}  </p>
                </div>
                {{-- contract cards --}}
                <div class="card flex-item">
                    <a href="{{ route('contratos.index') }}"><h5 class="card-header">{{__('Contracts')}}</h5></a>
                    <p>{{__('Contracts signed')}}: {{ App\Contrato::all()->count()}} </p>
                </div>
                {{-- rent cards --}}
                <div class="card flex-item">
                    <a href="{{ route('rendas.index') }}"><h5 class="card-header">{{__('Rent')}}</h5></a>
                    <p>{{__('Rents generated')}}: {{ App\Renda::all()->count()}} </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endcanany
@endsection

