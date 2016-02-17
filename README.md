# Aura-Views-Demo
A small collection of classes that demonstrate how we can use Aura.Views on our client side.

First, the documentation for Aura.Views is in their [GitHub repo](https://github.com/auraphp/Aura.View). I've tried to fold Aura Views into the structure that we currently use on Farm Portal.
### Setting Up the Demo
If you would like to work with the demo on a local dev enviroment, unzip the `aura_work.sql.zip` file and run the sql file. It will create a database called aura_demo. This demo DB contains three tables from the Dev DB, so if you want to work with the demo on your sandbox all you need to do is change the DB connection in `src/lib/FfSqlModel.php` and your SQLModel will still be happy.

###Info On Use
**src/lib/FfViewsLib.php**: This file does all the work of calling Aura.Views and generating the view output. At this time there are three public methods:
- oneStepView()
- subTemplateView() (AKA: partial in the Aura docs)
- twoStepView()

You shouldn't have to give this file much thought, it was designed for the developer to do all his work in the Core.php file.

**Core.php**: This works generally like the Core files we're using now. Gather data with a method that calls the model and call that method in your method that calls the View library. The code is commented so hopefully this will be easy to use.

**The view files** in the demo and what they do:
- **One Step View**
  - View/templates/customers_1.php
- **Sub Template or Partial view**
  - View/templates/_cart_part.php (the data part of the view - *since this is just data, it can reused in other templates*)
  - View/templates/customers_2.php (inserts the code into an HTML snippet)
- **Two Step View**
  - View/templates/_cust_nav_elems.php
  - View/layouts/customer_nav.php
- **Two Step View using sections**
  - View/templates/_products_section.php
  - View/layouts/products_layout.php

Aura Views is very flexable and gives you different ways to do things according to your needs. A note about the sub-templates or partials, if you have multiple placed in the site where you need the same data, but in a different layout, you can reuse the data part of the partial and use it in multiple places. The demo shows very basic ways to use them, but I hope it will get us started. 

What nice about the way you register a view using the core, is that you can look at the core view methods and see the name of the view and/or template file. 

Example:
```
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
```
###Escaping Data
Aura Views requires that all data going into a template must be escaped. In the demo this is being done by using another Aura module called Aura.Html. You can read the docs about [escaping data here](https://github.com/auraphp/Aura.Html#escaping).

In demo views where data is being interated over you'll see: `$this->escape()->html($cust['customer_id']);`. **Please read the docs** about Aura.Html and escaping, there are escaping methods for HTML, Unquoted Html attributes, CSS and JavaScript.
