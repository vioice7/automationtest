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


// delay in seconds
$delay = 3;

$session->start();

$session->visit('http://automationpractice.com/index.php?controller=authentication&back=my-account');

// Get the current page
$page = $session->getPage();

// Check if there is the email element on the current page
$el = $page->find('css', '#email');

if (null === $el) {
    echo "The email field is not found!\n";
} else {
    echo "The email field is found!\n";
    // Clik that button
    $el->setValue("test@test.aime");
}

// Check if there is the passwd element on the current page
$el = $page->find('css', '#passwd');

if (null === $el) {
    echo "The passwd field is not found!\n";
} else {
    echo "The passwd field is found!\n";
    // Clik that button
    $el->setValue("test()10");
}

// Check if there is the Sign In button element on the current page
$el = $page->find('css', '#SubmitLogin');

if (null === $el) {
    echo "The sign in button is not found!\n";
} else {
    echo "The sign in button is found!\n";
    // Clik that button
    $el->click();
}
// ---

sleep($delay);

$session->visit('http://automationpractice.com/index.php?id_product=1&controller=product');

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

sleep($delay+5);


// Check if there is a product in the cart
$el = $page->find('css', '.layer_cart_product');

if (null === $el) {
    echo "The element is not found!\n";
} else {
    echo "The text: " . $el->getText() . "was found on the page!\n";
}


// Check if there is a button to proceed
$el = $page->find('css', '.button-medium');

if (null === $el) {
    echo "The Proceed button is not found!\n";
} else {
    echo "The Proceed button is found!\n";
    $el->click(); 
}


sleep($delay);

// --- Scroll by a number of pixels ---
$number_pixels = 800;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");

sleep($delay);

// Check if there is a button to proceed
$el = $page->find('css', '.standard-checkout');

if (null === $el) {
    echo "The Proceed (Summary) button is not found!\n";
} else {
    echo "The Proceed (Summary) button is found!\n";
    $el->click(); 
}

sleep($delay);

// --- Scroll by a number of pixels ---
$number_pixels = 600;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");

sleep($delay);
$session->visit('http://automationpractice.com/index.php?controller=order&step=1');
$session->visit('http://automationpractice.com/index.php?controller=order&step=2');

sleep($delay);

// --- Scroll by a number of pixels ---
$number_pixels = 600;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");

sleep($delay);

// Check if there is a I agree to terms checkbox
$el = $page->find('css', '.cgv');

if (null === $el) {
    echo "The I agree to terms checkbox is not found!\n";
} else {
    echo "The I agree to terms checkbox is found!\n";
    $el->setValue(true); 
}



sleep($delay+10);

$session->stop();

echo "\n\n\n";





