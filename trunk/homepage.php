<?php
    if(isset($userdata)){
        switch($userdata->userType){
            case "admin":
                include("admin/adm-main.php");
                break;
            default:
                break;
        }
    }
?>
<div class="innerContainer">
    <p>order a taxi</p>
</div>