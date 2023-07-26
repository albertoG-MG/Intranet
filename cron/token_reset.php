<?php

  $DB_hostname = "localhost";
  $DB_name     = "sntt_intranet";
  $DB_username = "snttint2022";
  $DB_password = "7OAe23QjJCpl";

  $conn = new mysqli($DB_hostname, $DB_username, $DB_password, $DB_name);
  
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


  $conn->query("DELETE FROM reset_password WHERE exp_date < NOW()");
  
  $conn->close();

?>