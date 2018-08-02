<?php
include ("vendor/autoload.php");
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;
if($_POST['emit_data'])
{
	$version = new Version1X("http://127.0.0.1:3000");
	$client = new Client($version);
	$client->initialize();
	$client->emit('new_order',['test' => 'test','test1' => 'test1']);
	$client->close();
}
?>
<!DOCTYPE html>
<html>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<head>
	<title></title>
</head>
<body>
<button value="Emit" id="emit">Emit</button>
</body>
</html>
<script type="text/javascript">
	$("#emit").click(function(){
        $.post("http://localhost:8888/tayaar_socket/emit_test.php", {emit_test: 'sections'	},
        function(data){
          

        }
        , "json"); 

	})
</script>