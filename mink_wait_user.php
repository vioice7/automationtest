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


// delay in miliseconds
$delay = 21000;

// start session

$session->start();

$session->visit('http://automationpractice.com/index.php?id_product=1&controller=product');

// Get the current url
echo "Current URL: ". $session->getCurrentUrl() . "\n";

// Get the current page
$page = $session->getPage();

clickVisibleElement($page, 'css', '#add_to_cart');

clickVisibleElement($page, 'css', '.button-medium');

echo "\nStep 0 (Add to cart a product) done!\n";

$session->wait($delay);

scrollBy($session, 300);

clickVisibleElement($page, 'css', '.standard-checkout');

echo "\nStep 1 (Summary) done!\n";

$session->wait($delay);

scrollBy($session, 400);

fillTextField($page, 'css', '#email', 'test@test.aime');

fillTextField($page, 'css', '#passwd', 'test()10');

clickVisibleElement($page, 'css', '#SubmitLogin');

echo "\nStep 2 (Log User) done!\n";

$session->wait($delay);

scrollBy($session, 600);

$session->wait(3000);

clickVisibleElement($page, 'css', '.cart_navigation > .button-medium');

echo "\nStep 3 (Adress) done!\n";

$session->wait(3000);

clickVisibleElement($page, 'css', '#uniform-cgv');

scrollBy($session, 300);

$session->wait(3000);

clickVisibleElement($page, 'css', '.standard-checkout');

echo "\nStep 4 (Shipping) done!\n";

$session->wait(3000);

scrollBy($session, 500);

$session->wait(3000);

if(checkElement($page, 'css', '.bankwire')) {
    echo "\nStep 5 (Payment) is available!\n";
}

// sleep 10 seconds then stop session

sleep(10);

$session->stop();

echo "\n\n\n";


// --- custom functions for elements ---

function clickVisibleElement($page, $elementType, $elementSelector) {

    // Delay until visible
    $el = $page->find($elementType, $elementSelector);
    while(true) {

        if($el === null) {
            echo "\nThe field with identifier " . $elementSelector . " isn't found at moment ... keep looking! :D";
            $el = $page->find($elementType, $elementSelector);
        } else {
            if($el->isVisible() === false)
            {
                echo "\nThe button with identifier " . $elementSelector . " isn't visible at the moment ... keep looking! :D";
                $el = $page->find($elementType, $elementSelector);
            }
            else {
                break;
            }
        }
    }
    $el->click();

}

function fillTextField($page, $elementType, $elementSelector, $value) {
    // Delay until visible
    $el = $page->find($elementType, $elementSelector);
    while(true) {

        if($el === null) {
            echo "\nThe field with identifier " . $elementSelector . " isn't found at moment ... keep looking! :D";
            $el = $page->find($elementType, $elementSelector);
        } else {

            if($el->isVisible() === false)
            {
                echo "\nThe field with identifier " . $elementSelector . " isn't visible at the moment ... keep looking! :D";
                $el = $page->find($elementType, $elementSelector);
            }
            else {
                break;
            }            
        }

    }
    $el->setValue($value);

}

function selectOptionValue($page, $elementType, $elementSelector, $value) {

    // Delay until visible
    $el = $page->find($elementType, $elementSelector);
    while(true) {

        if($el === null) {
            echo "\nThe field with identifier " . $elementSelector . " isn't found at moment ... keep looking! :D";
            $el = $page->find($elementType, $elementSelector);
        } else {

            if($el->isVisible() === false)
            {
                echo "\nThe field with identifier " . $elementSelector . " isn't visible at the moment ... keep looking! :D";
                $el = $page->find($elementType, $elementSelector);
            }
            else {
                break;
            }            
        }

    }
    $el->setValue($value);

}

function checkElement($page, $elementType, $elementSelector) {
        // Delay until visible
        $el = $page->find($elementType, $elementSelector);
        while(true) {
    
            if($el === null) {
                echo "\nThe field with identifier " . $elementSelector . " isn't found at moment ... keep looking! :D";
                $el = $page->find($elementType, $elementSelector);
            } else {
                if($el->isVisible() === false)
                {
                    echo "\nThe button with identifier " . $elementSelector . " isn't visible at the moment ... keep looking! :D";
                    $el = $page->find($elementType, $elementSelector);
                }
                else {
                    break;
                }
            }
        }
        return true;
}

function scrollBy($session, $numberPixels) {
    // --- Scroll by a number of pixels ---
    $session->executeScript("window.scrollBy(0, ".$numberPixels.");");
}