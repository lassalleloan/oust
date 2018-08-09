<!DOCTYPE html>
<?php
    include ('includes/include.php');
    
    if (!isset($_SESSION['semploye_id']))
    {
        //header('location:index.php');
        //exit();
    }
    
    extract(@$_GET);
?>

<html lang="fr">
    <head>
        <title>Oust - Bo&icirctes</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
	 <?php include 'menu.php'; ?>
        <div id="wrapper">
            <?php
                if(isset($mission_id))
                {
                    $Action = 'Modification missions';
                    
                    $reqSQL = 'SELECT *
                               FROM mission
                               WHERE mission_id="'.$mission_id.'"
                               AND employe_id="'.$employe_id.'"
                               AND localite_id="'.$localite_id.'";';
                    $resSQL = connexion($reqSQL, 'select');
                    $ligneSQL = $resSQL->fetch();
                    
                    $file = 'updateMissions.php?mission_id='.$ligneSQL['mission_id'].'&employe_id='.$ligneSQL['employe_id'].'&localite_id='.$ligneSQL['localite_id'];
                }
                else
                {
                    $Action = 'Ajout missions';
                    $file = 'ajoutMissions.php';
                }
                
                echo '<h2>'.$Action.'</h2>';
            ?>
            <form method="post" action="<?php echo @$file; ?>">
                <table>
                    <tr>
                        <td>Localité</td>
                        <td>
                            <select name="flocalite_id">
                            <?php
                                $reqSQL1 = 'SELECT *
                                            FROM localite';
                                $reqSQL1 = connexion($reqSQL1, 'select');
                                
                                while ($ligneSQL1 = $reqSQL1->fetch())
                                {
                                    if(isset($localite_id) && $ligneSQL1['localite_id'] == $localite_id)
                                        $selected = ' selected';
                                    else
                                        $selected = '';
                                        
                                    echo '<option value="'.$ligneSQL1['localite_id'].'" '.$selected.'>'.$ligneSQL1['localite'].'</option>';
                                }	
                            ?>
                            </select>
                        </td>
                        <td>Employé</td>
                        <td>
                            <select name="femploye_id">
                            <?php
                                $reqSQL1 = 'SELECT *
                                            FROM employe';
                                $reqSQL1 = connexion($reqSQL1, 'select');
                                
                                while ($ligneSQL1 = $reqSQL1->fetch())
                                {
                                    if(isset($employe_id) && $ligneSQL1['employe_id'] == $employe_id)
                                        $selected = ' selected';
                                    else
                                        $selected = '';
                                    
                                    echo '<option value="'.$ligneSQL1['employe_id'].'" '.$selected.'>'.$ligneSQL1['nom'].' '.$ligneSQL1['prenom'].'</option>';
                                }	
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Véhicule</td>
                        <td>
                            <select name="fvehicule_id">
                            <?php
                                $reqSQL1 = 'SELECT *
                                            FROM vehicule';
                                $reqSQL1 = connexion($reqSQL1, 'select');
                                
                                while ($ligneSQL1 = $reqSQL1->fetch())
                                {
                                    if(isset($ligneSQL['vehicule_id']) && $ligneSQL1['vehicule_id'] == $ligneSQL['vehicule_id'])
                                        $selected = ' selected';
                                    else
                                        $selected = '';
                                    
                                    echo '<option value="'.$ligneSQL1['vehicule_id'].'" '.$selected.'>'.$ligneSQL1['plaque'].' '.$ligneSQL1['modele'].'</option>';
                                }	
                            ?>
                            </select>
                        </td>
                        <td>Distance parcourue (km)</td>
                        <td>
                            <input type="text" name="distance_parcourue_km"
                                <?php
                                    if(isset($mission_id))
                                        echo 'value="'.$ligneSQL['distance_parcourue_km'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Durée (heures)</td>
                        <td>
                            <input type="text" name="fduree_heure"
                                <?php
                                    if(isset($mission_id))
                                        echo 'value="'.$ligneSQL['duree_heure'].'"';
                                ?>
                            /> 
                        </td>
                    </tr>
                    <tr>
                        <td>Remarques</td>
                        <td colspan="4">
                            <textarea name="fremarques" rows="5" cols="70"><?php 
                                if(isset($mission_id))
                                    echo $ligneSQL['remarques']; ?></textarea> 
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left">
                            <input type="submit" name="action"
                                <?php 
                                    if(isset($mission_id))
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
