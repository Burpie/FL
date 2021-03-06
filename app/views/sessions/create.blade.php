@extends('layouts.index')

@section('content')

<div class="row">
    <div class="col-md-12">
        <img src="/img/login/logo.png" class="img-responsive center-block" />
    </div>
</div>

<div class="row">
    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
        <div class="login-form push-down">
            @if(Session::has('flash_message'))
                <p class="text-white">{{Session::get('flash_message')}}</p>
            @endif
            {{Form::open(['route' => 'session.store'])}}
             <div class="form-group">
                {{Form::text('email', null, ['class' => 'form-control login-field', 'placeholder' => 'Email'])}}
                {{Form::label('', '',['class' => 'login-field-icon fui-user'])}}
                {{errors_for('email', $errors)}}
             </div>
             <div class="form-group text-center">
                {{Form::password('password', ['class' => 'form-control login-field', 'placeholder' => 'Lösenord'])}}
                {{Form::label('','', ['class' => 'login-field-icon fui-lock'])}}
                <a class="login-link" href="password/remind">Supit bort lösenordet?</a>
                {{errors_for('password', $errors)}}
             </div>
             <div class="form-group text-center">
             {{Form::submit('Logga in', ['class' => 'btn btn-primary btn-sm'])}}<br />

            </div>
            {{Form::close()}}

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-white">
    <div class="wrapper-apply text-center">
        <h2>Ansök till Family Legion</h2>
       <a href="/apply" class="btn btn-primary btn-sm">Ansök här!</a>
    </div>
    </div>
</div>
@stop