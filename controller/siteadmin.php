<?php
require_once("../model/siteadmin.php");
require_once("../model/dataAccess.php");

if (isset($_POST["newTent"]))
{

    $results = addAdmin(1,"user","password");
}

require_once("../view/siteadmin_view.php");
?>