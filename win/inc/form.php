<?php


$firstName = "";
$lastName  = "";
$email     = "";

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => ''
];


$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName  = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $email     = isset($_POST['email']) ? $_POST['email'] : '';

if (isset($_POST['submit'])) {



    
    if (empty($firstName)) {
        $errors['firstNameError'] = 'يجب إدخال الاسم الأول';
    } 

    if (empty($lastName)) {
        $errors['lastNameError'] = 'يجب إدخال اسم الأخير';
    }

    if (empty($email)) {
    $errors['emailError'] = 'يجب إدخال البريد الإلكتروني';


} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailError'] = 'يجب إدخال بريد إلكتروني صالح';
}

    
    if(!array_filter($errors)){

$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

  $sql = "INSERT INTO users (firstName, lastName, email) 
            VALUES ('$firstName', '$lastName', '$email')";

       $sql = "INSERT INTO users (firstName, lastName, email) 
                VALUES ('$firstName', '$lastName', '$email')";

        if (mysqli_query($conn, $sql)) {
            header('Location:'. $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo 'error: ' . mysqli_error($conn);
        }
}
   
    }



