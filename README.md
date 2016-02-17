# Aura-Views-Demo
A small collection of classes that demonstrate how we can use Aura.Views on our client side.

First, the documentation for Aura.Views is in their [GitHub repo](https://github.com/auraphp/Aura.View). I've tried to fold Aura Views into the structure that we currently use on Farm Portal.
### Setting Up the Demo
If you would like to work with the demo on a local dev enviroment, unzip the `aura_work.sql.zip` file and run the sql file. It will create a database called aura_demo. This demo DB contains three tables from the Dev DB, so if you want to work with the demo on your sandbox all you need to do is change the DB connection in `src/lib/FfSqlModel.php` and your SQLModel will still be happy.
