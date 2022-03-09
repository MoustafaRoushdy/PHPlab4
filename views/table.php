<?php


echo "<table border='1'>";
$record_index = 0 ; 
foreach ($all_records as $item)
{
    if($record_index === 0)
    {
        echo "<tr>";
        
        echo "<td>Name</td>";
        echo "<td>Price</td>";
        echo "<td>Country</td>";
        echo "<td>Image</td>";

        echo "</tr>";
    }
    
        echo "<tr>";
        $image = explode(".",$item->Photo);
        $image = $image[0]."tz".".png";
        $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $current_url = explode("?",$current_url)[0];
        $details = $current_url."?glass=".$item->id;
        
        echo "<td>$item->product_name</td>";
        echo "<td>$item->list_price</td>";
        echo "<td>$item->CouNtry</td>";
        echo "<td><img src='images/".$image."'></td>";
        echo "<td><a  href= '".$details."'>more</a></td>";

        
        echo "</tr>";
        $record_index ++;
}
echo"</table>";
?>

<div>
    <a href="<?php echo $prev_link; ?>"> prev </a> | <a href = "<?php echo $next_link; ?>"> next>> </a>
</div>
