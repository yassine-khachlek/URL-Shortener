@extends('layouts.app')

@section('content')
<form action="{{ Route::has('users.update') ? route('users.update', ['id' => $user->id]) : '#' }}" method="POST">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      	<input name="name" type="text" value="{{ old('name', $user->name) }}" class="form-control" placeholder="@lang('app.name')">
      	
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      	<input name="email" type="text" value="{{ old('email', $user->email) }}" class="form-control" placeholder="@lang('app.email')">
      	
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      	<input name="password" type="password" value="" class="form-control" placeholder="@lang('app.password')">
      	
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
	</div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input name="password_confirmation" type="password" class="form-control" placeholder=" @lang('app.password_confirmation')">

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <a href="{{ Route::has('home') ? route('home') : '#' }}" class="btn btn-lg btn-block btn-default">
           @lang('app.cancel')
        </a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block btn-lg">
           @lang('app.save')
        </button>
      </div>
    </div>
  </div>
</form>
@append