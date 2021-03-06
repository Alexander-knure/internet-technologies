var express = require('express');
var app = express();
var server = require('http').createServer(app);
var io = require('socket.io').listen(server);

users=[];
connections=[];

server.listen(3000);

app.get('/', function(request, respons){
 respons.sendFile(__dirname + '/index.html');
});


io.sockets.on('connection', function(socket){
    console.log("Successful connection");
    connections.push(socket);

    socket.on('disconnect', function(data){
        console.log("Successful disconnection");
        connections.splice(connections.indexOf(socket), 1);
    });

    socket.on('send mess', function(data){
        io.sockets.emit('add mess', {mess: data.mess, name: data.name, color: data.color} );
    });

});
