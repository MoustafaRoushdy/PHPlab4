<?php

$intro = "<p>The price of the singe cat eye is:$price"
        ."However, the average price of all glasses is $average";
echo $intro;


if($is_existed)
{
    echo "<h5> we do have oval galsses </h5>";
}

    echo "<h3> Glasses made in Ahmerica are </h3><ul>";
    
    
    foreach ($american_products as $item)
    {
        echo "<li>$item</li>";
    }
    
    echo "</ul>";