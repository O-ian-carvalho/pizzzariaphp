<?php


function whitchpage(){
    if(isset($_GET['page'])){
        
        $page = $_GET['page'];

        switch($page){
            case 'menu':
                return 'pages/menu.php';
            break;
        }

    } else{
        return 'pages/login.php';
    }
}