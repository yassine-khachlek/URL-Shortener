@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover">
    <thead>
        <th>
            @lang('app.date_time')
        </th>
        <th>
            @lang('app.ip')
        </th>
        <th>
        	@lang('app.country')
        </th>
        <th>
            @lang('app.url_short')
        </th>
        <th>
        	@lang('app.url')
        </th>
        <th>
        	@lang('app.user')
        </th>
        <th>
        	@lang('app.user_agent')
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
                {{ $url_access_log->url_short }}
            </td>
            <td>
                {{ $url_access_log->url }}
            </td>
            <td>
            	{{$url_access_log->user_email}}
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