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
$delay = 15;

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
    echo "The add to cart button is not found!\n";
} else {
    echo "The Add to cart button is found!\n";
    // Clik that button
    $el->click();
}

// Wait for loading
sleep($delay);

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
$number_pixels = 300;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");

sleep($delay);


// Check if there is a button to proceed
$el = $page->find('css', '.standard-checkout');

if (null === $el) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
    $el->click();
}


sleep($delay);

// Check if there is an email field and set a value
$field = $page->find('css', '#email_create');

if (null === $field) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
    $field->setValue("test@test.aim");
}

// Check if there is a button "Create an account"
$el = $page->find('css', '#SubmitCreate');

if (null === $el) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
    $el->click();
}


sleep($delay);

// --- Scroll by a number of pixels ---
$number_pixels = 300;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");



// Check if there is a radio button gender
$radio_element = $page->find('css', '#id_gender1');

if (null === $radio_element) {
    echo "The element is not found!\n";
} else {
    echo "Element was found!\n"; 
    $radio_element->setValue(true);
}

// Check if there is a field "customer_firstname"
$field = $page->find('css', '#customer_firstname');

if (null === $field) {
    echo "The element customer_firstname is not found!\n";
} else {
    echo "Element customer_firstname was found!\n"; 
    $field->setValue("Test");
}

// Check if there is a field "customer_lastname"
$field = $page->find('css', '#customer_lastname');

if (null === $field) {
    echo "The element customer_lastname is not found!\n";
} else {
    echo "Element customer_lastname was found!\n"; 
    $field->setValue("Aim");
}

// Check if there is a field "password"
$field = $page->find('css', '#passwd');

if (null === $field) {
    echo "The element password is not found!\n";
} else {
    echo "Element password was found!\n"; 
    $field->setValue("Test()10");
}

// --- Scroll by a number of pixels ---
$number_pixels = 300;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");
// ------------------------------------

// Check if there is a selecto option "days"
$selector = $page->find('css', '#days');

if (null === $selector) {
    echo "The element days is not found!\n";
} else {
    echo "Element days was found!\n"; 
    $selector->selectOption("12");
}

// Check if there is a selecto option "months"
$selector = $page->find('css', '#months');

if (null === $selector) {
    echo "The element months is not found!\n";
} else {
    echo "Element months was found!\n"; 
    $selector->selectOption("May");
}

// Check if there is a selecto option "years"
$selector = $page->find('css', '#years');

if (null === $selector) {
    echo "The element years is not found!\n";
} else {
    echo "Element years was found!\n"; 
    $selector->selectOption("1970");
}

// --- Scroll by a number of pixels ---
$number_pixels = 300;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");
// ------------------------------------


// Check if there is a field "firstname"
$field = $page->find('css', '#firstname');

if (null === $field) {
    echo "The element firstname is not found!\n";
} else {
    echo "Element firstname was found!\n"; 
    $field->setValue("Test");
}

// Check if there is a field "lastname"
$field = $page->find('css', '#lastname');

if (null === $field) {
    echo "The element lastname is not found!\n";
} else {
    echo "Element lastname was found!\n"; 
    $field->setValue("Aim");
}

// Check if there is a field "company"
$field = $page->find('css', '#company');

if (null === $field) {
    echo "The element company is not found!\n";
} else {
    echo "Element company was found!\n"; 
    $field->setValue("Tech");
}

// --- Scroll by a number of pixels ---
$number_pixels = 300;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");
// ------------------------------------

// Check if there is a field "address1"
$field = $page->find('css', '#address1');

if (null === $field) {
    echo "The element address1 is not found!\n";
} else {
    echo "Element address1 was found!\n"; 
    $field->setValue("Str. T1");
}

// Check if there is a field "address2"
$field = $page->find('css', '#address2');

if (null === $field) {
    echo "The element address2 is not found!\n";
} else {
    echo "Element address2 was found!\n"; 
    $field->setValue("Str. T2");
}

// Check if there is a field "city"
$field = $page->find('css', '#city');

if (null === $field) {
    echo "The element city is not found!\n";
} else {
    echo "Element city was found!\n"; 
    $field->setValue("New York");
}


// --- Scroll by a number of pixels ---
$number_pixels = 300;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");
// ------------------------------------

// Check if there is a field "postcode"
$selector = $page->find('css', '#postcode');

if (null === $selector) {
    echo "The element postcode is not found!\n";
} else {
    echo "Element postcode was found!\n"; 
    $selector->setValue("10020");
}

// Check if there is a field "phone"
$field = $page->find('css', '#phone');

if (null === $field) {
    echo "The element phone is not found!\n";
} else {
    echo "Element phone was found!\n"; 
    $field->setValue("555 123 4567890");
}

// Check if there is a field "phone_mobile"
$field = $page->find('css', '#phone_mobile');

if (null === $field) {
    echo "The element phone_mobile is not found!\n";
} else {
    echo "Element phone_mobile was found!\n"; 
    $field->setValue("555 012 3456789000");
}

// Check if there is a field "alias"
$field = $page->find('css', '#alias');

if (null === $field) {
    echo "The element alias is not found!\n";
} else {
    echo "Element alias was found!\n"; 
    $field->setValue("aimtec10");
}

// Check if there is a button "register"
$element = $page->find('css', '#submitAccount');

if (null === $element) {
    echo "The element register is not found!\n";
} else {
    echo "Element register was found!\n"; 
    $element->click();
}

sleep($delay);

// --- Scroll by a number of pixels ---
$number_pixels = 1400;
$session->executeScript("window.scrollBy(0, ".$number_pixels.");");
// ------------------------------------

sleep($delay);

// Check if there is a field "id_country"
$selector = $page->find('css', '#id_country');

if (null === $selector) {
    echo "The element id_country is not found!\n";
} else {
    echo "Element id_country was found!\n"; 
    $selector->setOption("United States");
    
}

/*
// Check if there is a field "id_state"
$selector = $page->find('css', '#id_state');

if (null === $selector) {
    echo "The element id_state is not found!\n";
} else {
    echo "Element id_state was found!\n"; 
    $selector->setOption("New York");
}

*/



sleep($delay);

$session->stop();

echo "\n\n\n";




