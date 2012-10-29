# CS2102 Project - Hungrygowhere knock-off
Tech stack:
* [CodeIgniter php framework] (http://codeigniter.com)
* [Readable Theme for Twitter Bootstrap](http://bootswatch.com/readable/)


###The quickest way to understand how CodeIgniter works is to *briefly* read through these:
* http://codeigniter.com/user_guide/tutorial/index.html 
* http://codeigniter.com/user_guide/tutorial/static_pages.html
* http://codeigniter.com/user_guide/tutorial/news_section.html


###Folders/files to look at
* ```application/controllers```
* ```application/models```
* ```application/views```
* ```application/config/database.php```
* ```application/config/routes.php```

###Database
Configure your database setting in ```application/config/database.php```
Create a new database and import schema/data from the file ```sampleData.sql``` through phpMyAdmin or any other ways.

###Routing

**Restaurants** and **reviews** controllers use custom routing specified in 
```application/config/routes.php```

Other controllers use default CodeIgniter routing in the form of ```http://example.com/index.php/controller_name/function_name/parameter```

For example, ```http://localhost/cs2102/index.php/users/view/harrypotter```
will call **view function** in **users controller**, passing in **"harrypotter" as parameter**.

###Other notes
Data is passed from the controller to the view in form of an array. Example below:

```php
// controllers/restaurants.php
$data['restaurants'] = $this->RestaurantModel->getAllRestaurants();
$this->load->view('templates/header');
$this->load->view('restaurants/index', $data);
$this->load->view('templates/footer');
```

```php
// views/restaurants/index.php
<?php foreach ($restaurants as $restaurant): ?>
    <h3><?php echo $restaurant['name'] ?></h3>
<?php endforeach ?>
```

You can convert the data passed into the view to a json format via something like this:
```php
<?php echo json_encode($restaurants) ?>
```
