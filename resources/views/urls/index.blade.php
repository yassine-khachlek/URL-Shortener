@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">

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

    </div>
</div>
@append
