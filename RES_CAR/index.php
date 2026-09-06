<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="process.php" method="POST">
        <input type="date" name="rent_date">
        <br>
        <input type="time" name="rent_time">
        <br>
        <input type="text" name="payment" placeholder="enter payment">
        <br>
        <input type="time" name="return_date">
        <br>
        <button type="submit" name="reg">REGISTER</button>
        <a href="index.php">HOME</a>
        <a href="view.php">VIEW</a>
    </form>
</body>
</html>