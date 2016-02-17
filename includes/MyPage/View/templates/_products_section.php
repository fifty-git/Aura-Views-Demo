<?php

foreach ($this->products as $prod) {
  $id = $this->escape()->html($prod['product_id']);
  $prodNum = $this->escape()->html($prod['product_number']);
  $prodName = $this->escape()->html($prod['product_name']);
  $prods .= "<li id='{$id}'> {$prodNum}, {$prodName}</li>";
}
// begin buffering output for a named section
$this->beginSection('products');

echo "<ul>";
echo $prods;
echo "</ul>";

// end buffering and capture the output
$this->endSection();


?>
