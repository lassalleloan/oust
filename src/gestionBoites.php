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
			    
                if(isset($boite_id))
                {
                    $Action = 'Modification Bo&icirctes';
                    
                    $reqSQL = 'SELECT *
                               FROM client AS c
                               RIGHT JOIN boite AS b
                               ON c.client_id = b.client_id
                               WHERE boite_id="'.$boite_id.'";';
                    $resSQL = connexion($reqSQL, 'select');
                    $ligneSQL = $resSQL->fetch();
                    
                    $file = 'updateBoite.php?boite_id='.$boite_id;
                }
                else
                {
                    $Action = 'Ajout bo&icircte';
                    $file = 'ajoutBoites.php';
                }
                
                echo '<h2>'.$Action.'</h2>';
            ?>
            <form method="post" action="<?php echo @$file; ?>">
                <table>
                    <tr>
                        <td>Format</td>
                        <td>
                            <input type="text" name="fformat"
                                <?php
                                    if(isset($boite_id))
                                        echo ' value="'.$ligneSQL['format_boite'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Prix</td>
                        <td>
                            <input type="text" name="fprix"
                                <?php 
                                    if(isset($boite_id))
                                        echo ' value="'.$ligneSQL['prix'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <?php
                        if (isset($boite_id))
                        {
                            echo '<tr>
                                  <td>Client</td>
                                  <td>
                                  <select name="fclient_id" id="prenom">';
                                    
                            $reqSQL1 = 'SELECT client_id, nom, prenom
                                        FROM client';
                            $resSQL1 = connexion($reqSQL1, 'select');
                            
                            while ($ligneSQL1 = $resSQL1->fetch())
                            {
                                echo '<option value="'.$ligneSQL1['client_id'].'">'.$ligneSQL1['nom'].','.$ligneSQL1['prenom'].'</option>';
                            }

							echo '</select>
                                  </td>
                                  <td>&nbsp;</td>
                                    <td>Etat</td>
                                        <td>
                                            <select name="fetat" id="etat">
                                                <option value="en stock"';
                            if (isset($boite_id) && $ligneSQL['etat'] == 'en stock')
                                echo ' selected';
                            echo '>en stock</option><option value="louée"';
                            if (isset($boite_id) && $ligneSQL['etat'] == 'louée')
                                echo ' selected';
                            echo '>louée</option><option value="achetée"';
                            if (isset($boite_id) && $ligneSQL['etat'] == 'achetée')
                                echo ' selected';
                            echo '>achetée</option>
                                  </select>
                                  </td>
                        
                       
                    </tr>
                    <tr>
                        <td>Date pret</td>
                        <td>
                            <input type="text" name="fpret"';
                               
                                    if(isset($boite_id))
                                        echo ' value="'.$ligneSQL['date_pret'].'"';
                               
                      echo'      />
                        </td>';}
                         ?>
                    </tr>
                        <td></td>
                        <td align="left">
                            <input type="submit" name="button"
                                <?php 
                                    if(isset($boite_id))
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
