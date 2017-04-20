<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="info">
		@lang('app.redirect_after') 3 @lang('app.seconds')
	</div>
	<script type="text/javascript">
		var redirectAfter = 3;

		var interval = setInterval(function(){
			redirectAfter--;

			if(redirectAfter<=0){
				window.location.href='{{ $url->url }}';
				clearInterval(interval);
			}

			document.getElementById('info').innerHTML= '@lang('app.redirect_after') ' + redirectAfter + ' @lang('app.seconds')...';

		}, 1000);
	</script>
</body>
</html>