<?php
require_once "Model/Order.php";

$items = 5;
$price = 399.99;
$code = "TX";
$order = new \App\ElephantCarpaccio\Model\Order();
print_r("$items x $price State Code: $code \n");
print_r("-----------------\n");
$total_price =  $order->calculateOrderValue($items, $price, $code);
print_r("TOTAL PRICE: " . $total_price. "\n");