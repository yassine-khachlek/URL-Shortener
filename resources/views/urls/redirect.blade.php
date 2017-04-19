<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="info">
		Redirect after 3 seconds...
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