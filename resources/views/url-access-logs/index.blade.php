@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
    <thead>
        <th>
            DATE TIME
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
                {{ $url_access_log->created_at }}
            </td>
            <td>
            	{{ $url_access_log->ip }}
            </td>
            <td>
            	@if($url_access_log->country)
            		<span class="flag-icon flag-icon-{{ $url_access_log->country->code }}"></span>
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

@section('styles')
<link href="{{ asset('components/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">
@append