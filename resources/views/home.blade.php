@extends('layouts.app')

@section('content')
@canany(['adminApp', 'adminFullApp', 'accessAsTenant', 'accessAsLandlord'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
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
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    @endcanany
                    @cannot(['adminApp','adminFullApp'])
                    @can('accessAsLandlord')
                    <br></br>
                    <div class="card-header">
                        <div class="card-body">
                            <h5>To start is simple, step 1,2,3</h5>
                        </div>
                        <div class="card-body">
                            <img src="images/numero1.png " />
                            <a class="btn" href="{{ route('imoveis.create') }}">
                                Create Property
                                <p>Create a card for your property</p>
                            </a>

                        </div>

                        <br></br>
                        <a href="{{ route('inquilinos.create') }}">Create Tenant</a>
                        <br></br>
                        <a href="{{ route('contratos.create') }}">Create Contract</a>
                    </div>
                    @endcan
                    @endcanany
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

