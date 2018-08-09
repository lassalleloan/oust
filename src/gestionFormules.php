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
        <div id="wrapper">
            <?php
                if(isset($formule_id))
                {
                    $ActionClient = 'Modification Formules';
                    
                    $reqSQL = 'SELECT *
                               FROM formule
                               WHERE formule_id="'.$formule_id.'";';
                    $resSQL = connexion($reqSQL, 'select');
                    $ligneSQL = $resSQL->fetch();
                    
                    $fileFormule = 'updateFormules.php?formule_id='.$formule_id;
                }
                else
                {
                    $ActionClient = 'Ajout Formule';
                    $fileFormule = 'ajoutFormules.php';
                }
                
                echo '<h2>'.$ActionClient.'</h2><hr>';
            ?>
           <form method="post" action="<?php echo @$fileFormule; ?>">
                <table>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="ftype"
                                <?php
                                    if(isset($formule_id))
                                        echo ' value="'.$ligneSQL['type'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Dur&eacutee</td>
                        <td>
                            <input type="text" name="fduree_mois"
                                <?php 
                                    if(isset($formule_id))
                                        echo ' value="'.$ligneSQL['duree_mois'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr>
                        <td>Prix</td>
                        <td>
                            <input type="text" name="fprix"
                                <?php 
                                    if(isset($formule_id))
                                        echo ' value="'.$ligneSQL['prix'].'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                        <td>Nombre de passage (mois)</td>
                        <td>
                            <input type="text" name="fnombre_passage_mois"
                                <?php 
                                    if(isset($formule_id))
                                        echo ' value="'.$ligneSQL['nombre_passage_mois'].'"';
                                ?>
                            />
                        </td>
                    </tr>
                    <tr>
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
