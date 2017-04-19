@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-link fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ Auth::user()->urls()->count() }} / {{ Config::get('url.limit_per_user') }}</div>
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

    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-line-chart" aria-hidden="true"></i>
            Urls views
          </div>
          <div class="panel-body">
            @include('commons.widgets.charts.chartjs.line', [
                'id'    =>  'my_url_views',
                'label' =>  'URL views',
                'labels'=>  Auth::user()->urls()->get()->map(function($item){
                                return $item->url_short;
                            }),
                'data'  =>  Auth::user()->urls()->get()->map(function($item){
                                return $item->views_count;
                            }),
            ])
          </div>
        </div>
    </div>
</div>

@if (Auth::user()->can('index', App\UrlAccessLog::class))
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
@endif
@append

@section('scripts')
<script src="{{ asset('components/chart.js/dist/Chart.min.js') }}"></script>
@append