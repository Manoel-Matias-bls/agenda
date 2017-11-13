<!DOCTYPE html>
  <html>
    <head>
        <meta charset="UTF-8">
        <title> Biblioteca Online</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <div id="divCenter" class="container">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-image">
                            <img src="image/banner.jpg">
                            <span id="image-title" class="card-title" style="font-weight: bold;">
                                Biblioteca Online
                            </span>
                        </div>
                        <div class="card-action">
                            <a href="?pagina=novo">Novo Livro</a>
                            <a href="?pagina=pesquisa">Pesquisar Livro</a>
                        </div>
                        <div class="card-content">
                            <?php
                            $pagina = filter_input(INPUT_GET, "pagina");
                            switch ($pagina) {
                                case 'novo':
                                    require_once("View/novo.php");
                                    break;
                                case 'pesquisa':
                                    require_once("View/pesquisa.php");
                                    break;
                                case 'ver':
                                    require_once("View/ver.php");
                                    break;

                                default:
                                    require_once("View/novo.php");
                                    break;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
  </html>
