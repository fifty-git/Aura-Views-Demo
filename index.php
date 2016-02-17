<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once $_SERVER['DOCUMENT_ROOT'].'/aura_views_demo/includes/MyPage/Core/FfIndexCore.php';
$indexCoreInstance = new FfIndexCore();

$customerList = $indexCoreInstance->customerListView();
$customerList2 = $indexCoreInstance->buildCustomerPartial();
$products = $indexCoreInstance->buildProductsView();
$nav = $indexCoreInstance->buildCustomerLayoutView();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Aura Views Demo</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style media="screen">
        body {
          margin: 0; padding: 0;
          border-top: 10px solid navy;
        }
        .wrapper {
          max-width: 960px;
          margin: 0 auto;
        }
        .navlist li {
          display: inline;
          list-style-type: none;
          padding-right: 20px;
        }
        .navlist li a {
          color: red;
        }
        </style>
    </head>
    <body>
      <div class="wrapper">
      <h1>Demo Views</h1>
      <div class="nav-wrapper">
        <?= $nav ?>
      </div>
      <div class="customer-list">
        <?= $customerList ?>
      </div>

      <div class="products-list">
        <?= $products ?>
      </div>
      <div class="customer-list-2">
        <?= $customerList2 ?>
      </div>

    </div><!-- /wrapper -->

    </body>
</html>
