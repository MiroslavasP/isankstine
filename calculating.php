<?php

if (isset($_POST['calculate']) || isset($_POST['product1-quantity'])) {
    $product1Quantity = (int)$_POST['product1-quantity'] ?? 0;
    $product1Price = (int)$_POST['product1-price'] ?? 0;
    $product1Total = $product1Quantity * $product1Price;
    $product2Total = (int)$_POST['product2-quantity'] * (int)$_POST['product2-price'] ?? 0;
    $total = $product1Total + $product2Total ?? 0;
    $vat = $total * 0.21 ?? 0;
    $totalWithVat = $total * 1.21 ?? 0;
}
