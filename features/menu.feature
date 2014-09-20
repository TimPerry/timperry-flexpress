Feature: Menu
  As a user of the website
  I want to use the menu

  Scenario: Use the menu to open the photography page
    Given I am on the homepage
    When I click on the photography menu item
    Then I should see the photography page
    
  Scenario: Use the menu to open the about page
    Given I am on the homepage
    When I click on the about menu item
    Then I should see the about page
    
  Scenario: Use the menu to open the contact page
    Given I am on the homepage
    When I click on the contact menu item
    Then I should see the contact page