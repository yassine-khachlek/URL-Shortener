@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <a href="{{ Route::has('urls.create') ? route('urls.create') : '#' }}" class="btn btn-lg btn-success btn-block">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<table class="table table-striped table-hover">
    <thead>
        <th>
            ID
        </th>
        <th>
            URL
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
                {{ $url->url }}
            </td>
            <td>
				<form action="{{ Route::has('urls.destroy') ? route('urls.destroy', ['id' => $url->id]) : '#' }}" method="POST" onsubmit="return confirm('Do you really want to delete the url?');" class="form-inline pull-right">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-md btn-dagner">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</button>
				</form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if( method_exists($urls, 'links') )
    {{ $urls->links() }}
@endif
@append
