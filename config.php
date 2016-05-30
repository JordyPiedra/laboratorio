<?php 
    $location =explode(DIRECTORY_SEPARATOR, __FILE__);
    $inicio = array_search('html', $location);

    if(!$inicio)
    $inicio = array_search('htdocs', $location);    
    
    $url_="";
     for ($i=($inicio+1); $i < (count($location)-1) ; $i++) { 
         $url_ .= '/'.$location[$i];
     }
	define('URL', 'http://'.$_SERVER['SERVER_NAME'].$url_.'/');
    
		define('LIBS', 'libs/');
        
    define('HEADER', 'public/inc/HEADER.php');
    define('SCRIPT','public/inc/SCRIPT.php');

    define('MENU', 'public/inc/MENU.php');
    define('MENU_F', 'public/inc/MENU_F.php');

    define('CALENDAR','public/inc/CALENDAR.php');
    define('SCRIPT_F','public/inc/SCRIPT_F.php');

    define('JSPDF','public/jsPDF-0.9/jspdf.php');
    define('FPDF','public/fpdf/fpdf.php');

    require_once 'vendor/autoload.php' ;



 
    	
?>