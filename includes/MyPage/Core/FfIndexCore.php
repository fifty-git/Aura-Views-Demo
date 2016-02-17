<?php
// set the base path of the location of your project folder
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/aura_views_demo');

require_once BASE_PATH . '/includes/MyPage/Model/FfIndexModel.php';
require_once BASE_PATH . '/src/lib/FfViewsLib.php';

class FfIndexCore
{
  private $indexModel = null;
  private $indexView = null;
  private $templatePath = BASE_PATH . '/includes/MyPage/View/templates';
  private $layoutPath = BASE_PATH . '/includes/MyPage/View/layouts';

  public function __construct()
  {
    $this->indexModel = new FfIndexModel();
    $this->indexView = new FfIndexView();
  }

  public function getCustomerData()
  {
    $resultArray = $this->indexModel->getCustomers();
    return $resultArray;
  }

  public function getProductData()
  {
    $resultArray = $this->indexModel->getProducts();
    return $resultArray;
  }

  public function getTestimonialsData()
  {
    $resultArray = $this->indexModel->getTestimonials();
    return $resultArray;
  }

  /**
   * This is an example of calling a ONE STEP view
   */
  public function customerListView()
    {
      // get data from model
      $modelData = $this->getCustomerData();
      // put modelData into a named array for view to iterate over
      $sendArray['customers'] = $modelData;
      // the name of the view template file and registered view name
      $viewName = 'customers_1';
      // call the view factory and registration
      $output = $this->indexView->oneStepView($viewName, $sendArray, $this->templatePath);

      return $output;

    }

    /**
     * This is a sample of calling a two part "partial" or "sub-template" view
     */
    public function buildCustomerPartial()
    {
      // get data from model
      $modelData = $this->getCustomerData();
      // package data in a named array for view to iterate over
      $sendArray['cust'] = $modelData;
      // the name of the view template file and registered view name
      $mainViewName = 'customers_2';
      // the name of the view template file and registered view name
      $subViewName = '_cust_part';
      // call the view factory and registration
      $output = $this->indexView->subTemplateView($mainViewName, $subViewName, $sendArray, $this->templatePath);

      return $output;

    }

    /**
     * This is a sample of a Two Step View using a data template and a layout template
     */
    public function buildCustomerLayoutView()
    {
      // get data from model
      $modelData = $this->getCustomerData();
      // package data in a named array for view to iterate over
      $sendArray['cust_fnames'] = $modelData;
      // the name of the view template file and registered view name
      $mainViewName = '_cust_nav_elems';
      // the name of the layout template file and registered layout name
      $layoutName = 'customer_nav';
      // call the view factory and registration
      $output = $this->indexView->twoStepView($mainViewName, $layoutName, $sendArray, $this->templatePath, $this->layoutPath);

      return $output;
    }

    /**
     * This is a sample of a TWO STEP view
     * using sections
     */
    public function buildProductsView()
    {
      // get data from model
      $modelData = $this->getProductData();
      // package data in a named array for view to iterate over
      $sendArray['products'] = $modelData;
      // the name of the view template file and registered view name
      $mainViewName = '_products_section';
      // the name of the layout template file and registered layout name
      $layoutName = 'products_layout';
      // call the view factory and registration
      $output = $this->indexView->twoStepView($mainViewName, $layoutName, $sendArray, $this->templatePath, $this->layoutPath);

      return $output;
    }




}
