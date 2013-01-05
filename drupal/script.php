<?php
/******************************************************************************/
/*                                                                            */
/*                       __        ____                                       */
/*                 ___  / /  ___  / __/__  __ _____________ ___               */
/*                / _ \/ _ \/ _ \_\ \/ _ \/ // / __/ __/ -_|_-<               */
/*               / .__/_//_/ .__/___/\___/\_,_/_/  \__/\__/___/               */
/*              /_/       /_/                                                 */
/*                                                                            */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Titre          : modifier en masse le préfixe du nom de tables mysql       */
/*                                                                            */
/* URL            : http://www.phpsources.org/scripts303-MySQL.htm            */
/* Auteur         : forty                                                     */
/* Date édition   : 19 Sept 2008                                              */
/* Website auteur : http://www.toplien.fr/                                    */
/*                                                                            */
/******************************************************************************/

$sql_serveur = "mysql5-11.pro"; // Serveur mySQL 
$sql_base = "dreamdeswpmela"; // Base de données mySQL 
$sql_login = "dreamdeswpmela"; // Login de connection a mySQL 
$sql_password = "TDKsony700"; // Mot de passe pour mySQL

$prefix_old = '';
$prefix_new = 'ulv_';

$lk = @mysql_connect($sql_serveur, $sql_login, $sql_password) or die(mysql_error
());
@mysql_select_db($sql_base, $lk) or die(mysql_error());

$q = mysql_query("SHOW TABLES LIKE '" . $prefix_old . "%'", $lk) or die(
mysql_error());
while (($r = mysql_fetch_row($q)) !== false) {
    $new_name = $prefix_new . substr($r[0], strlen($prefix_old));
    mysql_query("RENAME TABLE `" . $r[0] . "`  TO `" . $new_name . "` ;", $lk) 
or die(mysql_error());
    echo $r[0] . ' => ' . $new_name . "<br>\n";
}
?>