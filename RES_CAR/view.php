<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">HOME</a>
    <a href="view.php">VIEW</a>
    <table class="table">
        <thead>
            <tr>
                <th>trans_id</th>
                <th>rent_date</th>
                <th>rent_time</th>
                <th>payment</th>
                <th>return_date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "conn.php";
            $get_data = mysqli_query($conn,"SELECT * FROM clinic_appointment");
            while($data = mysqli_fetch_array($get_data)){

            
            ?>
            <tr>
                <td><?php echo $data['trans_id']; ?></td>
                <td><?php echo $data['rent_date']; ?></td>
                <td><?php echo $data['rent_time']; ?></td>
                <td><?php echo $data['payment']; ?></td>
                <td><?php echo $data['return_date']; ?></td>
                <td><a href="delete.php?trans_id=<?php echo $data['trans_id'] ?>">Delete</a></td>
                <td><a href="update.php?trans_id=<?php echo $data['trans_id'] ?>">Update</a></td>
            </tr>
            <?php
                  }
            ?>
        </tbody>
    </table>  
</body>
</html>