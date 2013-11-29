<?php
    $getUsers=$taxiDB->prepare("Select userID,username,userType from users");
    $getUsers->bind_result($userid,$username,$userType);
    $getUsers->execute();
    $users=array();
    while($getUsers->fetch()){
        $users[$userid]=$userid;
        $users[$userid]=$username;
        $users[$userid]=$userType;
    }
    preDump($users);
?>
<div class="innerContainer">
    <h3>
    <?php
        echo "Hello ".$userdata->username."!";
    ?>
    </h3>
    <p>
        populate this with a table of users
    </p>
</div>