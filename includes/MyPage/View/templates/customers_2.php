<?php
/**
 * Second part of the "partial or sub-template"
 * In the render function it calls the data frorm a sub-template
 * This is how you can reuse a partial sub-template.
 * the code below can be called in multiple pages, but you only have to build the sub-template once
 */

echo '<h3>Customer List Using Partial View</h3><ol>';
foreach ($this->cust as $cust) {
  echo $this->render('_cust_part', array(
    'cust' => $cust,
  ));
}
echo '</ol>';


?>
