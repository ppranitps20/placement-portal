# Placement-Portal

The online placement portal application allows placement seekers and recruiters to connect.The application provides the ability for placement seekers to create their accounts, upload their profile and resume, search for placements, apply for placements, view different placement openings. The application provides the ability for companies to create their accounts, search candidates, create placement postings, and view candidates applications.


# Installation

Download the latest job.sql file.


Step 1: Create a database called job and import everything from job.sql file. Next check your db.php file for database connection configuration

```php
//Your db.php Mysql Config
$servername = "localhost";
$username = "root";
$password = "yourpassword";
$dbname = "job";
```

Step2: Move the cloned repository into the htdocs folder of your server


Step3: Now you login as candidate with following details

```php
Email: uttkarsh@gmail.com	
Password: 123456
```

Step4: Now you login as Company with following details

```php
Email: intel@intel.com
Password: 123456789
```

Step5: Now you login as Admin with following details

```php
Username: admin
Password: 123456
//Note: Password is not encrpyted from code so you CAN change directly from database.
```

Candidates Email Confirmation:
>You CANNOT send emails from localhost server. So when you create a new candidate account it will not send any emails. So you must go to database, find that user and set ```active=1``` in order to make that account login. 

