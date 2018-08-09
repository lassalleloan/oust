<!DOCTYPE html>
<?php
    include ('includes/include.php');
    
    if (!isset($_SESSION['semploye_id']))
    {
       // header('location:index.php?qError=usernamePassword');
       // exit();
    }
    
    extract(@$_POST);
?>

<html lang="fr">
    <head>
        <title>Oust - Missions</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id="wrapper" class="missions">
            <h2>Missions</h2>
			<hr>
            <table align="center">
                <tr>
                    <th>Nom client</th>
                    <th>Pr&eacutenom client</th>
                    <th>Rue</th>
                    <th>N°</th>
                    <th>Code postal</th>
                    <th>Localite</th>
                    <th>Commune</th>
                    <th>Canton</th>
                    <th>D&eacutech&eacutetterie</th>
                </tr>
                <?php
                    $reqSQL = 'SELECT nom,
                                      prenom,
                                      adresse_rue,
                                      adresse_numero,
                                      adresse_code_postal,
                                      localite,
                                      commune,
                                      canton,
                                      dechetterie
                                FROM
                                    localite AS loc
                                        INNER JOIN
                                    commune AS com ON loc.commune_id = com.commune_id
                                        INNER JOIN
                                    dechetterie AS dech ON loc.dechetterie_id = dech.dechetterie_id
                                        INNER JOIN
                                    client AS c ON loc.localite_id = c.localite_id
                                WHERE
                                     TIMESTAMPDIFF(day, c.prochain_passage,"'.$fmission_id.'") = 0
                                     AND loc.localite_id='.$flocalite_id.';';
                                     
                         
                    
                    $resSQL = connexion($reqSQL, 'select');
                    
                    while ($ligneSQL = $resSQL->fetch())
                    {
                        echo '
                            <tr>
                                <td>'.$ligneSQL['nom'].'</td>
                                <td>'.$ligneSQL['prenom'].'</td>
                                <td>'.$ligneSQL['adresse_rue'].'</td>
                                <td>'.$ligneSQL['adresse_numero'].'</td>
                                <td>'.$ligneSQL['adresse_code_postal'].'</td>
                                <td>'.$ligneSQL['localite'].'</td>
                                <td>'.$ligneSQL['commune'].'</td>
                                <td>'.$ligneSQL['canton'].'</td>
                                <td>'.$ligneSQL['dechetterie'].'</td>
                            </tr>';
                    }
                ?>
            </table>
        </div>
    </body>
</html>
