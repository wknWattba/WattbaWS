<?php 
class siteadmin {
    private $adminID;
    private $adminUser;
    private $adminPass;

    function __get($siteadmin){
        return $this->$siteadmin;
    }

    function __set($siteadmin,$value){
        $this->$siteadmin = $value;
    }
}
?>