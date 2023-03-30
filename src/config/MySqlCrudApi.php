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