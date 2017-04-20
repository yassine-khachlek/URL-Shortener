@extends('layouts.app')

@section('content')

@if( Auth::user()->urls()->count() >= Config::get('url.limit_per_user') )

    <div class="alert alert-danger" role="alert">
        Sorry you have reached your urls limit ({{Config::get('url.limit_per_user')}}).
    </div>

@else

    @if( App\Url::count() >= Config::get('url.limit_per_app') )

        <div class="alert alert-danger" role="alert">
            Sorry the application has reached its limit of urls ({{Config::get('url.limit_per_app')}}).
        </div>

    @else

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <a href="{{ route_lang(App::getLocale(), 'urls.create') }}" class="btn btn-lg btn-success btn-block">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

    @endif

@endif

<div class="table-responsive">
<table class="table table-striped table-hover">
    <thead>
        <th>
            @lang('app.id')
        </th>
        <th>
            @lang('app.url_short')
        </th>
        <th>
            @lang('app.url')
        </th>
        <th>
            @lang('app.views')
        </th>
        <th>

        </th>
    </thead>
    <tbody>
    @foreach($urls as $url)
        <tr>
            <td>
                {{ $url->id }}
            </td>
            <td>
                {{ $url->url_short }}
            </td>
            <td>
                {{ $url->url }}
            </td>
            <td>
                {{ $url->views_count }}
            </td>
            <td style="min-width: 150px;">
				<form action="{{ route_lang(App::getLocale(), 'urls.destroy', ['id' => $url->id]) }}" method="POST" onsubmit="return confirm('Do you really want to delete the url?');" class="form-inline pull-right">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-lg btn-danger">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</form>

                <a href="{{ $url->url_short }}" target="_blank" class="btn btn-lg btn-primary pull-right">
                    <i class="fa fa-external-link" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@if( method_exists($urls, 'links') )
    {{ $urls->links() }}
@endif
@append

@section('styles')
<link href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

<style type="text/css">
    .table :last-child > a {
        margin-left: 8px;
    }
    .table :last-child > form {
        margin-left: 8px;
    }
</style>
@append