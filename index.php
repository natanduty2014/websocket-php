<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
</head>
<style>
  /* Works on Firefox */
  * {
    scrollbar-width: auto;
    scrollbar-color: blue #ccc;
  }

  /* Works on Chrome, Edge, and Safari */
  *::-webkit-scrollbar {
    width: 0.5em;
  }

  *::-webkit-scrollbar-track {
    background: #ccc;
  }

  *::-webkit-scrollbar-thumb {
    background-color: blue;
    border-radius: 5px;
    border: 1px solid blue;
  }
</style>

<body>
  <section style="background-color: #CDC4F9;">
    <div class="container py-5">

      <div class="row">
        <div class="col-md-12">

          <div class="card" id="layoutchat" style="border-radius: 15px;">
            <div class="card-body">

              <div class="row">
                <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                  <div class="p-3">

                    <div class="input-group rounded mb-3">
                      <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                      <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                      </span>
                    </div>

                    <div data-mdb-perfect-scrollbar="true"
                      style="position: relative; height: 400px; overflow-y: auto; overflow-x: hidden;">
                      <ul class="list-unstyled mb-0" id="chat">

                      </ul>
                    </div>

                  </div>

                </div>

                <div id="ChatUsers" class="col-md-6 col-lg-7 col-xl-8">
                  <div style="position: absolute; bottom: 10px; right: 0px;" class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2 col-md-6 col-lg-7 col-xl-8">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                      alt="avatar 3" style="width: 40px; height: 100%;">
                    <input type="text" class="form-control form-control-lg" id="meu-input" placeholder="Type message">
                    <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                    <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                    <a class="ms-3" href="#!" id="meu-submit"><i class="fas fa-paper-plane"></i></a>
                  </div>

                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

  <script type="text/javascript" src="js/chat.js"></script>
  <script type="text/javascript">
    /*
     if ($("#maria").length){
       var elementChat = ' <p class="small text-muted">'+obj['msg']+'</p>';
       console.log("existe");
       $("#maria").replaceWith("");
      }else{
        console.log("nao existe");
        $("").appendTo("#chat");
      }*/
  </script>
</body>

</html>

