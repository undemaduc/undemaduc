
window.onload = function () {


    chatSystem({
        "user2": {
            "id" : "1",
            "name" : "john"   
        },
        "user1": {
            "id" : "2",
            "name" : "mary"   
        },
        "baseURL": "http://localhost:3700",
        "messageHistoryId": "content",
        "messageInputId": "field",
    });

}

