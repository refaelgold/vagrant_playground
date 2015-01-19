<?php
/**
 * Created by PhpStorm.
 * User: refaelgold
 * Date: 9/24/14
 * Time: 10:20 AM
 */

$pdo = new PDO('mysql:host=localhost;dbname=playground', 'root', '123');
$select = 'SELECT Pos,Model,Price,Image';
$from = ' FROM Cars';
$where = ' WHERE TRUE';
$order_by=' ORDER BY Pos';


$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');

if (in_array("is_asian", $opts)){
	$where .= " AND is_asian = 1";
}
if (in_array("is_american", $opts)){
	$where .= " AND is_american = 1";
}



$sql = $select . $from . $where . $order_by;
$statement = $pdo->prepare($sql);
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$pdo = null;//close connection
$json=json_encode($results);
echo($json);
