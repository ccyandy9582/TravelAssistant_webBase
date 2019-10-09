<?php 
    echo password_hash($_POST["password"], PASSWORD_BCRYPT);
    echo "<br>".strlen('$2y$10$GoMVmM/EF2AigmhsFj66out2YPhW27oqNfsLsbIQwyi2nbPXbQ9HG');

    if(isset($_POST["password"])&&isset($_POST["c_password"])&&isset($_POST["email"])) {
        $error=false;
        if (!(preg_match("/^.+@.+\\..+$/", $_POST["email"])))
            $error=true;
        if (!(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\\\|;:'\\\",<.>\/?])(?=.{8,})/",$_POST["password"])))
            $error=true;
        if ($_POST["password"]!=$_POST["c_password"])
            $error=true;
    } else {
        $error=true;
    }
    if($error) {
        echo "
            <script>
                alert('Error!\\nSomething went wrong');
                location.reload();
            </script>
        ";
    } else {
        $required=true;
        require("database.php");
        
    }
    ?>