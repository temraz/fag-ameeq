var socket = require('socket.io'),
express = require('express'),
https = require('https'),
http = require('http'),
logger = require('winston');

logger.remove(logger.transports.Console);
logger.add(logger.transports.Console,{colorize:true, timsstamp:true});
logger.info("SocketIo > listenting on port ");

var app = express();
var http_server = http.createServer(app).listen(3000);

function emitNewOrder(http_server)
{
	var io = socket.listen(http_server);
	io.sockets.on('connection',function(socket){
		socket.on('new_order',function(data){
			io.emit("new_order",data);
		})
	});
}
emitNewOrder(http_server);
