use grocery_store;

#Retrieve the name and number in stock of products with less than 100 in stock
select product_name, product_stock
from products
where product_stock <= 100;

#Retrieve the name and ID of the most purchased product and the total amount of it sold
select product_name, products.product_id, sum(number_of_product) as total_sales
from products, transactions_products
where products.product_id = transactions_products.product_id
group by product_id
order by total_sales desc
limit 1;

#Update price of product 2 to 0.4
update products
set product_price = 0.4
where product_id = 2;

#Insert a new employee with following values:
#employee_id = 6
#employee_name = 'John Cash'
#employee_address = '420 Nice St'
#employee_phone = '870-420-6969'
#employee_position = 'Clerk'
#employee_salary = 1800
insert into employees (employee_id, employee_name, employee_address, employee_phone, employee_position, employee_salary)
values (6, 'John Cash', '420 Nice St', '870-420-6969', 'Clerk', 1800)