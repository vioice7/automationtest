# Automation Test

Check the cart flow element on PrestaShop.

Used PHP language, (Symfony, Behat and Mink)

The tests are made by parsing .feature files or by running php files directly.

---

## Usage

Run these commands to update your pacakges and then run the test features:

- Update the Symfony vendor 
`composer update`

---

- To run the .feature files
`./vendor/bin/behat`
(feature file location /features/*.feature)
The bootstrap file for the Context is in /features/bootstrap/FeatureContext.php (it extends the MinkContext class)
The feature files use Gherkin language to describe the testing process.

---

- To run directly the mink php files
`php mink_register.php` (atempt to register a user)
`php mink_user.php` (atempt to buy a product with a user already registered)

---

Also note that Selenium java server must run with the browser driver

- Java server must run in order to use Selenium instead of Goutte (make shure gekodriver is available)
`java -jar -Dwebdriver.firefox.driver="/home/(loc)/automation/drivers/geckodriver" selenium-server-(ver).jar -debug`

Note:
The tests may have some issues due to the nature of some of the page elements (some elements are identified but can't process them), delay load time (should be solved with a hook function that waits for a page to load) or the out of view element issue (a button may not be found in the viewport).