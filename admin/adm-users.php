<?php
    $getUsers=$taxiDB->prepare("Select userID,username,userType from users");
    $getUsers->bind_result($userid,$username,$userType);
    $getUsers->execute();
    $users=array();
    while($getUsers->fetch()){
        $users[$userid]=array("userid"=>$userid,"username"=>$username,"userType"=>$userType);
    }
    $userTypesArray=array();
    $getAllowedUserTypes=$taxiDB->prepare("select typeName from userTypes");
    $getAllowedUserTypes->bind_result($userTypes);
    $getAllowedUserTypes->execute();
    while($getAllowedUserTypes->fetch()){
        array_push($userTypesArray,$userTypes);
    }
   
   
    //preDump($users);
?>
<div class="innerContainer">
    <h3>
    <?php
        echo "Hello ".$userdata->username."!";
    ?>
    </h3>
    <p>
            <div>
                
                <form action="?action=editUsers&subAct=adduser" method="post">
                    <?php echo "<input type='text' name='newUsername' value=''/><br/>" ;?>
                    <?php echo "<input type='text' name='newPass' value=''/><br/>" ;?>
                    <?php echo "<input type='text' name='newPassRepeat' value=''/><br/>";
                    $userTypeSelect="<select name='newUserType'>";
                        foreach($userTypesArray as $userType){
                            $userTypeSelect.="<option>".$userType."</option>";
                        }
                        $userTypeSelect.="</select>";
                        echo $userTypeSelect."<br/>";
                    ?>
                    <button type="submit">Add user</button>
                </form>
                
            </div>
            <table>
            <tr>
                <td>Username</td>
                <td colspan='2'>Usertype</td>
            </tr>
            <form action="?action=editUser">
            <?php
                foreach($users as $user){
                    echo "<tr>";
                        echo "<input type='hidden' value='".$user["userid"]."'/>";
                        echo "<td >".$user["username"]."</td>";
                        echo "<td>";
                        $userTypeSelect="<select name='userType'>";
                        foreach($userTypesArray as $userType){
                            $userTypeSelect.="<option ".($user['userType'] == $userType ? ' selected="selected"' : '').">".$userType."</option>";
                        }
                        $userTypeSelect.="</select>";
                        echo $userTypeSelect;
                        
                        echo "</td>";
                        echo "<td><a style='color:#fff' href='?action=editUsers&subAct=deleteuser&id=".$user['userid']."'>asd</a></td>";
                    echo "</tr>";
                }
            ?>

            </form>
            </table>
        
        populate this with a table of users
    </p>
</div>