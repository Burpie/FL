@extends('layouts.admin')

@section('content')
<div class="row">
<div class="col-md-12 text-center">
    <h3>Redigera ansökan för: {{$application->name. ' ' .$application->lastName}}</h3>
    </div>
        <div class="col-md-6">
        <ol class="breadcrumb">
        <li><a href="/admin">Admin Dashboard</a></li>
        <li><a href="/admin/applications/"> Ansökningar</a></li>
        <li><a href="/admin/applications/{{$application->id}}">Ansökan - {{$application->name . ' '. $application->lastName}}</a></li>
        <li class="active">Redigera</li>
        </ol>
        </div>
        <div class="col-md-6">
        <a href="/admin" class="btn btn-primary btn-sm pull-right">Admin Dashboard</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          @if($application->status->app_status == 'approved')
          {{ Form::model($application, ['method'=>'POST', 'route' => ['registration.store']]) }}
          <div class="col-md-12 text-center">
          <p>Status är Godkänd. Skapa en ny användare.</p>
          </div>
             <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name', 'Förnamn') }}
                {{ Form::text('name', null,  ['class' => 'form-control']) }}
                {{ $errors->first('name', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
                {{ Form::label('lastName', 'Efternamn') }}
                {{ Form::text('lastName', null,  ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('lastName', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('username', 'Huvudkaraktär') }}
                {{ Form::text('username', null,  ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('username', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
             <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('email', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
             <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('server', 'Server') }}
                {{ Form::text('server', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('server', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
             <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('klass', 'Klass?') }}
                {{ Form::select('klass',['death-knight' => 'Death Knight', 'druid' => 'Druid','hunter' => 'Hunter', 'mage'=>'Mage', 'monk' => 'Monk','priest' =>
                 'Priest','paladin' => 'Paladin', 'rogue' => 'Rogue', 'shaman' => 'Shaman','warlock' => 'Warlock', 'warrior' => 'Warrior' ],null,
                   ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('klass', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
              <div class="col-md-6">
                 <div class="form-group">
                 {{ Form::label('role', 'Sätt en behörighet') }}
                 {{ Form::select('role',['Utvecklare' => 'Utvecklare', 'Admin' => 'Admin','Medlem' => 'Medlem', 'Inaktiv'=>'Inaktiv', 'Bannad' => 'Bannad'],'',
                    ['class' => 'form-control', 'required' => 'required']) }}
                 {{ $errors->first('klass', '<p class="text-warning">:message </p>') }}
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                 {{Form::label('rank', 'Sätt en rank')}}
                 {{Form::select('rank', ['Trial' => 'Trial', 'Social' => 'Social', 'Raider' => 'Raider', 'Officer' => 'Officer', 'Guild Master' => 'Guild Master'], 'Trial', ['class' => 'form-control'])}}
                 </div>
             </div>

            <div class="col-md-12">
            <div class="form-group text-center">
            {{ Form::submit('Skapa användare', ['class' => 'btn btn-primary btn-sm']) }}
            </div>
            </div>
            {{Form::close()}}
           @else
           {{ Form::model($application, ['method'=>'PATCH', 'route' => ['application.update', $application->id ],'files' => true]) }}

            <div class="col-md-12">
            <div class="form-group">
                {{Form::label('app_status', 'Ändra Status')}}
                {{ Form::select('app_status', ['default' => 'Väntar på beslut', 'denied' => 'Nekad', 'approved' => 'Accepterad'], $application->status->app_status, ['class' => 'form-control']) }}
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name', 'Förnamn') }}
                {{ Form::text('name', null,  ['class' => 'form-control']) }}
                {{ $errors->first('name', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
                {{ Form::label('lastName', 'Efternamn') }}
                {{ Form::text('lastName', null,  ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('lastName', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('username', 'Din huvudkaraktär') }}
                {{ Form::text('username', null,  ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('username', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
                {{ Form::label('server', 'Karaktärens server') }}
                {{ Form::text('server', null,  ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('server', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('email', 'Din Email') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('email', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('armory', 'Länk till din Armory Profil') }}
                {{ Form::text('armory',null,  ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('armory', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('talents', 'Vilken spec kör du?') }}
                {{ Form::text('talents', null,  ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('talents', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('klass', 'Vilken klass?', ['class' => 'text-white']) }}
                {{ Form::select('klass',['death-knight' => 'Death Knight', 'druid' => 'Druid','hunter' => 'Hunter', 'mage'=>'Mage', 'monk' => 'Monk','priest' =>
                 'Priest','paladin' => 'Paladin', 'rogue' => 'Rogue', 'shaman' => 'Shaman','warlock' => 'Warlock', 'warrior' => 'Warrior' ], null,
                   ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('klass', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('played', 'Vad är din speltid på din huvudkaraktär och/eller betydelsefulla alts. (Ange gärna speltid på tidigare mains med. Ange även namn och server.)' )}}
                {{ Form::textarea('played', null,  ['class' => 'form-control']) }}
                {{ $errors->first('played', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('playClass', 'Varför valde du att spela just den class och spec du spelar nu. Skulle du kunna tänka dig spela en annan class eller spec om vi känner att det är bättre för guildet? ') }}
                {{ Form::textarea('playClass', null,  ['class' => 'form-control']) }}
                {{ $errors->first('playClass', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('bio', 'Berätta lite om dig själv') }}
                {{ Form::textarea('bio', null,  ['class' => 'form-control']) }}
                {{ $errors->first('bio', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('raidExperience', 'Berätta om din raiderfarenhet. Har du ingen så berätta om andra gamingerfarenheter, må det vara WoW eller andra spel.') }}
                {{ Form::textarea('raidExperience', null,  ['class' => 'form-control']) }}
                {{ $errors->first('raidExperience', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('reasonToApplyFl', 'Berätta vad du söker i ett guild och varför du sökte just till Family Legion') }}
                {{ Form::textarea('reasonToApplyFl', null,  ['class' => 'form-control']) }}
                {{ $errors->first('reasonToApplyFl', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('oldGuild', 'Om du var medlem i andra Guilds, berätta för oss varför du lämnade?') }}
                {{ Form::textarea('oldGuild', null,  ['class' => 'form-control']) }}
                {{ $errors->first('oldGuild', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('progressRaid', 'Vad tycker du om progressraiding, raida för achivements och raida gammalt content?') }}
                {{ Form::textarea('progressRaid', null,  ['class' => 'form-control']) }}
                {{ $errors->first('progressRaid', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('attendance', 'Vi använder ett rotationsystem baserat på närvaro, vad tycker du om det??') }}
                {{ Form::textarea('attendance', null,  ['class' => 'form-control']) }}
                {{ $errors->first('attendance', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('screenshot', 'Ladda gärna upp en bild  på ditt raid UI') }}
                {{ Form::file('screenshot') }}
                {{ $errors->first('screenshot', '<p class="text-warning">:message </p>') }}
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group text-center">
                {{ Form::submit('Spara', ['class' => 'btn btn-primary btn-sm']) }}
            @endif
            </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
@stop