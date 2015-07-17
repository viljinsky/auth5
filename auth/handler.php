<?php

    $user_id = filter_input(INPUT_GET,'user_id');
    if (!empty($user_id)){
        ?>
        <script>showDialog('change_psw');</script>
        <?php
    } else {
        if (isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <script> 
            alert('<?php echo $message; ?>');
            </script>
            <?php
        } else if(isset($_SESSION['error'])) {
            $error =$_SESSION['error'];
            unset($_SESSION['error']);
            ?>
            <script>
              alert('<?php echo $error; ?>');                  
            </script>
             <?php
        }
    }

