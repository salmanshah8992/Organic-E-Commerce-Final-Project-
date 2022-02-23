@extends('layouts.frontend_master')

@section('main_content')

<div class="container">
    <div style="margin:5rem;font-size:22px;">
        <div class="row">
            <div class="col-4">
                <b>Name:  {{ Auth::user()->name }}</b><br>
                <b>Email: {{ Auth::user()->email }}</b><br>
                <b>Phone: {{ Auth::user()->phone }}</b><br>
            </div>
            <div class="col-8">

            </div>
        </div>
    </div>
</div>

@endsection
