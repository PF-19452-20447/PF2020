@extends('layouts.app')

@section('content')

    <div class="container">
       <form method="POST" action="<?php echo action('PaymentsController@store'); ?>">
            @csrf
       </form>

    </div>

@endsection
