<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Authentification</title>
    <!-- Lien vers le CSS de Bootstrap -->
    <link href="views/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers le CSS de Google Fonts -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <style>
        /* Personnalisation du menu */
        .navbar {
            background-color: #000;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .navbar-nav .nav-item.active .nav-link {
            background-color: #444 !important;
        }

        /* Personnalisation du formulaire */
        .form-container {
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #343a40;
            color: white;
            border-radius: 5px;
            border: none;
        }
        .btn-custom:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-offset-2 " >
                <div class="row" style="padding: 200px 100px 19px 100px;" >
                    <form class="form-horizontal" role="form" method="POST" action="views/login.php">
                        <div class="form-group"> 
                            <label class="col-sm-3 label-control" for="compte">E-mail</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user">    
                                </span>
                                </span>
                                <input  type="text" class="form-control" required placeholder="E-mail" name="compte">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 label-control" for="motpasse" >Mot de passe</label>
                            <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock">
                             </span>
                            </span>
                                <input type="password" class="form-control" required placeholder="Mot de passe" name="motpasse">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button class="btn btn-primary btn-block"  type="submit" name="access" value="1"><i class="glyphicon glyphicon-log-out"></i> Connexion</button>
                                </div>
                            </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>