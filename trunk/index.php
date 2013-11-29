<?php
    include("common/header.php");
?>

<?php if(isset($userdata)){

    switch($userdata->userType){
        case "admin":
            include("admin/adm-menu.php");
            include("homepage.php");
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
<!-- Nav tabs -->
    <ul id="logReg" class="nav nav-tabs">
        <li class="active"><a href="#loginTab" data-toggle="tab">Login</a></li>
        <li><a href="#registerTab" data-toggle="tab">Register</a></li>
    </ul>

<!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="loginTab">
            <form class="loginForm" id="login" action="admin/" method="post">
                <fieldset>
                    <input type="text" name="username" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password"/>
                </fieldset>
                <div>
                    <button type="submit">Log in</button>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="registerTab">
            <form class="loginForm" id="register" action="admin/register.php" method="post">
                <fieldset>
                    <p>Keep in mind, that we require all fields to register a user.</p>
                    <input type="text" name="username" placeholder="Username"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="password" name="reTypepassword" placeholder="Password"/>
                    <input type="email" name="email" placeholder="Your E-main address"/>
                    <input type="tel" name="telephone" placeholder="Your Phone number"/>
                </fieldset>
                <div>
                    <button type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>
    
<?php
}   
?>


<?php
    include("/common/footer.php");
?>