var touse;
    //função de click para abri o chat
    function chatvisible(id){
        
    $("#"+id).click(function() { 
        $('div[id^=chat').each(function() {
            var idEspecial = 'chat'+id;
            $(this).toggleClass('open', this.id === idEspecial);
            console.log(this.id);
            $("#"+this.id).css({"display":"none", "position": "relative", "height": "400px", "overflow-y": "auto", "overflow-x": "hidden"});
        }); 
        $("#chat"+id).css({"display":"block", "position": "relative", "height": "400px", "overflow-y": "auto", "overflow-x": "hidden"});
        touse = id;
    });
}
    
    // Função que mostra o valor do input num alert
    function mostrarValor() {
        var msg = document.getElementById("meu-input").value;
        socketmsg(touse, msg)
        $('#meu-input').val('');
    }

    // Evento que é executado toda vez que uma tecla for pressionada no input
    document.getElementById("meu-input").onkeypress = function (e) {
        // 13 é a tecla <ENTER>. Se ela for pressionada, mostrar o valor
        if (e.keyCode == 13) {
            mostrarValor();
            e.preventDefault();
            $('#meu-input').val('');
            console.log("enter");
        }
    }

    // Evento que é executado ao clicar no botão de enviar
    document.getElementById("meu-submit").onclick = function (e) {
        mostrarValor();
        e.preventDefault();
        $('#meu-input').val('');
        console.log("submit buttom");
    }
    //


    token = "maria";
    user = "maria";
    var uri = "ws://172.24.0.1:9503/?user="+user+"&&token="+token+"";
    var socket = new WebSocket(uri);
    socket.onclose = function (e) {
        console.log('connection closed');
    };
    window.addEventListener("unload", function () {
        if (socket.readyState == WebSocket.OPEN)
            socket.close();
    });

    socket.onmessage = function (e) {
        var obj = JSON.parse(e.data);
        console.log(obj)
        //
        if ($("#"+obj['name']).length){
            console.log("existe");
            $("#"+obj['name']).replaceWith('<li class="p-2 border-bottom" id="'+obj["name"]+'"> <a href="#!" class="d-flex justify-content-between"> <div class="d-flex flex-row"> <div> <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60"> <span class="badge bg-success badge-dot"></span> </div><div class="pt-1"> <p class="fw-bold mb-0">'+obj['name']+'</p><p class="small text-muted">'+obj['msg']+'</p></div></div><div class="pt-1"> <p class="small text-muted mb-1">Agora</p><span class="badge bg-danger rounded-pill float-end">1</span> </div></a></li>');
            $('<div class="d-flex flex-row justify-content-end"> <div> <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">'+obj['msg']+'</p><p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p></div><img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;"></div>').appendTo("#chat"+obj['name']);
            chatvisible(obj['name']);
        }else{
             $('<li class="p-2 border-bottom" id="'+obj["name"]+'"> <a href="#!" class="d-flex justify-content-between"> <div class="d-flex flex-row"> <div> <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60"> <span class="badge bg-success badge-dot"></span> </div><div class="pt-1"> <p class="fw-bold mb-0">'+obj['name']+'</p><p class="small text-muted">'+obj['msg']+'</p></div></div><div class="pt-1"> <p class="small text-muted mb-1">Agora</p><span class="badge bg-danger rounded-pill float-end">1</span> </div></a></li>').appendTo("#chat");
             if (!$("#chat"+obj['name']).length){
                $('<div style="display:none;" id="chat'+obj["name"]+'" class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px; overflow-y: auto; overflow-x: hidden;">').appendTo("#ChatUsers");
                $('<div class="d-flex flex-row justify-content-end"> <div> <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">'+obj['msg']+'</p><p class="small me-3 mb-3 rounded-3 text-muted">12:00 PM | Aug 13</p></div><img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;"></div>').appendTo("#chat"+obj['name']);
                chatvisible(obj['name']);
             }
             
           }
    };

    function socketmsg(iduser, msguser) {
        // Store JSON data in a JS variable
        if ($("#"+iduser).length){
            console.log("existe");
            $("#"+iduser).replaceWith('<li class="p-2 border-bottom" id="'+iduser+'"> <a href="#!" class="d-flex justify-content-between"> <div class="d-flex flex-row"> <div> <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60"> <span class="badge bg-success badge-dot"></span> </div><div class="pt-1"> <p class="fw-bold mb-0">'+iduser+'</p><p class="small text-muted">'+msguser+'</p></div></div><div class="pt-1"> <p class="small text-muted mb-1">Agora</p><span class="badge bg-danger rounded-pill float-end">1</span> </div></a></li>');
            $('<div class="d-flex flex-row justify-content-start"> <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;"> <div> <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">'+msguser+'</p><p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p></div></div>').appendTo("#chat"+iduser);
            chatvisible(iduser);
        }else{
             $('<li class="p-2 border-bottom" id="'+iduser+'"> <a href="#!" class="d-flex justify-content-between"> <div class="d-flex flex-row"> <div> <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp" alt="avatar" class="d-flex align-self-center me-3" width="60"> <span class="badge bg-success badge-dot"></span> </div><div class="pt-1"> <p class="fw-bold mb-0">'+iduser+'</p><p class="small text-muted">'+msguser+'</p></div></div><div class="pt-1"> <p class="small text-muted mb-1">Agora</p><span class="badge bg-danger rounded-pill float-end">1</span> </div></a></li>').appendTo("#chat");
             if (!$("#chat"+iduser).length){
                $('<div style="display:none;" id="chat'+iduser+'" class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px; overflow-y: auto; overflow-x: hidden;">').appendTo("#ChatUsers");
                $('<div class="d-flex flex-row justify-content-start"> <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp" alt="avatar 1" style="width: 45px; height: 100%;"> <div> <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">'+msguser+'</p><p class="small ms-3 mb-3 rounded-3 text-muted float-end">12:00 PM | Aug 13</p></div></div>').appendTo("#chat"+iduser);
                chatvisible(iduser);
             }
             
           }
        var json = '{"name": "joao", "useridto": "' + iduser + '", "country": "United States", "msg": "' + msguser + '"}';
        socket.send(json)
    }

    socket.onopen = function (e) {
        console.log(e)
    }

    /** convert json to string */