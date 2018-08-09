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
        <title>Oust - Véhicule</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id="wrapper">
            <?php
                if(isset($vehicule_id))
                {
                    $Action = 'Modification véhicule';
                    
                    $reqSQL = 'SELECT *
                               FROM vehicule
                               WHERE vehicule_id="'.$vehicule_id.'";';
                    $resSQL = connexion($reqSQL, 'select');
                    $ligneSQL = $resSQL->fetch();
                    
                    $fileVehicule = 'updateVehicules.php?vehicule_id='.$vehicule_id;
                }
                else
                {
                    $Action = 'Ajout véhicule';
                    $fileVehicule = 'ajoutVehicules.php';
                }
                
                echo '<h2>'.$Action.'</h2>';
            ?>
			<hr>
            <form method="post" action="<?php echo @$fileVehicule; ?>">
                <table>
                    <tr>
                        <td>Plaque</td>
                        <td>
                            <input type="text" name="fplaque"
                                <?php
                                    if(isset($vehicule_id))
                                        echo ' value="'.$ligneSQL['plaque'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Modèle</td>
                        <td>
                            <input type="text" name="fmodele"
                                <?php 
                                    if(isset($vehicule_id))
                                        echo ' value="'.$ligneSQL['modele'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Kilométrage</td>
                        <td>
                            <input type="text" name="fkilometrage"
                                <?php 
                                    if(isset($vehicule_id))
                                        echo ' value="'.$ligneSQL['kilometrage'].'"';
                                ?>
                            />
                        </td>
                    <tr>
                        <td></td>
                        <td align="left">
                            <input type="submit" name="button" 
                                <?php 
                                    if(isset($vehicule_id))
                                        echo ' value="Modifier"';
                                    else
                                        echo ' value="Ajouter"';
                                ?>
                            />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
