var express = require("express");
var app = express();
var port = 3700;

app.set('views', __dirname + '/tpl');
app.set('view engine', "jade");
app.engine('jade', require('jade').__express);

app.get("/1", function(req, res){
    res.render("page1");
});

app.get("/2", function(req, res){
    res.render("page2");
});

app.use(express.static(__dirname + '/public'));
var io = require('socket.io').listen(app.listen(port));

io.sockets.on('connection', function (socket) {
    socket.emit('message', { message: 'welcome to the chat'});
    socket.on('send', function (data) {
        io.sockets.emit('message', data);
    });
});