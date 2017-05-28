
function chatSystem(config) {

    var messages = [];
    var socket = io.connect(config.baseURL);
    
    document.getElementById("name").value = config.user1.name;

    socket.on('message', function (data) {
        if (data.message) {
            messages.push(data);
            var html = '';
            for (var i = 0; i < messages.length; i++) {
                html += '<b>' + (messages[i].username ? messages[i].username : 'Server') + ': </b>';
                html += messages[i].message + '<br />';
            }
            document.getElementById("content").innerHTML = html;
        } else {
            console.log("There is a problem:", data);
        }
    });

    document.getElementById("send").onclick = function () {
            var text = document.getElementById("field").value;
            socket.emit('send', { message: text, username: config.user1.name });        
    };

    //     function escapeHtml(unsafe) {
    //     return unsafe
    //          .replace(/&/g, "&amp;")
    //          .replace(/</g, "&lt;")
    //          .replace(/>/g, "&gt;")
    //          .replace(/"/g, "&quot;")
    //          .replace(/'/g, "&#039;");
    //  }
}