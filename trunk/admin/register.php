<?php
    include("../common/header.php");
?>
<div class="innerContainer">
    <h3>
        Your user request has been issued!
    </h3>
    <p>
        Only valid users with valid e-mail and valid phonenumber can order taxies.
        We'll send you an e-mail and a text message please fill in both fields
    </p>
    <form class="loginForm" action="validate.php">
        <fieldset>
            <input type="hidden" name="validationKEY" value="<?php $_REQUEST['vKEY']?>"/>
            <input type="text" name="validationEMAIL" placeholder="validation code sent to email"/>
            <input type="text" name="validationTXT" placeholder="validation code sent to phone"/>
        </fieldset>
    </form>
</div>
<?php
    include("../common/footer.php");
?>