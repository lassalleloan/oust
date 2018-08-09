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
        <title>Oust - Contrats</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id ="wrapper" class="contrats">
            <h2>Contrats</h2>
            <hr>
            <?php
                if (isset($ajout_contrat_id))
                {
                    echo '<p id="erreur">
                            Le contrat '.$ajout_contrat_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_contrat_id))
                {
                    echo '<p id="erreur">
                            Le contrat '.$mod_contrat_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_contrat_id))
                {
                    echo '<p id="erreur">
                            Le contrat '.$suppr_contrat_id.' a bien été supprimé.
                          </p>';
                }
            ?>
            <table align="center">
                <tr>
                    <th>ID</th>
                    <th>Date de cr&eacuteation</th>
                    <th>Client</th>
                    <th>Mode de paiement</th>
					<th>Pay&eacute</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *
                               FROM contrat AS co
							   INNER JOIN prestation AS p
							   ON co.contrat_id = p.contrat_id
							   INNER JOIN client AS cl
							   ON p.client_id = cl.client_id;';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while (($ligneSQL = $resSQL->fetch()))
                    {
                        echo '<tr >
                                <td>'.$ligneSQL['contrat_id'].'</td>
                                <td>'.timestampToDate($ligneSQL['date_creation']).'</td>
                                <td>'.$ligneSQL['nom'].' '.$ligneSQL['prenom'].'</td>
                                <td>'.$ligneSQL['mode_paiement'].'</td>
                                <td>'.$ligneSQL['paye'].'</td>
                                <td>
                                    <a href="gestionContrats.php?contrat_id='.$ligneSQL['contrat_id'].'">
                                        Modifier
                                    </a>
                                    <br/>
                                    <a href="suppressionContrats.php?contrat_id='.$ligneSQL['contrat_id'].'">
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
