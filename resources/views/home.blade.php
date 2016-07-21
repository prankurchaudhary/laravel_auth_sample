@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <h4>Your name is {{ Auth::user()->name }}</h4>                    
                    You are registered with this email: {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
