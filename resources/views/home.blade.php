@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                        </thead>
                        <tbody>
                        @foreach($urls as $url)
                            <tr>
                                <th>
                                    {{ $url->id }}
                                </th>
                                <th>
                                    {{ $url->url }}
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if( method_exists($urls, 'links') )
                        {{ $urls->links() }}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
