@extends('layouts.app')

@section('content')

<form action="{{ Route::has('urls.store') ? route('urls.store') : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
      	<input name="url" type="text" value="{{ old('url') }}" class="form-control" placeholder="Url">
      	
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