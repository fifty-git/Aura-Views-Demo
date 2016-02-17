<?php
/**
 * Partials View AKA: reusable part
 * this is the data part of a "partial or sub-template view"
 * it doesn't output data to the screen, it gathers data from the model record set
 * it's called by the second part of the "partial", in this case customers_2.php
 */
$id = $this->escape()->html($cust['customer_id']);
$fname = $this->escape()->html($cust['first_name']);
$lname = $this->escape()->html($cust['last_name']);
//NOTE: you always must echo the data to pass it to the render part of the partial
echo "<li id='{$id}'> {$lname}, {$fname}</li>";
?>
