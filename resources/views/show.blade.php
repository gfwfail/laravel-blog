@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><div class="label label-info">{{$post->category}}</div>      <img src="{{ $post->user->avatar }}" width="30" height="30" alt="" class="img-circle pull-right">
                         <h3>{{ $post->title }}</h3>  <small class="text-muted">    {{$post->created_at}}</small></div>
                    <div class="panel-body">
                        {{$post->content}}
                        <hr>
                        @foreach($post->comments as $comment)


                                    <p>
                                        <img src="{{ $comment->user->avatar }}" width="30" height="30" alt="" class="img-circle pull-right">

                                        {{$comment->user->name}}:
                                        @if($comment->isMine())

                                <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                                    {!! Form::model($comment, [
                                         'method' => 'PATCH',
                                         'url' => ['/admin/comments', $comment->id],
                                         'class' => 'form-horizontal',
                                     ]) !!}

                                    {!! Form::label('content', 'Content', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::textarea('content', null, ['class' => 'form-control','rows'=>3]) !!}
                                        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                                    </div>

                                            {!! Form::button('Submit', array(
                                                           'type' => 'submit',
                                                           'class' => 'pull-right btn btn-info btn-xs',
                                                           'title' => 'Submit',
                                                   )) !!}
                                            {!! Form::close() !!}

                                            {!! Form::open([
                                                  'method'=>'DELETE',
                                                  'url' => ['/admin/comments', $comment->id],
                                                  'style' => 'display:inline'
                                              ]) !!}
                                            {!! Form::button(' Delete', array(
                                                           'type' => 'submit',
                                                           'class' => 'btn btn-danger btn-xs pull-right',
                                                           'title' => 'Delete Comment',
                                                           'onclick'=>'return confirm("Confirm delete?")'
                                                   )) !!}
                                            {!! Form::close() !!}
                                </div>
                            @else
                                    {{$comment->content}}
                                        @endif
                                    </p>
                        @endforeach
                        <div class="form-group">
                            {!! Form::open(['route' => ['posts.comment', 'id'=>$post->id], 'class' => 'form-horizontal']) !!}

                            {!! Form::textarea('content', null, ['class' => 'form-control', 'rows'=>3]) !!}
                            {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                            <br>
                            {!! Form::submit('Send Comment', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
