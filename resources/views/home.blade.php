@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $users_count }}</div>
                        <div>Users!</div>
                    </div>
                </div>
            </div>
            <a href="{{ Route::has('users.index') ? route('users.index') : '#' }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-link fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $urls_count }}</div>
                        <div>Urls!</div>
                    </div>
                </div>
            </div>
            <a href="{{ Route::has('urls.index') ? route('urls.index') : '#' }}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-12">
        @include('commons.widgets.charts.chartjs.pie', [
            'id'    =>  'url_limit',
            'labels'=>  collect([
                                        'Urls used',
                                        'Remaining urls',
                                    ]),
            'data'  =>  collect([
                                        App\Url::count(),
                                        Config::get('url.limit_per_app') - App\Url::count(),
                                    ]),
        ])
    </div>

    <div class="col-lg-9 col-md-12">
        @include('commons.widgets.charts.chartjs.line', [
            'id'    =>  'url_views',
            'label' =>  'URL views',
            'labels'=>  $url->map(function($item){
                            return $item->url;
                        }),
            'data'  =>  $url->map(function($item){
                            return $item->views_count;
                        }),
        ])
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <a href="{{ Route::has('url-access-logs.index') ? route('url-access-logs.index') : '#' }}" class="btn btn-lg btn-primary btn-block">
                <i class="fa fa-history" aria-hidden="true"></i>
                Views logs
            </a>
        </div>
    </div>
</div>
@append

@section('scripts')
<script src="{{ asset('components/chart.js/dist/Chart.min.js') }}"></script>
@append