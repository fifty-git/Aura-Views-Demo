<?php
require_once BASE_PATH . '/src/View/Exception.php';
require_once BASE_PATH . '/src/View/Exception/TemplateNotFound.php';
require_once BASE_PATH . '/src/View/Exception/HelperNotFound.php';
require_once BASE_PATH . '/src/View/Exception/InvalidHelpersObject.php';
require_once BASE_PATH . '/src/View/AbstractView.php';
require_once BASE_PATH . '/src/View/HelperRegistry.php';
require_once BASE_PATH . '/src/View/TemplateRegistry.php';
require_once BASE_PATH . '/src/View/View.php';
require_once BASE_PATH . '/src/View/ViewFactory.php';

// include Aura Html Module
require_once BASE_PATH . '/src/lib/FfHtmlLib.php';

class FfIndexView
{
  private $baseView = null;
  private $view = null;
  private $viewObj = null;
  private $view_factory = null;
  private $view_registry = null;
  private $layout_registry = null;
  private $helpers = null;
  private $helpers_factory = null;

  function __construct()
  {
    $this->helpers_factory = new Aura\Html\HelperLocatorFactory;
    $this->helpers = $this->helpers_factory->newInstance();

    $this->view_factory = new Aura\View\ViewFactory;
    $this->view = $this->view_factory->newInstance($this->helpers);
  }

  public function getViewObj()
  {
    return $this->view;
  }

  public function oneStepView($viewName, $sendArray, $templatePath)
  {
    $this->view_registry = $this->view->getViewRegistry();
    $this->view_registry->set($viewName, $templatePath .'/'. $viewName .'.php');
    $this->view->setData($sendArray);
    $this->view->setView($viewName);
    $output = $this->view->__invoke();
    return $output;
  }

  public function subTemplateView($mainViewName, $subViewName, $sendArray, $templatePath)
  {
    $this->view_registry = $this->view->getViewRegistry();

    // the "main" template
    $this->view_registry->set($mainViewName, $templatePath .'/'. $mainViewName .'.php');

    // the "sub" template
    $this->view_registry->set($subViewName, $templatePath .'/'. $subViewName .'.php');

    $this->view->setData($sendArray);
    $this->view->setView($mainViewName);
    $output = $this->view->__invoke();
    return $output;
  }

  public function twoStepView($mainViewName, $layoutName, $sendArray, $templatePath, $layoutPath)
  {
    $this->view_registry = $this->view->getViewRegistry();
    $this->layout_registry = $this->view->getLayoutRegistry();
    // the template
    $this->view_registry->set($mainViewName, $templatePath .'/'. $mainViewName .'.php');
    // the layout
    $this->layout_registry->set($layoutName, $layoutPath .'/'. $layoutName .'.php');

    $this->view->setData($sendArray);
    $this->view->setView($mainViewName);
    $this->view->setLayout($layoutName);
    $output = $this->view->__invoke();
    return $output;
  }









}
