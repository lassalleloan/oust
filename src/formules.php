<!DOCTYPE html>
<?php
    include ('includes/include.php');
    
    if (!isset($_SESSION['semploye_id']))
    {
       // header('location:index.php?qError=usernamePassword');
       // exit();
    }
    
    extract(@$_GET);
?>

<html lang="fr">
    <head>
        <title>Oust - Formules</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id ="wrapper" class="formules">
            <h2>Formules</h2>
            <hr>
            <?php
                if (isset($ajout_formule_id))
                {
                    echo '<p id="erreur">
                            La formule '.$ajout_formule_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_formule_id))
                {
                    echo '<p id="erreur">
                            La formule '.$mod_formule_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_formule_id))
                {
                    echo '<p id="erreur">
                            La formule '.$suppr_formule_id.' a bien été supprimé.
                          </p>';
                }
            ?>
            <table align="center">
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Dur&eacutee (mois)</th>
                    <th>Prix</th>
                    <th>Nombre de passage(par mois)</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *
                               FROM formule';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while (($ligneSQL = $resSQL->fetch()))
                    {
                        echo '<tr>
                              <td>'.$ligneSQL['formule_id'].'</td>
                              <td>'.$ligneSQL['type'].'</td>
                              <td>'.$ligneSQL['duree_mois'].'</td>
                              <td>'.$ligneSQL['prix'].'</td>
                              <td>'.$ligneSQL['nombre_passage_mois'].'</td>
                                    <td>
                                        <a href="gestionFormules.php?formule_id='.$ligneSQL['formule_id'].'"">
                                            Modifier
                                        </a>
                                        <br/>
                                        <a href="suppressionFormules.php?formule_id='.$ligneSQL['formule_id'].'">
                                            Supprimer
                                        </a>
                                    </td>
                              </tr>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>
