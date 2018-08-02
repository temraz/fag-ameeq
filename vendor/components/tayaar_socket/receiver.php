<!DOCTYPE html>
<html>
<head>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
	<title></title>
</head>
<body>

</body>
</html>
<script type="text/javascript">
	var socket = io.connect('http://127.0.0.1:3000');
	socket.on("new_order",function(data){
		console.log(data);
	});
</script>