<?php
session_start();

// initializing variables
$username = "";
$usersurname = "";
$email    = "";
$group = "";
$maisID = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'users');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $usersurname = mysqli_real_escape_string($db, $_POST['usersurname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $group = mysqli_real_escape_string($db, $_POST['group']);
  $maisID = mysqli_real_escape_string($db, $_POST['maisID']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "User name is required"); }
  if (empty($usersurname)) { array_push($errors, "User surname is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($group)) { array_push($errors, "Group is required"); }
  if (empty($maisID)) { array_push($errors, "MAIS ID is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO users_table (Name, Surname, Class,MaisNum) 
  			  VALUES('$username', '$usersurname', '$group', '$maisID')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}