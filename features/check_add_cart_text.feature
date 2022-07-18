Feature: Add to cart check
  In order to properly add to cart items we should check each process step in a scenario

	Scenario: Check if there is an item in cart
    Given I am on "http://automationpractice.com/index.php?id_product=1&controller=product"
    When I press "Add to cart"
    Then I should see "Proceed to checkout"
    Given I am on "http://automationpractice.com/index.php?controller=order"
    Then I should see "Faded Short Sleeve T-shirts"
    Given I am on "http://automationpractice.com/index.php?controller=order"
    When I go to "http://automationpractice.com/index.php?controller=order&step=1"
    Then I should see "Create an account"
		Given I am on "http://automationpractice.com/index.php?controller=order&step=1"
    When I fill in "email_create" with "vioice7@yahooo.com"
    And I press "Create an account"
    Then I should see "Your personal information"