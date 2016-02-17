<?php

/**
 * A One Step View is good for a simple chunk of code you need to output
 */

/**
*
* you can wrap your data in some HTML
* or you can push the data into a variable
* and display it in a HERE DOC
*/
/*
echo '<h3>Customer List - A One Step View</h3><ul>';
foreach ($this->customers as $cust) {
    $id = $this->escape()->html($cust['customer_id']);
    $fname = $this->escape()->html($cust['first_name']);
    $lname = $this->escape()->html($cust['last_name']);
    echo "<li id='{$id}'> {$lname}, {$fname}</li>";
  }
  echo '</ul>';
  */

$customerList = null;
  foreach ($this->customers as $cust) {
    $id = $this->escape()->html($cust['customer_id']);
    $fname = $this->escape()->html($cust['first_name']);
    $lname = $this->escape()->html($cust['last_name']);
    $customerList .= "<li id='{$id}'> {$lname}, {$fname}</li>";
  }

$output = <<<HTML
  <h3>Customer List - A One Step View</h3>
  <ul>
  $customerList
  </ul>
HTML;

echo $output;
?>
