<?php

require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

use PHPUnit\Framework\TestCase; 

// Important object #1
#$driver = new GoutteDriver();

$driver = new Selenium2Driver();

// Important object #2
$session = new Session($driver);


// delay in seconds
$delay = 3;

$session->start();

$session->visit('http://automationpractice.com/index.php?id_product=1&controller=product');

// Get the current url
echo "Current URL: ". $session->getCurrentUrl() . "\n";

// Get the current page
$page = $session->getPage();



// Check if there is the add to cart button element on the current page
$el = $page->find('css', '#add_to_cart');

if (null === $el) {
    echo "The add to cart button is not found!\n";
} else {
    echo "The Add to cart button is found!\n";
    // Clik that button
    $el->click();
}

// Delay until visible
$el = $page->find('css', '.button-medium');
while(true) {

    if($el->isVisible() === false)
    {
        echo 'The button isn\'t visible at the moment ... keep looking! :D';
        $el = $page->find('css', '.button-medium');
    }
    else {
        break;
    }
}

$el = $page->find('css', '.button-medium');
$el->click();

sleep($delay);


// --- Scroll by a number of pixels ---
//$number_pixels = 600;
//$session->executeScript("window.scrollBy(0, ".$number_pixels.");");


$session->stop();

echo "\n\n\n";















