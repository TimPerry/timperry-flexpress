require 'capybara/cucumber'
require 'rspec/expectations'

Capybara.configure do |config|
  config.default_driver = :selenium
  config.app_host = 'http://timperry.co.uk'
end

Capybara.register_driver :selenium do |app|
  Capybara::Selenium::Driver.new(app, :browser => :chrome, :switches => %w[--test-type])
end

window = Capybara.current_session.driver.browser.manage.window
window.resize_to(1440, 900)