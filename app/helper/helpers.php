<?php

function approvement()
{
    return [
        '0' =>  'Disabled',
        '1' =>  'Approved'
    ];
}

function position()
{
    return [
        '1' =>  'Admin',
        '2' =>  'Moderator',
        '3' =>  'Editor',
        '4' =>  'Ordinary User'
    ];
}
function maxPrice()
{
    $maxPrice = App\Product::max('price');
    return $maxPrice;    
}

function settingType()
{
    return [
        '1'  => 'Short Text',
        '2'  => 'Long Text',
        '3'  => 'File Upload',
    ];
}

function allowment()
{
    return [
        '0'  =>  'Not Allowed',
        '1'  =>  'Allowed'
    ];
}

function status()
{
    return [
        '0' =>  'New [ Less than 1 Month]',
        '1' =>  'Medium [ 1 Month to 5 Months]',
        '2' =>  'Old [ More than 5 Months]'
    ];
}

function getsetting($name)
{
    $setting = App\Sitesetting::where('setting_name',$name)->first();
    return $setting->setting_value;
}

function getmessages()
{
    $contacts = App\Contact::all();
    return $contacts;
}
function getuserbyemail($email)
{
    $user = App\User::where('email',$email)->first();
    return $user;
}