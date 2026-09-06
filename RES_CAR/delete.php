<?php

include "conn.php";

$trans_id = $_GET['trans_id'];

$delete = mysqli_query($conn, "DELETE FROM clinic_appointment WHERE trans_id ='$trans_id' ");

if($delete){
    ?>
        <script>
            alert("DATA DELETED!");
            location.href="view.php";
        </script>
    <?php
}


?>