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

Step2: Now you login as candidate with following details

```php
Email: uttkarsh@gmail.com	
Password: 123456789
```

Step3: Now you login as Company with following details

```php
Email: intel@intel.com
Password: 123456
```

Step4: Now you login as Admin with following details

```php
Username: admin
Password: 123456
//Note: Password is not encrpyted from code so you CAN change directly from database.
```

Candidates Email Confirmation:
>You CANNOT send emails from localhost server. So when you create a new candidate account it will not send any emails. So you must go to database, find that user and set ```active=1``` in order to make that account login. 

>If you are testing on real server then you can uncomment the following code from ```adduser.php```

```php
// Send Email
$to = {CANDIDATE_EMAIL ADDRESS};
$subject = "Placement Portal - Confirm Your Email Address";
$message = '
    <html>
    	 <head>
		    <title>Confirm Your Email</title>
		</head>
		<body>
		    <p>Click Link To Confirm</p>
		    <a href="{YOUR_REAL_DOMAIL}/verify.php?token='.$hash.'&email='.$email.'">Verify Email</a>
		</body>
	</html>
';
$headers[] = 'MIME-VERSION: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'To: '.$to;
$headers[] = 'From: hello@yourdomain.com';
// You can add more headers like Cc, Bcc;
$result = mail($to, $subject, $message, implode("\r\n", $headers)); // \r\n will return new line. 
if($result === TRUE) {
//If email sent successfully then Set some session variables and redirect to login page
	$_SESSION['registerCompleted'] = true;
	header("Location: login.php");
	exit();
}
```"# placement-portal" 
