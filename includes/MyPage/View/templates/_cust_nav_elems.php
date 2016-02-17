<?php
foreach ($this->cust_fnames as $cust) {
  $fname = $this->escape()->html($cust['first_name']);
  echo "<li><a href=\"#\">{$fname}</a></li>\n";
}
?>
