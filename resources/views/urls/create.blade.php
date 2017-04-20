@extends('layouts.app')

@section('content')

<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="{{ Auth::user()->urls->count() }}" aria-valuemin="{{ Auth::user()->urls->count() }}" aria-valuemax="{{ Config::get('url.limit_per_user') }}" style="width: {{ Auth::user()->urls->count() / Config::get('url.limit_per_user') * 100 }}%;">
    {{ Auth::user()->urls->count() }} / {{ Config::get('url.limit_per_user') }}
  </div>
</div>

<form action="{{ Route::has(Config::get('languages.'.App::getLocale().'.as').'urls.store') ? route(Config::get('languages.'.App::getLocale().'.as').'urls.store') : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
      	<input name="url" type="text" value="{{ old('url') }}" class="form-control" placeholder="@lang('app.url')">
      	
        @if ($errors->has('url'))
            <span class="help-block">
                <strong>{{ $errors->first('url') }}</strong>
            </span>
        @endif
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<a href="{{ Route::has('urls.index') ? route('urls.index') : '#' }}" class="btn btn-lg btn-block btn-default">
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