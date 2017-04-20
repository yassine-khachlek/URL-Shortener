<ul class="nav navbar-nav navbar-right">

    <li class="dropdown">
        @if(Config::get('languages.'.App::getLocale().'.'.'flag'))
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag'] }}"></span>
			{{ Config::get('languages.'.App::getLocale().'.'.'native_name') }}
            <span class="caret"></span>
        </a>
	  	@endif

        <ul class="dropdown-menu" role="menu">
            <li>
				@foreach(
					Config::get('languages')
			        as $key => $language
			    )
			    	@if($key != App::getLocale())
		                <a href="{{ Route::current()->parameters() ? route_lang($key, null, Route::current()->parameters()) : route_lang($key) }}">
							@if($language['flag'])
							<span class="flag-icon flag-icon-{{ $language['flag'] }}"></span>
							@endif
							{{ $language['native_name'] }}
		                </a>
					@endif
				@endforeach
            </li>
        </ul>
    </li>

</ul>
