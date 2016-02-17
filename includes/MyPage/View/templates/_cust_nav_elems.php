<?php
/**
 * This is the data portion of a two step view
 * the companion layout file is layouts/customer_nav.php
 */
foreach ($this->cust_fnames as $cust) {
  $fname = $this->escape()->html($cust['first_name']);
  echo "<li><a href=\"#\">{$fname}</a></li>\n";
}
?>
