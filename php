1. Our first hello world
2. Our First form



1. Dependancies and lessons: 
You will need php installed to see the Hello, World! code. 
If you look at the source you will see: <h2>h2 Hello, World!</h2>   as the php is rendered server side it is not visible to client machines. 
Your client browser will not let you open .php  However, if you select other app and select browser to force it, for me it just kept opening it continuously.
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
