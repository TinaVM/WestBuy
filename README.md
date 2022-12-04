# WestBuy
WestBuy is a mock secondhand e-bookstore for the students of the University of North West.

Key features of the web application enable students to register and login on the web application, view used textbooks that have been loaded 
onto the application, view their shopping cart and edit items in the cart and buy a used textbook.

## Dependencies
* Ajax jquery
* PHP
* HTML
* CSS
* MySQL
* JavaScript

## Student Main Functions:
* Browse books with live search feature
* View books and add them to cart with the options to - Checkout, View past purchases, Continue shopping, remove an item
* Enter banking details

## Setup
* Must have WAMP Server or XAMP to run local website.
* Web application runs on localhost:8080 server.
1. Create the 'bookstore' database in phpmyadmin
2. Enter and run 'localhost:8080/WestBuy/connections/db.php' in browser to connect to the database.
3. Run the 'loadBookStore.php' file that is found in the 'connections' folder in browser to create all the necessary tables for the database. e.g. 'localhost:8080/WestBuy/connections/loadBookStore.php'


## Web Application Walkthrough

### Register Page
![image](https://user-images.githubusercontent.com/92442291/193074797-d01a319e-3574-4088-8827-8efa94c6663b.png)
![image](https://user-images.githubusercontent.com/92442291/193075099-73637631-b941-48fa-b2d6-688f5668b8b8.png)
The student will be presented with the login page of which if it is their first time using the web app, they will need to register their details such as their:
1. Student ID consisting of the first 3 characters being 'NWU' followed by 7 unique digits e.g. NWU1011678
2. Name
3. Surname
4. Student email address which consists of the student's Student ID followed by '@northwestu.ac.za' e.g. NWU1011678@northwestu.ac.za and failure to present the email in this way will cause the application to send an 'email address invalid' notification.
5. Cellphone Number
![image](https://user-images.githubusercontent.com/92442291/193075341-00d11386-84e4-4d4a-a315-e6e511a4c804.png)
![image](https://user-images.githubusercontent.com/92442291/193075728-c326d53d-9b14-4f59-9de2-315ab713f640.png)



