<?php $ip = gethostbyname(gethostname()); ?>
<html>

<head>
    <title>Pag inicial</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>

<body>
    <!-- Material input -->
<div id="chat">
    
</div>




    <div class="md-form fixed-bottom" style="position: fixed; margin-bottom: 0rem !important; width: 60%; background: #fff;">
        <textarea id="meu-input" class="md-textarea form-control" rows="3"></textarea>
        <label for="meu-input">Envie uma Mensagem</label>
        <button type="button" id="meu-submit" class="btn btn-success btn-floating" style="float: right;left: 94px;bottom: 51px;">
            <i class="fas fa-paper-plane"></i>
          </button>
    </div>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script type="text/javascript" src="src/js/sound/script/soundmanager2-jsmin.js"></script>

</body>
<script>

    // Função que mostra o valor do input num alert
    function mostrarValor() {
        var msg = document.getElementById("meu-input").value;
        socketmsg('123456789', msg)
        $('#meu-input').val('');
    }

    // Evento que é executado toda vez que uma tecla for pressionada no input
    document.getElementById("meu-input").onkeypress = function (e) {
        // 13 é a tecla <ENTER>. Se ela for pressionada, mostrar o valor
        if (e.keyCode == 13) {
            mostrarValor();
            e.preventDefault();
            $('#meu-input').val('');
        }
    }

    // Evento que é executado ao clicar no botão de enviar
    document.getElementById("meu-submit").onclick = function (e) {
        mostrarValor();
        e.preventDefault();
        $('#meu-input').val('');
    }
    //


    api = 1;
    var uri = "ws://172.24.0.1:9503/?token=victor";
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
        $("<span>Usuario: " + obj['name'] + " - " + obj['msg'] + "</span><br>").appendTo("#chat");
        //
        var notificaton = soundManager.createSound({
        url: 'notification.mp3'
        });
        notificaton.play();
    };

    function socketmsg(iduser, msguser) {
        // Store JSON data in a JS variable
        var json = '{"name": "ana", "useridto": "' + iduser + '", "country": "United States", "msg": "' + msguser + '"}';
        socket.send(json)
    }

    socket.onopen = function (e) {
        console.log(e)
    }

    setInterval(function()
	{	
		socketmsg('123456789', "fcgvbhnjkm,l")

	}, 0)
    /** convert json to string */
</script>

</html>