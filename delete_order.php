<?php
    include_once 'config/database.php';
    include_once 'objects/order.php';
    
    $db = new Database;
    $order = new Order;
    $id = $_GET['id'];

    $res = $order->delete($id, $db);
   
    if($res) {
        header('location: index.php');
    } else {
        echo "Failed to delete order";
    }
?>