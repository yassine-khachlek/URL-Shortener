@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover" id="url-access-logs-table">
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
                   {{$url_access_log->country->name}}
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
            	   {{$url_access_log->userAgent->user_agent}}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<noscript>
@if( method_exists($url_access_logs, 'links') )
    {{ $url_access_logs->links() }}
@endif
</noscript>

@append

@section('styles')
<link rel="stylesheet" href="{{ asset('components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@append

@section('scripts')
<script src="{{ asset('components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
$(function() {
    $('#url-access-logs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ Route::has(Config::get('languages.'.App::getLocale().'.as').'url-access-logs.datatables.data') ? route(Config::get('languages.'.App::getLocale().'.as').'url-access-logs.datatables.data') : '#' }}',
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'ip', name: 'ip' },
            { 
                data: 'country.name',
                name: 'country.name',
                render: function( data, type, full, meta ) {
                return '<span class="flag-icon flag-icon-'+full.country_code+'"></span> '+full.country.name;
                } 
            },
            { data: 'url_short', name: 'url_short' },
            { data: 'url', name: 'url' },
            { data: 'user_email', name: 'user_email' },
            { 
                data: 'userAgent.name',
                name: 'userAgent.name',
                render: function( data, type, full, meta ) {
                    return full.user_agent.name;
                } 
            }

        ]
    });
});
</script>
@append