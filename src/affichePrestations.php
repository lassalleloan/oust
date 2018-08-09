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
        <title>Oust - Prestations</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id ="wrapper" class="prestations">
            <h2>Prestations</h2>
            <hr>
            <?php
                if (isset($ajout_contrat_id))
                {
                    echo '<p id="erreur">
                            La prestation '.$ajout_prestation_id.' a bien été ajouté.
                          </p>';
                }
                else if (isset($mod_prestation_id))
                {
                    echo '<p id="erreur">
                            La prestation '.$mod_contrat_id.' a bien été modifié.
                          </p>';
                }
                else if (isset($suppr_prestation_id))
                {
                    echo '<p id="erreur">
                            La prestation du client '.$suppr_prestation_id.' a bien été supprimé.
                          </p>';
                }
            ?>
            <table align="center">
                <tr>
					<th>Date de cr&eacuteation</th>
                    <th>Nom</th>
                    <th>Pr&eacutenom</th>
					<th>Mode de paiement</th>
					<th>Pay&eacute?</th>
					<th>D&eacutebut</th>
					<th>Fin</th>
					<th>Formule</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT *
                               FROM contrat_prestation_client';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while (($ligneSQL = $resSQL->fetch()))
                    {
                        echo '<tr >
								<td>'.timestampToDate($ligneSQL['date_creation']).'</td>
                                <td>'.$ligneSQL['nom'].'</td>
								<td>'.$ligneSQL['prenom'].'</td>
								<td>'.$ligneSQL['mode_paiement'].'</td>
                                <td>'.$ligneSQL['paye'].'</td>
                                <td>'.timestampToDate($ligneSQL['debut']).'</td>
                                <td>'.timestampToDate($ligneSQL['fin']).'</td>
								 <td>'.$ligneSQL['type'].'</td>
								<td>
                                    <a href="suppressionPrestations.php?contrat_id='.$ligneSQL['contrat_id'].'&client_id='.$ligneSQL['client_id'].'">
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
