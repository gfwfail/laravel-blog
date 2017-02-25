<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user') ? 'has-error' : ''}}">
    {!! Form::label('user', 'User', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('post') ? 'has-error' : ''}}">
    {!! Form::label('post', 'Post', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('post', null, ['class' => 'form-control']) !!}
        {!! $errors->first('post', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
