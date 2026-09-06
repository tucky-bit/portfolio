<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "conn.php";
        
        $trans_id = $_GET['trans_id'];

        $get_data = mysqli_query($conn, "SELECT * FROM clinic_appointment WHERE trans_id=' $trans_id'");
        while($data = mysqli_fetch_array($get_data)){

        
    ?>
    <form action="process.php?trans_id=<?php echo $data['trans_id']; ?>" method="POST">
        <input type="date" name="rent_date" value="<?php echo $data['rent_date'] ?>">
        <br>
        <input type="time" name="rent_time" value="<?php echo $data['rent_time'] ?>">
        <br>
        <input type="text" name="payment" value="<?php echo $data['payment'] ?>" placeholder="enter payment">
        <br>
        <input type="date" name="return_date" value="<?php echo $data['return_date'] ?>">
        <br>
        <button type="submit" name="update_details">Update</button>
        <a href="index.php">HOME</a>
        <a href="view.php">VIEW</a>
        </form>
        <?php
            }
        ?>
</body>
</html>