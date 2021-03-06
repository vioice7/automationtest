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


clickVisibleElement($page, 'css', '#add_to_cart');

clickVisibleElement($page, 'css', '.button-medium');

sleep($delay);
scrollBy($session, 300);

clickVisibleElement($page, 'css', '.standard-checkout');

fillTextField($page, 'css', '#email_create', 'test01@test01.aim');

clickVisibleElement($page, 'css', '#SubmitCreate');

sleep(10);
scrollBy($session, 900);

selectOptionValue($page, 'css', '#id_state', 'New York');

// selectRadio();
// selectCheckbox();

sleep($delay);

$session->stop();

echo "\n\n\n";


// --- custom functions for elements ---

function clickVisibleElement($page, $elementType, $elementSelector) {

    // Delay until visible
    $el = $page->find($elementType, $elementSelector);
    while(true) {

        if($el->isVisible() === false)
        {
            echo "\nThe button with identifier " . $elementSelector . " isn't visible at the moment ... keep looking! :D";
            $el = $page->find($elementType, $elementSelector);
        }
        else {
            break;
        }
    }
    $el->click();
}

function fillTextField($page, $elementType, $elementSelector, $value) {
    // Delay until visible
    $el = $page->find($elementType, $elementSelector);
    while(true) {

        if($el === null) {
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

function scrollBy($session, $numberPixels) {
    // --- Scroll by a number of pixels ---
    $session->executeScript("window.scrollBy(0, ".$numberPixels.");");
}













