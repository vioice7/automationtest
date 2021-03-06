Feature: Add to cart check
  In order to properly add to cart items we should check each process step in a scenario

  @javascript
	Scenario: Check if there is an item in cart
    Given I am on "http://automationpractice.com/index.php?id_product=1&controller=product"
    When I press "Add to cart"
    And I wait 10 seconds
    Then I should see "Proceed to checkout"
    Given I am on "http://automationpractice.com/index.php?controller=order"
    Then I should see "Faded Short Sleeve T-shirts"
    Given I am on "http://automationpractice.com/index.php?controller=order"
    When I go to "http://automationpractice.com/index.php?controller=order&step=1"
    Then I should see "Create an account"
	Given I am on "http://automationpractice.com/index.php?controller=order&step=1"
    When I fill in "email_create" with "vioice7@yahooo.com"
    And I press "Create an account"
    When I wait 10 seconds
    When I select "1" from "id_gender"
    And I fill in "customer_firstname" with "Test0"
    And I fill in "customer_lastname" with "Test1"
    And I fill in "passwd" with "Test10()"
    And I select "7" from "days"
    And I select "November" from "months"
    And I select "1986" from "years"
    And I fill in "firstname" with "Test0"
    And I fill in "lastname" with "Test1"
    And I fill in "company" with "Test"
    And I fill in "address1" with "Str. C100"
    And I fill in "address2" with ""
    And I fill in "city" with "New York"
    And I fill in "phone_mobile" with "555 123 4567890"
    And I fill in "alias" with "Adress10"
    And I select "United States" from "id_country"
    And I press "submitAccount"
    Then I should see "This country requires you to choose a State."