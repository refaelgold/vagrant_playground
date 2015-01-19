<?php
/**
 * Created by PhpStorm.
 * User: refaelgold
 * Date: 9/24/14
 * Time: 10:20 AM
 */

$pdo = new PDO('mysql:host=localhost;dbname=playground', 'root', '123');
$select = 'SELECT Continent';
$from = ' FROM Cars';
$where = ' WHERE TRUE';


$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');

if (in_array("is_asian", $opts)){
	$where .= " AND is_asian = 1";
}
if (in_array("is_american", $opts)){
	$where .= " AND is_american = 1";
}



$sql = $select . $from . $where;
$statement = $pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;//close connection
$json=json_encode($results);
echo($json);
