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
        <div id="wrapper">
            <?php
                if(isset($contrat_id))
                {
                    $ActionContrat = 'Modification contrat';
                    
                    $reqSQL = 'SELECT *
                               FROM contrat
                               WHERE contrat_id="'.$contrat_id.'";';
                    $resSQL = connexion($reqSQL, 'select');
                    $ligneSQL = $resSQL->fetch();
                    
                    $fileContrat = 'updateContrats.php?contrat_id='.$contrat_id;
                }
                else
                {
                    $ActionContrat = 'Ajout contrat';
                    
                    $reqSQL = 'SELECT *
                               FROM contrat;';
                    $resSQL = connexion($reqSQL, 'select');
                    
                    $fileContrat = 'ajoutContrats.php';
                    
                    if (isset($client_id))
                        $fileContrat = $fileContrat.'?client_id='.$client_id;
                }
                
                echo '<h2>'.$ActionContrat.'</h2><hr>';
            ?>
            <form method="post" action="<?php echo $fileContrat; ?>">
                <table>
                    <tr>
                        <td>Date de création</td>
                        <td>
                            <input readonly type="text" name="fdate_creation"
                                <?php
                                    if(isset($contrat_id))
                                        echo ' value="'.$ligneSQL['date_creation'].'"';
                                    else
                                        echo ' value="'.date("Y-m-d H:i:s").'"';
                                ?>
                            />
                        </td>
                        <td>&nbsp;</td>
                    
                    </tr>
                    <tr>
                        <td>Mode de paiement</td>
                        <td>
                            <select name="fmode_paiement">
                                <option value="aucun"
                                    <?php
                                        if (isset($contrat_id) && $ligneSQL['mode_paiement'] == 'aucun')
                                            echo ' selected';
                                    ?>
                                    >aucun</option>
                                <option value="carte bancaire"
                                    <?php
                                        if (isset($contrat_id) && $ligneSQL['mode_paiement'] == 'carte bancaire')
                                            echo ' selected';
                                    ?>
                                    >carte bancaire</option>
                                <option value="espèces"
                                    <?php
                                        if (isset($contrat_id) && $ligneSQL['mode_paiement'] == 'espèces')
                                            echo ' selected';
                                    ?>
                                    >espèces</option>
                                <option value="prélèvement automatique"
                                    <?php
                                        if (isset($contrat_id) && $ligneSQL['mode_paiement'] == 'prélèvement automatique')
                                            echo ' selected';
                                    ?>
                                    >prélèvement automatique</option>
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>Paye</td>
                        <td>
                            <select name="fpaye">
                                <option value="0"
                                    <?php
                                        if (isset($contrat_id) && $ligneSQL['paye'] == 0)
                                            echo ' selected';
                                    ?>
                                    >Non</option>
                                <option value="1"
                                    <?php
                                        if (isset($contrat_id) && $ligneSQL['paye'] == 1)
                                            echo ' selected';
                                    ?>
                                    >Oui</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left">
                            <input type="submit" name="action"
                                <?php 
                                    if(isset($contrat_id))
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
