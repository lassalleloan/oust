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
        <title>Oust - Prestation</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id="wrapper">
        <h2>Ajout prestation</h2>
        <hr>
            <form method="post" action="ajoutPrestations.php?contrat_id=<?php echo $contrat_id; ?>&client_id=<?php echo $client_id; ?>">
                <table align="center">
                    <th>Client</th>
                    <th>Formule</th>
                    <th>Date de début</th>
                    <tr>
                        <td>
                            <?php
                                $reqSQL = 'SELECT nom, prenom
                                           FROM client
                                           WHERE client_id='.$client_id.';';
                                $resSQL = connexion($reqSQL, 'select');
                                $ligneSQL = $resSQL->fetch();
                                
                                echo $ligneSQL['nom'].' '.$ligneSQL['prenom'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $reqSQL = 'SELECT *
                                           FROM formule;';
                                $resSQL = connexion($reqSQL, 'select');
                                echo '<select name="fformule_id">';
                                while (($ligneSQL = $resSQL->fetch()))
                                {
                                    echo '<option value="'.$ligneSQL['formule_id'].'">'.$ligneSQL['type'].',
                                         '.$ligneSQL['duree_mois'].' mois, '.$ligneSQL['prix'].' CHF,
                                         '.$ligneSQL['nombre_passage_mois'].' passages par mois</option>';
                                }
                                echo '</select>';
                            ?>
                        </td>
                    <td>
                        <input type="date" name="fdebut"/>
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left">
                            <input type="submit" name="action" value="Ajouter"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
