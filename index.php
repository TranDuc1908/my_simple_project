<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if($_POST) foreach($_POST as $k=>$v){$_POST[$k] = addslashes($v);}
if($_GET) foreach($_GET as $k=>$v){$_GET[$k] = addslashes($v);} 
$get = $_GET;$post = $_POST;

# ========================== DEBUG ========================== #
if($get["debugPHP"]=="1909"){ini_set('display_errors', '1');ini_set('display_startup_errors', '1');error_reporting(E_ALL);}
# ========================== END DEBUG ========================== #


# ========================== DEFINE PARAMS ========================== #
define("DOMAIN",                    "http://explusbros.online/");
define("URL_CSS",                   DOMAIN."assets/css");
define("URL_JS",                    DOMAIN."assets/js");
define("URL_IMAGE",                DOMAIN."assets/images");
# ========================== END DEFINE PARAMS ========================== #


# ========================== GLOBAL PARAMS ========================== #
$mod = $_GET["mod"];
$title_page = "Home";
# ========================== END GLOBAL PARAMS ========================== #


require_once("libs.php");
if(isset($mod) && $mod == "get-car"){
    require_once("data/simple_html_dom.php");
    require_once("freelancer/get-car.php");
} else {
    require_once("_header.php");
    if(!$mod) require_once("modules/welcome.php");
    else require_once("modules/".$mod."Controller.php");
    echo '<title>'.$title_page.'</title>';
    require_once("_footer.php");
}


