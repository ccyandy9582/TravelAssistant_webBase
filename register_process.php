<?php 
    echo password_hash($_POST["password"], PASSWORD_BCRYPT);
    echo "<br>".strlen('$2y$10$GoMVmM/EF2AigmhsFj66out2YPhW27oqNfsLsbIQwyi2nbPXbQ9HG');
?>