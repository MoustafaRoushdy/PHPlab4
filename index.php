<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "hello Isco";


session_start();
require_once("vendor/autoload.php");
echo "hello Isco";


use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;
$capsule->addConnection([
    "driver"=>_driver_,
    "host"=>_host_,
    "database"=>_database_,
    "username"=>_username_,
    "password"=>_password_
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && ($_GET["index"] > 0)) ? (int)$_GET["index"]:0;
$all_records = Capsule::table("items")->skip($index)->take(_pager_size_)->get();
$glasses =   Capsule::table('items')->first();
$searched_glasses = Capsule::table("items")->find(91);
$USA_glasses = Capsule::table("items")->where("country","=", "USA")->get();
$USA_glasses_count = Capsule::table("items")->where("country","=", "USA")->count();
$next_index = $index + 5; 
$next_link = "http://localhost/php/lect/Day4/Resources/?index=".$next_index;
$prev_index = ($index- _pager_size_ >= 0)?$index-_pager_size_ :0;
$prev_link = "http://localhost/php/lect/Day4/Resources/?index=$prev_index";

require_once ('views/table.php');
?>

