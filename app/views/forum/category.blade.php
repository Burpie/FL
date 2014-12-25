@extends('layouts.home')

@section('content')

<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
    <li><a href="/forum">Forum</a></li>
    <li class="active">{{$category->title}}</li>
</ol>
</div>
<div class="col-md-12">
    @if(Session::has('flash_message'))
        <p class="text-info">{{Session::get('flash_message')}}</p>
     @endif
      <a href="/forum/new/thread/{{$category->id}}" class="btn btn-primary btn-sm">Skapa tråd</a>
</div>
</div>
<div class="row">
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table panel panel-default">
        <tbody class="panel-heading">
        <tr>
            <th><h6>{{$category->title}}</h6></th>
            <th><P>Svar</P></th>
            <th><p>Skapad av</p></th>

            @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Utvecklare'))
            <th class="pull-right">
            <a id="{{$category->id}}" href="#" class="btn btn-danger btn-xs delete_category" data-toggle="modal" data-target="#category_delete">Ta bort</a>
             </th>
            @endif

        </tr>
        </tbody>
        <tbody class="panel-body">
        @if(count($category->threads) > 0)
            @foreach($category->threads as $thread)
                    <tr>
                    <td><strong><p><a href="/forum/thread/{{$thread->id}}">{{$thread->title}}</a></p></strong></td>
                    <td>{{count($thread->comments)}}</td>
                    <td><img src="{{$thread->author->profile->thumbnail}}" class="img-circle img-responsive thumbnail-mini pull-left" />
                    <p class="{{$thread->author->profile->klass}}"> {{$thread->author->username}} </p>
                    </td>
                    </tr>
            @endforeach
        @else
        <tr>
        <td>
        <p>Det finns inga trådar än, var den första att skapa en!</p>
        </td>
        </tr>
            @endif
            </tbody>
            </table>
            </div>
        </div>
    </div>

    @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Utvecklare'))
                <div class="modal fade" id="category_delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Ta bort Kategori</h4>
                            </div>
                            <div class="modal-body">
                                <p>Är du säker på att du vill ta bort denna kategori? <br /> <small>Alla trådar och kommentarer som tillhör kommer också försvinna!</small> </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                                <a id="btn_delete_category" class="btn btn-primary">Ta bort</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
@stop
