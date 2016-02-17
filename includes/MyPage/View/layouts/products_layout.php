<?php

$products = $this->getSection('products');

$output = <<<HTML
<div class="products-list">
<h3>Products</h3>
$products
</div>
HTML;

echo $output;
?>
