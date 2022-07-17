Feature: Add to cart check
  In order to properly add to cart items we should check each process step in a scenario
  
  Scenario: Search for a word that exists
    Given I am on "http://automationpractice.com/"
    Then I should see "Add to cart"