<!DOCTYPE HTML>
<?php
    include ('includes/include.php');
    
    extract(@$_GET);
?>
 
<html lang="fr">
    <head>
        <title>Oust - Connexion</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <div id ="wrapper" class="login">
            <h2>Oust - Connexion</h2>
            <?php
                if (isset($qError))
                {
                    echo '
                    <p id="erreur">
                        nom d\'utilisateur ou de mot de passe incorrect.
                    </p>';
                }
            ?>
            <form method="POST" action="login.php">
                <table align="center">
                    <tr>
                        <td>Nom d'utilisateur</td>
                        <td>
                            <input type="text" name="fnom_utilisateur"/>                               
                        </td>
                    </tr>
                    <tr>
                        <td>Mot de passe</td>
                        <td>
                            <input type="password" name="fmot_passe"/>                               
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Connexion"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>