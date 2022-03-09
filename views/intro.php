<?php
echo "<h5>.$glasses->product_name</h5>";
echo "<h5>".$glasses->Rating."</h5";


foreach ($glasses as $key=> $value)
{
    echo "<h5>".$key.":".$value."</h5>";
}


foreach ($searched_glasses as $key=> $value)
{
    echo "<h5>".$key.":".$value."</h5>";
}

echo "made in usa ".$USA_glasses_count."glass";

foreach ($USA_glasses as $glass) {
    
    echo"<h4>=======================</h4>";
    
        foreach ($glass as $key=> $value)
          {
        echo "<h5>".$key.":".$value."</h5>";
  }

    
}
