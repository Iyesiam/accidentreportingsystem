#**ACC_REPO_SYS** ---- An Accident Reporting System 

ChatGPT
Revised Project Summary:

This project is a repository system for managing accidents, where users can add new accident records, and administrators have additional functionalities to view, update, and delete accident records. Users are required to log in to add accident records, while administrators have access to the full range of functionalities.

Key Functionalities:

User Authentication:

Users: Users can log in using their username and password. User credentials are stored in the "users" table of the "a_repo_sys" database.
Administrators: Administrators have elevated privileges and can access additional functionalities beyond regular users.
Accident Management:

Add Accident: Users can add new accident records by filling out a form that includes fields for datetime, location, severity, city, and description. The form validates user inputs and inserts the data into the "accidents" table.
View Accidents: Both users and administrators can view a list of accident records. The table displays details such as datetime, location, severity, city, and description.
Update and Delete Accidents: Only administrators can update and delete accident records. Administrators have access to the "Update" and "Delete" buttons next to each record, allowing them to modify accident details or remove records from the database.
User Management:

User Registration: Users can create new accounts by providing a username, email, phone number, and password. The registration form validates user inputs and inserts the data into the "users" table.
User Access: Regular users (non-administrators) have limited functionalities and can only add new accident records.
Administrator Access: Administrators have access to all functionalities, including viewing, updating, and deleting accident records. Administrators can also manage user accounts, such as updating user information or deleting user records.
Session Management:

User Login: Users are required to log in to add accident records. PHP sessions are used to manage user login and ensure that only authenticated users can access the add accident form.
Session Restriction: Regular users (non-administrators) are restricted from accessing functionalities reserved for administrators, such as updating or deleting accident records.
Logout:

Logout Feature: Both users and administrators can securely log out from their accounts. Clicking the "Logout" button clears the session data and redirects the user to the login page

#### Credits:

- Bootstrap 4
  
- Font Awesome
  
- jQuery
  
- Gulp
  
- Chart.js
  
- Google Maps
  
- Perfect Scrollbar



#### Browser Support:

- Chrome (latest)
  
- FireFox (latest)
  
- Safari (latest)

- Opera (latest)

- IE10+


