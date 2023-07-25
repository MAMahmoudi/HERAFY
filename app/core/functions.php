<?php

function Clean_String($My_String)
{
    $My_String = trim($My_String);
    $My_String = htmlspecialchars($My_String, ENT_QUOTES, 'UTF-8');
    $My_String = strip_tags($My_String);
    return $My_String;
}

function Redirect_To($My_location)
{
    header("Location:" . My_Files_Root .  $My_location);
    die;
}
