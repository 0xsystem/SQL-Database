<?php

/*####################################################################
######################################################################
######################Sys Secure Database#############################
##########################Connection in###############################
##############################PHP#####################################
######################################################################
######################################################################
######################################################################
*/
$dbhost = 'localhost';
$dbuser = 'your_database_username';
$dbpass = 'your_database_password';
$dbname = 'your_database_name';
$dn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$dn) {
  die('Could not connect to database: ' . mysqli_connect_error());
}
function Funny($input) {
  global $dn;
  $input = mysqli_real_escape_string($dn, $input);
  return $input;
}
function get_data($id) {
  global $dn;
  $id = Funny($id);
  $sql = "SELECT * FROM your_table WHERE id='$id'";
  $result = mysqli_query($dn, $sql);
  if (!$result) {
    die('Error querying database: ' . mysqli_error($dn));
  }
  $data = mysqli_fetch_assoc($result);
  return $data;
}
function insert_data($name, $email, $message) {
  global $dn;
  $name = Funny($name);
  $email = Funny($email);
  $message = Funny($message);
  $sql = "INSERT INTO your_table (name, email, message) VALUES ('$name', '$email', '$message')";
  $result = mysqli_query($dn, $sql);
  if (!$result) {
    die('Error inserting data into database: ' . mysqli_error($dn));
  }
}
mysqli_close($dn);
?>
