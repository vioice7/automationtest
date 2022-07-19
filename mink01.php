<?php

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

// Important object #1
#$driver = new GoutteDriver();

$driver = new Selenium2Driver();

// Important object #2
$session = new Session($driver);

$session->start();
//$session->visit('http://automationpractice.com/index.php');
$session->visit('http://automationpractice.com/index.php?id_product=1&controller=product');

// Get the current url
echo "Current URL: ". $session->getCurrentUrl() . "\n";

// Get the current page
$page = $session->getPage();

// Check if there is the add to cart button element on the current page
$el = $page->find('css', '#add_to_cart');

if (null === $el) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
}

// Clik that button
$el->click();

// Wait for loading
sleep(5);

// Check if there is a product in the cart
$el = $page->find('css', '.layer_cart_product');

if (null === $el) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
}

// Get the text for that product
echo $el->getText();
echo "\n";


// Check if there is a button to proceed
$el = $page->find('css', '.button-medium');

if (null === $el) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
}

$el->click();

sleep(3);

$number_pixels = 300;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");

sleep(3);


// Check if there is a button to proceed
$el = $page->find('css', '.standard-checkout');

if (null === $el) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
    $el->click();
}





$session->stop();

echo "\n\n\n";




