<?php 
define('EMA', APPPATH.'/Views');
echo view('parts/header'); 
if ($page != "login" && $page != "register") {
    # code...
    echo view('parts/sidebar'); 
}

require_once EMA."/cargo/".$page.".php";

echo view('parts/footer');