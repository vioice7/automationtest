Feature: Add to cart check
  In order to properly add to cart items we should check each process step in a scenario
  
  Scenario: See what happens if we clik on Add to cart
    Given I am on "http://automationpractice.com/"
    When I press "Faded Short Sleeve T-shirts"
    Then I should see "Add to cart"

  Scenario: Search if the button "Add to cart" text exists on homepage
    Given I am on "http://automationpractice.com/"
    Then I should see "Add to cart"

  Scenario: Search if the a text exists on homepage
    Given I am on "http://automationpractice.com/"
    Then I should see "Faded Short Sleeve T-shirts"

  Scenario: See if we can add to cart a product
    Given I am on "http://automationpractice.com/index.php?id_product=1&controller=product"
    When I press "Add to cart"
    Then I should see "Product successfully added to your shopping cart"

  Scenario: See if we can add to cart a product and go to checkout
    Given I am on "http://automationpractice.com/index.php?controller=order"
    Then I should see "SHOPPING-CART SUMMARY"

  Scenario: Check to see if the shopping cart is empty
    Given I am on "http://automationpractice.com/index.php?controller=order"
    Then I should see "Your shopping cart is empty."

  Scenario: Check if there is an item in cart
    Given I am on "http://automationpractice.com/index.php?id_product=1&controller=product"
    When I press "Add to cart"
    Then I should see "There are 1 items in your cart. "   