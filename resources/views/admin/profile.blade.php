@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        <img src="{{ Auth::user()->avatar }}" width="30" height="30" alt="" class="img-circle pull-right">

                      <div class="form-group">
                          {!! Form::model($user, [
                          'method' => 'PATCH',
                          'url' => ['/admin/profile'],
                          'class' => 'form-horizontal',
                          'files' => true
                      ]) !!}

                          Avatar: <input type="file" id="avatar" name="avatar" class="form-control">
                          <br>
                          <button class="btn primary">Save</button>
                          {!! Form::close() !!}
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
