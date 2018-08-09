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
        <title>Oust - Clients</title>
        <link href="css/oust.css" rel="stylesheet" type="text/css" media="all">
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <div id="wrapper">
            <?php
                if(isset($client_id))
                {
                    $ActionClient = 'Modification client';
                    
                    $reqSQL = 'SELECT *
                               FROM client AS c
                               INNER JOIN localite AS l
                               ON c.localite_id = l.localite_id
                               WHERE client_id="'.$client_id.'";';
                    $resSQL = connexion($reqSQL, 'select');
                    $ligneSQL = $resSQL->fetch();
                    
                    $fileClient = 'updateClients.php?client_id='.$client_id;
                }
                else
                {
                    $ActionClient = 'Ajout client';
                    $fileClient = 'ajoutClients.php';
                }
                
                echo '<h2>'.$ActionClient.'</h2><hr>';
            ?>
            <form method="post" action="<?php echo $fileClient; ?>">
                <table>
                    <tr>
                        <td>Nom</td>
                        <td>
                            <input type="text" name="fnom"
                                <?php
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['nom'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Prénom</td>
                        <td>
                            <input type="text" name="fprenom"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['prenom'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Rue</td>
                        <td>
                            <input type="text" name="fadresse_rue"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['adresse_rue'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>N° Rue</td>
                        <td>
                            <input type="text" name="fadresse_numero"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['adresse_numero'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>NPA</td>
                        <td>
                            <input type="text" name="fadresse_code_postal"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['adresse_code_postal'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Localité</td>
                        <td>
                            <?php 
                                if(isset($client_id))
                                {
                                    echo '<input type="text" name="flocalite" readonly value="'.$ligneSQL['localite'].'"/>';
                                }
                                else
                                {
                                    $reqSQL = 'SELECT *
                                               FROM localite;';
                                    $resSQL = connexion($reqSQL, 'select');
                                    echo '<select name="flocalite_id">';
                                    while (($ligneSQL = $resSQL->fetch()))
                                    {
                                        echo '<option value="'.$ligneSQL['localite_id'].'">'.$ligneSQL['localite'].'</option>';
                                    }
                                    echo '</select>';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>N° Téléphone</td>
                        <td>
                            <input type="text" name="fno_telephone"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['no_telephone'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Email</td>
                        <td>
                            <input type="text" name="femail"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['email'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>IBAN</td>
                        <td>
                            <input type="text" name="fiban"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['iban'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Jour de collecte</td>
                        <td>
                            <select name="fjour_collect" id="jourCollect">
                                <option value="Monday"
                                    <?php
                                        if (isset($client_id) && $ligneSQL['jour_collect'] == 'Monday')
                                            echo ' selected';
                                    ?>
                                    >Lundi</option>
                                <option value="Tuesday"
                                    <?php
                                        if (isset($client_id) && $ligneSQL['jour_collect'] == 'Tuesday')
                                            echo ' selected';
                                    ?>
                                    >Mardi</option>
                                <option value="Wednesday"
                                    <?php
                                        if (isset($client_id) && $ligneSQL['jour_collect'] == 'Wednesday')
                                            echo ' selected';
                                    ?>
                                    >Mercredi</option>
                                <option value="Thursday"
                                    <?php
                                        if (isset($client_id) && $ligneSQL['jour_collect'] == 'Thursday')
                                            echo ' selected';
                                    ?>
                                    >Jeudi</option>
                                <option value="Friday"
                                    <?php
                                        if (isset($client_id) && $ligneSQL['jour_collect'] == 'Friday')
                                            echo ' selected';
                                    ?>
                                    >Vendredi</option>
                                <option value="Saturday"
                                    <?php
                                        if (isset($client_id) && $ligneSQL['jour_collect'] == 'Saturday')
                                            echo ' selected';
                                    ?>
                                    >Samedi</option>
                                <option value="Sunday"
                                    <?php
                                        if (isset($client_id) && $ligneSQL['jour_collect'] == 'Sunday')
                                            echo ' selected';
                                    ?>
                                    >Dimanche</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Latitude</td>
                        <td>
                            <input type="text" name="fgps_latitude"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['gps_latitude'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Longitude</td>
                        <td>
                            <input type="text" name="fgps_longitude"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="'.$ligneSQL['gps_longitude'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>Remarques</td>
                        <td colspan="4">
                            <textarea name="fremarques" id="remarques" rows="5" cols="70"><?php 
                                if(isset($client_id))
                                    echo $ligneSQL['remarques']; ?></textarea> 
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left">
                            <input type="submit" name="action"
                                <?php 
                                    if(isset($client_id))
                                        echo ' value="Modifier"';
                                    else
                                        echo ' value="Ajouter client"';
                                ?>
                            />
                        </td>
                        <?php
                            if(!isset($client_id))
                            {
                                echo '<td>&nbsp;</td>';
                                echo '<td>';
                                echo '<input type="submit" name="contrat" value="Ajouter contrat"/>';
                                echo '</td>';
                            }
                        ?>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
