
<?php
    ### admin-main.php
    ### directs the menu links to actions.
    ### Menu has to be moved to templates.
?>

<a href="?action=adduser">lisa kasutaja</a>
<a href="?action=edituser">muuda kasutajaid</a>
<a href="?action=deleteuser">kustuta kasutajaid</a>
<a href="?action=addorder">lisa tellimus</a>
<a href="?action=editorder">muuda tellimusi</a>
<a href="?action=addorder">lisa auto</a>
<a href="?action=editorder">muuda autot</a>

<?php


    if(isset($_REQUEST["action"])){
        $action=$_REQUEST["action"];    
        switch($action){
            case "adduser":
                include($sitevar->actionsPath."adduser.php");
                break;
            case "edituser":
                include($sitevar->actionsPath."edituser.php");
                break;
            case "deleteuser":
                include($sitevar->actionsPath."deleteuser.php");
                break;
            case "addorder":
                include($sitevar->actionsPath."addorder.php");
                break;
            case "editorder":
                include($sitevar->actionsPath."editorder.php");
                break;
            case "addcar":
                include($sitevar->actionsPath."editorder.php");
                break;
            case "editcar":
                include($sitevar->actionsPath."editorder.php");
                break;
            default:
                echo "no such action";
                break;
        }
    }


?>
