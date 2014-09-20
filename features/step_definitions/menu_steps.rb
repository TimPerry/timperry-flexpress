Given 'I am on the homepage' do
  visit '/'
end

When 'I click on the photography menu item' do
  within('.primary-nav') do
    click_link('Photography')
  end
end

Then 'I should see the photography page' do
  expect(find('.page-title').text) == 'PHOTOGRAPHY'
end

When 'I click on the about menu item' do
  within('.primary-nav') do
    click_link('About')
  end
end

Then 'I should see the about page' do
  expect(find('.page-title').text) == 'ABOUT'
end

When 'I click on the contact menu item' do
  within('.primary-nav') do
    click_link('Contact')
  end
end

Then 'I should see the contact page' do
  expect(find('.page-title').text) == 'CONTACT'
end