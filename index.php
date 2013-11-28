<?php
    include("common/header.php");
?>

<?php if(isset($userdata)){?>
    <p>you are loged in as <?php echo $userdata->username ?></p>
    
<?php
    switch($userdata->userType){
        case "admin":
            include("admin/adm-menu.php");
            break;
        case "dispatcher":
            include("admin/disp-menu.php");
            break;
        case "driver":
            include("admin/drv-menu.php");
            break;
        case "user":
            include("admin/usr-menu.php");
            break;
        default:
            break;
    }
} else{ ?>
    <a href="/admin">User log in</a>
<?php
}   
?>


<?php
    include("/common/footer.php");
?>