<?php
require_once BASE_PATH . '/src/lib/FfSqlModel.php';

/**
 *
 */
class FfIndexModel
{

  function __construct()
  {
    $this->sqlHandler = new FfSqlModel();
  }

  public function getCustomers()
  {
    $sql = "SELECT cc.customer_id,
    cc.last_name,
    cc.first_name
    FROM cart_customers cc
    WHERE cc.last_name LIKE 'D%'
    ORDER BY cc.customer_id ASC
    LIMIT 5";

    $bindValues = array();
    $resultArray = $this->sqlHandler->fetchAll($sql, $bindValues);
    return $resultArray;
  }

  public function getProducts()
  {
    $sql = "SELECT pr.product_id,
    pr.product_name,
    pr.product_number
    FROM cart_products pr
    WHERE pr.product_name LIKE 'A%'
    ORDER BY pr.product_name
    LIMIT 10";

    $bindValues = array();
    $resultArray = $this->sqlHandler->fetchAll($sql, $bindValues);
    return $resultArray;
  }

  public function getTestimonials()
  {
    $sql = "SELECT t.testimonial_id,
    t.testimonial_title,
    t.customer_name
    FROM cart_testimonial t
    ORDER BY t.testimonial_title
    LIMIT 10";

    $bindValues = array();
    $resultArray = $this->sqlHandler->fetchAll($sql, $bindValues);
    return $resultArray;
  }


}
