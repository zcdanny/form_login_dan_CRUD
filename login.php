<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Form Login</h1>
        <?php 
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
        ?>
        <form action="proses_login.php" method="post">
            <label for="username">Username :</label>
            <input type="text" name="username" id="username"></br>

            <label for="password">password :</label>
            <input type="password" name="password" id="password"></br>

            <input type="submit" value="Login">
        </form>
    </main>
    
</body>
</html>