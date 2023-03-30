# What is MySql CRUD API
[MySql Crud Api](https://github.com/markusoft/mysql-crud-api) is a Plug and Play PHP Library created to Auto-magically build CRUD capabilities for your MySql Database using RESTful API calls. This library is dependent to [Mysql Crud Library](https://github.com/markusoft/mysql-crud) which is another Plug and Play PHP Library similar to Query Builder and Eloquent ORM but on Steroids.

# Easy Peasy Summary

	C-reate  POST http://your-website.com/{route}/{database-table-name}
	R-ead    GET http://your-website.com/{route}/{database-table-name}/{id}/{related-table-name}/{id}?{parameter}={value}
	U-pdate  PUT|PATCH http://your-website.com/{route}/{database-table-name}/{id}
	D-elete  DELETE http://your-website.com/{route}/{database-table-name}/{id}

| Description | HTTP Verb | URL |
|-------------|-----------|-----|
| All Records | GET | http://your-website.com/crud/products |
| Record ID | GET | http://your-website.com/crud/products/1 |
| Filtered Records | GET |http://your-website.com/crud/products?status=active |
| Search Records | GET | http://your-website.com/crud/products?search=iphone |
| Pagination | GET | http://your-website.com/crud/products?limit=100&offset=100 |
| Sort and Order | GET | http://your-website.com/crud/products?sort=price&order=asc |
| Child Records | GET | http://your-website.com/crud/categories/1/products |
| Related Records | GET | http://your-website.com/crud/categories?with=products |
| Add Record/s | POST | http://your-website.com/crud/products |
| Add Related Records | POST | http://your-website.com/crud/categories?with=product |
| Update a Record | PUT or PATCH | http://your-website.com/crud/products/1 |
| Update Records | PUT or PATCH | http://your-website.com/crud/products |
| Delete a Record | DELETE | http://your-website.com/crud/products/1 |
| Delete Records | DELETE | http://your-website.com/crud/products |

# Table of Contents
- [What is MySql CRUD API](#what-is-mysql-crud-api)
- [Easy Peasy Summary](#easy-peasy-summary)
- [Installation](#installation)
	- [Install via Composer](#install-via-composer)
	- [Manual installation](#manual-installation)
	- [PHP Users](#php-users)
	- [Codeigniter Users](#codeigniter-users)
	- [Laravel Users](#laravel-users)
	- [Other PHP Frameworks](#other-php-frameworks)
- [Retrieving Records](#retrieving-records)
	- [All Records](#all-records)
	- [Single Records](#single-records)
	- [Filtered Records](#filtered-records)
	- [Child Records](#child-records)
	- [Related Records](#related-records)
	- [Search Records](#search-records)
- [Parameters](#parameters)
	- [API Key](#api-key)
	- [Limit and Offset](#limit-and-offset)
	- [Sort and Order](#sort-and-order)
	- [Envelop](#envelop)
	- [Case](#case)
	- [Format](#format)
- [Creating Records](#creating-records)
	- [Create Single Record](#create-single-record)
	- [Create Multiple  Records](#create-multiple-records)
- [Updating Records](#updating-records)
	- [Update Single Record](#update-single-record)
	- [Update Multiple  Records](#update-multiple-records)
- [Deleting Records](#deleting-records)
	- [Delete Multiple Records](#delete-multiple-records)
- [Configuration File](#configuration-file)

# Installation
To install this project, you have two options:

## Install via Composer

To install using Composer, run the following command:
	
	composer require mg3lo/mysql-crud-api

## Manual Installation

To install manually, follow these steps:

1. Download the [library](https://github.com/markusoft/dev-tools/raw/main/Mg3lo.zip) from [developer tools](https://github.com/markusoft/dev-tools).
2. Unzip the downloaded file to your extensions directory.

### System requirements

- PHP 7.0 or higher
- MySQL 5.0 or higher

Note: Tested on the following versions but might work on older versions as well.

## PHP Users
1. Download the sample [installation](https://github.com/markusoft/dev-tools/raw/main/PHP-MySqlCrudApi%20v%5B1.0.0%5D.zip) or Install via composer

	```php
	composer require mg3lo/mysql-crud-api
	```
	
2. Load the library on php file
	```php
	<?php
	// Load library installed via composer
	require_once './vendor/autoload.php'; 
	
	// Or load library installed manually
	require_once './Mg3lo/vendor/autoload.php'; 

	use Mg3lo\MySqlCrudApi;
	```

4. Let the library handle all requests

	```php
	<?php
	
	require_once './vendor/autoload.php'; 
	
	use Mg3lo\MySqlCrudApi;

	// connect to your database
	$api = new MySqlCrudApi([
	  'username' => 'root',
	  'password' => '',
	  'database' => 'my_database'
	]);

	// manage all calls
	$api->manage();
	```

5. Enjoy!

## Codeigniter Users
1. Unzip the sample library for [Codeigniter 3](https://github.com/markusoft/dev-tools/raw/main/CI3-MySqlCrudApi%20v%5B1.0.0%5D.zip) or [Codeigniter 4](https://github.com/markusoft/dev-tools/raw/main/CI4-MySqlCrudApi%20v%5B1.0.0%5D.zip) or Install via composer

	```php
	composer require mg3lo/mysql-crud-api
	```
	
2. Create routes to catch all requests going to your crud url e.g. http://your-website/crud/{anything-goes}
	```php
	$route['crud/(:any)'] = 'crud';
	$route['crud/(:any)/(:any)'] = 'crud';
	$route['crud/(:any)/(:any)/(:any)'] = 'crud';
	$route['crud/(:any)/(:any)/(:any)/(:any)'] = 'crud';
	```
3. Load the library on your controller
	```php
	<?php 
	  // Load library installed via composer
	  require_once FCPATH . 'vendor/autoload.php'; 
	
	  // Or load library installed manually
	  require_once APPPATH . 'third_party/Mg3lo/vendor/autoload.php';
		
	  use Mg3lo\MySqlCrudApi;
	```

4. Let the library handle all requests

	```php
	<?php 
	  require_once APPPATH . 'third_party/Mg3lo/vendor/autoload.php';
		
	  use Mg3lo\MySqlCrudApi;
		
	  class Crud extends CI_Controller {

		public function index()
		{
		  // connect to your mysql database
		  $api = new MySqlCrudApi([
			'username' => 'root',
			'password' => '',
			'database' => 'my_database'
		  ]);
		  
		  // let the library manage all api calls
		  $api->manage(); 
		}
	  }
	```

5. Enjoy!

## Laravel Users
1. Install via composer or unzip the [library](https://github.com/markusoft/dev-tools/raw/main/Laravel-MySqlCrudApi%20v%5B1.0.0%5D.zip) according to folder structure
	```php
	composer require mg3lo/mysql-crud-api
	```
2. Create routes to catch all requests going to your crud url e.g. http://your-website/crud/{anything-goes}
	```php
	Route::any('{crud}', function ($any) {
	  // Catches all routes from crud, may vary depending on your laravel version
	})->where('crud', '.*crud.*');
	```
3. Load the library on your route or controller
	```php
	// load the library if you did not install it via composer
	require_once app_path('Mg3lo/vendor/autoload.php');
	use Mg3lo\MySqlCrudApi;
	```
4. Let the library handle all requests

	```php
	use Mg3lo\MySqlCrudApi;
	
	// connect to your mysql database
    $api = new MySqlCrudApi([
	  'host' => env(DB_HOST),
	  'username' => env(DB_USERNAME),
	  'password' => env(DB_PASSWORD),
	  'database' => env(DB_DATABASE),
    ]);
	
	Route::any('{crud}', function ($any) use ($api) {

	  // let the library manage all api calls
	  $api->manage(); 
	  
	})->where('crud', '.*crud.*');
	```

5. Enjoy!

## Other PHP Frameworks
1. Download the sample [installation](https://github.com/markusoft/dev-tools/raw/main/PHP-MySqlCrudApi%20v%5B1.0.0%5D.zip) or Install via composer

	```php
	composer require mg3lo/mysql-crud-api
	```
	
2. Load the library
	```php
	<?php
	// Load library installed via composer
	require_once './vendor/autoload.php'; 
	
	// Or load library installed manually
	require_once '.Your_Directory/Mg3lo/vendor/autoload.php'; 

	use Mg3lo\MySqlCrudApi;
	```

4. Let the library handle all requests

	```php
	<?php
	
	require_once './vendor/autoload.php'; 
	
	use Mg3lo\MySqlCrudApi;

	// connect to your database
	$api = new MySqlCrudApi([
	  'username' => 'root',
	  'password' => '',
	  'database' => 'my_database'
	]);

	// manage all calls
	$api->manage();
	```

5. Enjoy!

# Retrieving Records
Retrieving records generally follow this URL format.
	
	GET http://your-website.com/{route}/{database-table-name}/{id}/{related-table-name}/{id}?{parameter}={value}
	
## All Records
Retrieves all records from products table

	http://your-website.com/crud/products

	
## Single Record
Retrieves the record with the id of 1 from products table

	http://your-website.com/crud/products/1
	
## Filtered Records
Retrieves products that are currently active

	http://your-website.com/crud/products?status=active
	
## Child Records
Retrieves products that belong to category 1

	http://your-website.com/crud/categories/1/products
	
## Related Records
Retrieves categories and their respective products

	http://your-website.com/crud/categories?with=products
	
## Searching Records
We can search records and search specific columns

	http://your-website.com/crud/products?search=iphone
	http://your-website.com/crud/products?search=iphone&search-fields=name,description
	http://your-website.com/crud/products?search=iphone&search-fields[0]=name&search-fields[1]=description
	
# Parameters
Using query parameters can further make our filters better.

## API Key
Use API keys to protect your data.

	http://your-website.com/crud/products?api-key=YourApiKey
	
## Limit and Offset
Use limit and offset to limit the records retrieved and create paginations

### Limit
Retrieves the first 100 records

	http://your-website.com/crud/products?limit=100
	
### Offset 
Retrieves records 101 to 200

	http://your-website.com/crud/products?limit=100&offset=100
	
## Sort and Order
Sort and order records according to your liking

### Sort
Sort records from a databse column name
	
	http://your-website.com/crud/products?sort=price
	
### Order 
Order records ascending or descending

	http://your-website.com/crud/products?sort=price&order=asc


## Envelop
By default records are returned with an envelope you can turn it off by passing true or false

	http://your-website.com/crud/products?envelop=false
	
## Case
By default records are returned using underscore case. You can change them by passing any of the ff: (underscore, pascal, camel, dash)
	
	http://your-website.com/crud/products?case=camel

## Format
By default the library returns JSON as response, you can change it to (csv, xml, json or jsonp)

	http://your-website.com/crud/products?format=xml
	
# Creating Records
Creating records generally follow this URL format.
	
	POST http://your-website.com/{route}/{database-table-name}
	
## Create Single Record
We can add records by posting data to the url

	http://your-website.com/crud/products
	
POST Data

	[
	  'name' => 'iPhone',
	  'description' => 'Cellphone',
	  'price' => '999',
	]
	
## Create Multiple Records
We can also add multiple records from the same url

	http://your-website.com/crud/products
	
POST Data

	[
	  [
	    'name' => 'iPhone',
	    'description' => 'Cellphone',
	    'price' => '999',
	  ],
	  [
	    'name' => 'iPhone',
	    'description' => 'Cellphone',
	    'price' => '999',
	  ]
	]

# Updating Records
Updating records generally follow this URL format.
	
	PUT|PATCH http://your-website.com/{route}/{database-table-name}/{id}
	
## Update Single Record
We can update a record from the ID url
	
	PUT|PATCH http://your-website.com/crud/products/1
	
PUT or PATCH Data

	[
	  'name' => 'iPhone',
	  'description' => 'New Description',
	  'price' => '799',
	]
	
## Update Multiple Records
We can update multiple records

	PUT|PATCH http://your-website.com/crud/products
	
PUT or PATCH Data

	[
	  [
		'id' => 1,
	    'name' => 'iPhone',
	    'description' => 'Cellphone',
	    'price' => '999',
	  ],
	  [
		'id' => 2,
	    'name' => 'iPhone',
	    'description' => 'Cellphone',
	    'price' => '999',
	  ]
	]
	
Note: We can also use POST for Updating records just pass a method override on your post _method

	POST http://your-website.com/crud/products/1
	
POST Data

	[
	  'name' => 'iPhone',
	  'description' => 'New Description',
	  'price' => '799',
	  _method => "put" // methhod ovverride
	]
	
# Deleting Records
Updating records generally follow this URL format.

	DELETE http://your-website.com/{route}/{database-table-name}/{id}
	
## Delete Multiple Records
To delete multiple files we pass their ids

	DELETE http://your-website.com/{route}/{database-table-name}/{id}
	
DELETE Data

	[
		ids = [1,2,3]
	]
	
# Configuration File
Your config file is located at Mg3lo\src\config\MySqlCrudApi.php make sure all the configurations are correct.

```php
<?php

/*
|--------------------------------------------------------------------------
| Timezone
|--------------------------------------------------------------------------
|
| PHP 5 and lower requires timezone to be set
|
*/
$config['timezone'] = 'UTC';

/*
|--------------------------------------------------------------------------
| API Secret Key
|--------------------------------------------------------------------------
|
| Although you can set an api key to secure your API
| We suggest implementing your own security on top of it
|
*/
$config['api_key'] = '';

/*
|--------------------------------------------------------------------------
| URL Segment
|--------------------------------------------------------------------------
|
| In which url segment do tables be retrieved
| http://yourwebsite/api/table
|
| 0 = yourwebsite
| 1 = api
| 2 = table
|
*/
$config['url_segment'] = 2;

/*
|--------------------------------------------------------------------------
| API Default Case
|--------------------------------------------------------------------------
|
| Default API response will be of case underscore or snake.
| Values can be camel, dash, pascal, snake or underscore
|
*/
$config['case'] = 'underscore';

/*
|--------------------------------------------------------------------------
| Database tables
|--------------------------------------------------------------------------
|
| Database table names are named plural or singular
|
*/
$config['db_table_names'] = 'plural';

/*
|--------------------------------------------------------------------------
| API Envelop
|--------------------------------------------------------------------------
|
| If set to true API's response will contain status, code, message, date and count
| Otherwise if set to false response will contain pure data only
|
*/
$config['envelop'] = TRUE;

/*
|--------------------------------------------------------------------------
| API Wrapper
|--------------------------------------------------------------------------
|
| If supplied data will be wrapped around the value
|
*/
$config['wrapper'] = '';

/*
|--------------------------------------------------------------------------
| API Default Delimeter
|--------------------------------------------------------------------------
|
| Default delimiter for csv response
|
*/
$config['delimiter'] = ',';

/*
|--------------------------------------------------------------------------
| API Force Array
|--------------------------------------------------------------------------
|
| Forces the response to be array for single records
|
*/
$config['force_array'] = FALSE;

/*
|--------------------------------------------------------------------------
| API Default Response Format
|--------------------------------------------------------------------------
|
| API's default response format
|
*/
$config['format'] = 'json';

/*
|--------------------------------------------------------------------------
| Uploads Directory
|--------------------------------------------------------------------------
|
| Uploads root directory
|
*/
$config['uploads'] = 'uploads';

/*
|--------------------------------------------------------------------------
| Uploads folder name
|--------------------------------------------------------------------------
|
| uploads/directory
| sub folder for api uploads
|
*/
$config['api_uploads'] = 'mysqlcrudapi';

/*
|--------------------------------------------------------------------------
| Allowed file upload types
|--------------------------------------------------------------------------
|
| To enable all use *
| For specific types use | to separate values e.g. jpg|doc|txt
|
*/
$config['allowed_files'] = '*';


/*
|--------------------------------------------------------------------------
| Language File
|--------------------------------------------------------------------------
|
| Overwrite texts here 
| or pass it as second parameter on the constructor
| $api = new MysqlCrudApi($config, $language);
|
*/
$config['language'] = [
   'success' => 'Success',
   'failed' => 'Failed',
   'error' => 'error',
   
   'status' => 'status',
   'code' => 'code',
   'message' => 'message',
   'fetch_date' => 'fetch_date',
   'errors' => 'errors',
   'response' => 'Response',
   
   'add_successful' => 'Add successful',
   'edit_successful' => 'Edit successful',
   'delete_successful' => 'Delete successful',
   
   'count_' => 'count_',
   'total_' => 'total_',
   
   'file_too_large' => 'File too large',
   'invalid_api_key' => 'Invalid api key',
   'not_found' => 'Not found',
   'invalid_parameters' => 'Invalid parameters',
   'unsupported_file' => 'Unsupported file type',

   'no_update_parameter' => 'Please send at least one parameter to update',
   'no_delete_parameter' => 'No parameter for delete',
   'unable_csv' => 'Unable to convert nested multi-dimensional array to csv'
];

return $config;

?>
```