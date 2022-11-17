1. Our first hello world



1. Dependancies and lessons: 
You will need php installed to see the Hello, World! code. 
If you look at the source you will see: <h2>h2 Hello, World!</h2>   as the php is rendered server side it is not visible to client machines. 
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

