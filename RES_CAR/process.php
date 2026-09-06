<?php

include "conn.php";

if(isset($_POST['reg'])){
    $rent_date = $_POST['rent_date'];
    $rent_time = $_POST['rent_time'];
    $payment = $_POST['payment'];
    $return_date = $_POST['return_date'];

    $insert = mysqli_query($conn, "INSERT INTO clinic_appointment VALUES('0', '$rent_date', '$rent_time', '$payment', '$return_date')");
}


//update function
if(isset($_POST['update_details'])){
    $ref_id = $_GET['trans_id'];
    $upd_rent_date = $_POST['rent_date'];
    $upd_rent_time = $_POST['rent_time'];
    $upd_payment = $_POST['payment'];
    $upd_return_date = $_POST['return_date'];

    $update = mysqli_query($conn, "UPDATE clinic_appointment SET 
    rent_date = '$upd_rent_date', rent_time = '$upd_rent_time', payment = '$upd_payment', return_date = '$upd_return_date' WHERE trans_id='$ref_id'");

    if($update){
        ?>
            <script>
                alert("Clinic Appointment Updated!!");
                location.href='view.php';
            </script>
        <?php
    } else
        ?>
            <script>
                alert("Error Updating Details");
                location.href='view.php';
            </script>
        <?php
}
?>