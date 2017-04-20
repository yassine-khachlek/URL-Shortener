<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="info">
		@lang('app.redirect_after_x_seconds', ['seconds' => 3])
	</div>
	<script type="text/javascript">
		var redirectAfter = 3;

		var interval = setInterval(function(){
			redirectAfter--;

			if(redirectAfter<=0){
				window.location.href='{{ $url->url }}';
				clearInterval(interval);
			}

			document.getElementById('info').innerHTML= 'Redirect after ' + redirectAfter + ' seconds...';

		}, 1000);
	</script>
</body>
</html>