#after seeing the two tasks i can conlude that task-2 better version of task-1 i can fetch dynamically produt names, profit margins,shipping cost
#but as the test suggests to do two tasks i am doing task-1 first
#before continue to task-2 i can see task 2 is the better version from task1 i wanted to combine both then it will save lot of time 
#Feature (1) :selling price calculation
##overview
The selling price feature allows generate the sale at a Coffee outlet by calculating the Selling price based on Quantity and Unit costs with some percentage (profit margin ,shipping cost)

1. **User Input**:Users provide the quantity and unit cost inputs
2. **Calculation Logic**: JavaScript calculates the selling price based on predefined percentages and displays it in the view.

3. **Route Setup**: A POST route is created to handle the user input and calculation and displaying the previous sales.

    - Filename: `routes/web.php`

4. **Controller Creation**: A controller is created to handle the POST request.

    - Filename: `app/Http/Controllers/CoffeeController.php`

5. **Model Handling**:  model is used to handle the storage

    - Filename: `app/Models/Coffeesale.php`
6. **Migrations** : Created coffee_sales table to store sales data with coressponding columns


##Feature-1 Test Cases 
#implemented Feature Test case option to test Sales 

1. **Generated Test case File**:
--Filename:`tests\Feature\CoffeeSaleTest.php`

2.**Generated Factory File to use with testcase**
--Filename:`database\factories\UserFactory.php`

##Feature-2
1.Product Details implemented dynamically 
--file:'app\Http\Controllers\ProductController.php'
Model:
--file:'app\Models\Product.php'

2.Cofee sales page modification
#fetched product name in the dropdown from db 
#calculated selling price based on profit margin and shipping cost
#used ajax and javascript in view to load the selling price simultenously
#stored product_id from product table into sales table to create relationship(joins)
#implemented joins to display product name by using inbuilt ORM features a


3:Testcase Product Test case

file:'tests\Feature\ProductTest.php'
#implemented test cases for Product details view and post methods created factory file

#implemented db seeders for default product table data