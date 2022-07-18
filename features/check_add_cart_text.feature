Feature: Add to cart check
  In order to properly add to cart items we should check each process step in a scenario

  @javascript
	Scenario: Check if there is an item in cart
    Given I am on "http://automationpractice.com/index.php?id_product=1&controller=product"
    When I press "Add to cart"
    When I wait 10 seconds
    Given I am on "http://automationpractice.com/index.php?controller=order"
    When I wait 5 seconds
    Then I should see "Proceed to checkout"
    Given I am on "http://automationpractice.com/index.php?controller=order&step=1"
    When I wait 5 seconds
    Then I should see "Create an account"
    Given I am on "http://automationpractice.com/index.php?controller=order&step=1"
    When I fill in "email_create" with "vioice7@yahooo.com"
    And I press "Create an account"
    And I wait 10 seconds
    Then I should see "Your personal information"

