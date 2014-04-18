<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "post";
$route["ponude"] = "post/ponude";
$route["ponude/(.*)"] = "post/ponude/$1";
$route["ljetovanja/(.*)"] = "post/ljetovanja/$1";
$route["ljetovanja"] = "post/ljetovanja";
$route["ljetovanje/(.*)"] = "post/ljetovanje/$1";
$route["zimovanja"] = "post/zimovanja";
$route["zimovanje/(.*)"] = "post/zimovanje/$1"; 
$route["opsti-uslovi"] = "page/opsti_uslovi";
$route["kontakt"] = "page/kontakt";
$route["rezervacija"] = "page/rezervacija";
$route["ekskurzije"] = "ekskurzija/ekskurzije";
$route["spisak_ekskurzija"] = "ekskurzija/spisak_ekskurzija";
$route["nova_ekskurzija"] = "ekskurzija/nova_ekskurzija";
$route["izmjeni_ekskurziju/(.*)"] = "ekskurzija/izmjeni_ekskurziju/$1";
$route["delete_ekskurziju/(.*)"] = "ekskurzija/delete_ekskurziju/$1";
$route["update_ekskurziju"] = "ekskurzija/update_ekskurziju";
$route["ekskurzija/(.*)"] = "ekskurzija/ekskurzij/$1";
$route["clanak/(.*)"] = "post/clanak/$1";
$route["add_ekskurziju"] = "ekskurzija/add_ekskurziju";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */