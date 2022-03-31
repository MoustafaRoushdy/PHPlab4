<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once("vendor/autoload.php");
// echo "hello Isco";


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
$table = Capsule::table("items")->get();


$index = (isset($_GET["index"]) && is_numeric($_GET["index"]) && ($_GET["index"] > 0)) ? (int)$_GET["index"]:0;
$all_records = Capsule::table("items")->skip($index)->take(_pager_size_)->get();
$glasses =   Capsule::table('items')->first();
$USA_glasses = Capsule::table("items")->where("country","=", "USA")->get();
$USA_glasses_count = Capsule::table("items")->where("country","=", "USA")->count();
$next_index = $index + 5; 
$next_link = "http://localhost/php/lect/Day4/Resources/?index=".$next_index;
$prev_index = ($index- _pager_size_ >= 0)?$index-_pager_size_ :0;
$prev_link = "http://localhost/php/lect/Day4/Resources/?index=$prev_index";

/*
$price = Capsule::table("items")->where("product_name","like","cat eye")->value("list_price");
$average= Capsule::table("items")->pluck( "list_price")->avg(); 
$average = round($average,3);

if(Capsule::table("items")->where('product_name','like',"oval")->exists())
{
    $is_existed = true;
}
 else 
    
 {
     $is_existed = false;
 }
 
 
 $american_products = Capsule::table("items")
         ->where("CouNtry","like","usa","or")
         ->where("product_name","<>","","or")
         ->pluck("product_name");
 
 */
 
//require_once ('views/single.php');

// if (isset($_GET["glass"]) && is_numeric($_GET["glass"]) && (int)($_GET["glass"]>=0))
// {
//     require_once("views/details.php");
// }
// else
// {
//     require_once ('views/table.php');
// }

$api = new ApiHelper();
if($api->get_method() == "get")
{
    $api->get($table);
}

