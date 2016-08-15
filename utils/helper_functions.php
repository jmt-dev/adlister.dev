<?php
require_once __DIR__ . '/../utils/helper_functions.php';
require_once __DIR__ . '/../utils/Input.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Ad.php';
// List of helper functions used throughout the application.
// Primarily used within the PageController function.


// takes image from form submission and moves it into the uploads directory
function saveUploadedImage($input_name)
{
    $valid = true;
    // checks if $input_name is in the files super global
    if(isset($_FILES[$input_name]) && $_FILES[$input_name]['name'])
    {
        // checks if there are any errors on the upload from the submission
        if(!$_FILES[$input_name]['error'])
        {
            $tempFile = $_FILES[$input_name]['tmp_name'];
                $image_url = '/img/uploads' . $input_name;
                move_uploaded_file($tempFile, __DIR__ .'/../public' . $image_url);
                return $image_url;
        }
    }
    return null;
}

function callAllAds() {
    return Ad::all();
}

function newUser(){

    if (Input::has('name')) {
        //new object user, passing variables from page into user
        $user = new User();
        $user->name = Input::get('name');
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->save();
    }
}

function createAd(){
    //new object user, passing variables from page into user
    $ads = new Ad();
    if($_POST) {
        $ads->title = Input::get('title');
        $ads->description = Input::get('description');
        $ads->user_id = Auth::id();
        $now = new DateTime('now');
        $ads->date_created = date_format($now, 'Y-m-d');
        $ads->save(); 
    }
    $data['ads'] = $ads;
    return $data;
}

function loginUserWithInputIfExists() {
    if (!empty($_POST)) {
        $username = Input::has('email_user') ? Input::get('email_user') : '';
        $password = Input::has('password') ? Input::get('password') : '';
        if (Auth::attempt($username, $password)) {
            session_start();
            header('Location: /users/account');
            exit(0);
        }
    }
}

?>