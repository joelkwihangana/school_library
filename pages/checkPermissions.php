<?php
function checkParmissions($path)
{
    if (!isset($_SESSION["userType"])) {
        header('Location:$path');
    }
}
