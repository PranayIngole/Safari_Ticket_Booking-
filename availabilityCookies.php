<?php

if(isset($_COOKIE['safari'])){
    if(isset($_GET['safari'])){
        if(($_COOKIE['safari'] != $_GET['safari'])){
            setcookie('safari', $_GET['safari'], time() + 60*60*24, "/");
        }
}
}else if(isset($_GET['safari'])) {
    setcookie('safari', $_GET['safari'], time() + 60*60*24 , "/");
}else{
    header("Location: index.php");
}

$Current_Date = date('Y-m-d');
if(isset($_COOKIE['AvaliableTicket'])){
    if(isset($_GET['search'])){
        if(($_COOKIE['AvaliableTicket']!= $_GET['search'])){
            setcookie('AvaliableTicket', $_GET['search'], time() + 60*60*24 , "/");
        }
}
}else {
    setcookie('AvaliableTicket', $Current_Date , time() + 60*60*24 , "/");
}

header("Location: availability.php");
?>