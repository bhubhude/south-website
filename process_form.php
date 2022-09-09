<?php
// define variables and set it to empty values
$fname_error = $lname_error = $email_error = $phone_error = $district_error = $phone_error = "";
$fname = $date = $lname = $email = $phone = $district = $phone = $success = "";


//form is submitted with post method
if ($_SERVER ["REQUEST_METHOD"]=="POST") {
    if (empty($_POST['fname'])) {
        $fname_error ="Igama required";
    }else {
        $fname = test_input($_POST['fname']);
        //check if only name contains letters and whitespaces
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
            $fname_error = "Only letters and white spaces allowed";
        }
    }

    if (empty($_POST['lname'])) {
        $lname_error = "Isibongo Required";
    }else {
        $lname = test_input($_POST['lname']);
        //check if only name contains letters and whitespaces
        if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
            $lname_error = "Only letters and whitespaces allowed";
        }

    }

    if (empty($_POST['email'])) {
        $email_error = "Email is required";
    }else {
        $email = test_input($_POST['email']);
        //check if email is well formatted
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = "Invalid Email format";
        }
    }

    if (empty($_POST['mobile'])) {
        $phone_error = "Phone number is require";
    }else {
        $phone = test_input($_POST['mobile']);
        //check phone is well formatted
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
            $phone  = "Invalid phone";
        }
    }

    if (empty($_POST['province'])) {
        $province_error = "Province Required";
    }else {
        $province = test_input($_POST['province']);
        //check if only name contains letters and whitespaces
        if (!preg_match("/^[a-zA-Z]*$/",$province)) {
            $province_error = "Only letters and whitespaces allowed";
        }

    }

    if (empty($_POST['district'])) {
        $district_error = "District Required";
    }else {
        $district = test_input($_POST['district']);
        //check if only name contains letters and whitespaces
        if (!preg_match("/^[a-zA-Z]*$/",$district)) {
            $district_error = "Only letters and whitespaces allowed";
        }

    }

    if (isset($_POST['submit'])){
    if (!empty($_POST['a'])) {
        echo ' ' . $_POST['a'];
    }else {
        echo 'Please select the value';
    }

    }
    if (isset($_POST['submit'])){
    if (!empty($_POST['cert'])) {
        echo ' ' . $_POST['cert'];
    }else {
        echo 'Please select the value';
    }

    }

    if ($fname_error =='' and $lname_error =='' and $email_error == '' and $phone_error =='' and $district_error =='' and $phone_error == ''){
        $message_body = '';
        unset($_POST['submit']);
        foreach ($_POST as $key => $value){
            $message_body .= "$key:$value\n";
        }
        
        $to = 'tsholotshosouthmrp2014@gmail.com';
        $subject = 'contact';
        if (mail($to, $subject,$mesasge)) {
            $success ='Siyabonga ukuvakatshela ubulembu bethu ';
            $fname = $date = $lname = $email = $phone = $district = $phone = $success = "";
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>