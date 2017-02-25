@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">


                @foreach($posts as $item)

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/posts/' . $item->id) }}">{{$item->title}}</a>
                            <span class="label label-info">{{$item->category}}</span>
                            <img src="{{ $item->user->avatar }}" width="30" height="30" alt="" class="img-circle pull-right">

                        </div>
                        <div class="panel-body">{{str_limit($item->content,300)}}</div>
                        <div class="panel-footer">{{$item->created_at}}</div>

                    </div>

                @endforeach



        </div>
    </div>
</div>
@endsection
