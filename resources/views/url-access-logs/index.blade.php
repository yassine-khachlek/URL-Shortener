@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
    <thead>
        <th>
            ID
        </th>
        <th>
            IP
        </th>
        <th>
        	COUNTRY
        </th>
        <th>
        	URL
        </th>
        <th>
        	USERNAME
        </th>
        <th>
        	USER AGENT
        </th>
    </thead>
    <tbody>
    @foreach($url_access_logs as $url_access_log)
        <tr>
            <td>
                {{ $url_access_log->id }}
            </td>
            <td>
            	{{ $url_access_log->ip }}
            </td>
            <td>
            	@if($url_access_log->country)
            		{{ $url_access_log->country->name }}
            	@endif
            </td>
            <td>
            	@if($url_access_log->url)
            		{{ $url_access_log->url->url }}
            	@endif
            </td>
            <td>
            	@if($url_access_log->user)
                	{{ $url_access_log->user->name }}
                @endif
            </td>
            <td>
            	@if($url_access_log->userAgent)
                	{{ $url_access_log->userAgent->user_agent }}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if( method_exists($url_access_logs, 'links') )
    {{ $url_access_logs->links() }}
@endif
@append