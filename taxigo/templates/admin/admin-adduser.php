<h1>Lisa uus kasutaja</h1>
<p>t2ita tuleb koik v2ljad!</p>
<form action="?action=adduser" method="post">
    <?php
        foreach($sitevar->err as $error){
            echo $error["type"];
            echo " : ";
            echo $error["err"];
        }
    
    ?>
    <p>Kasutajatyyp</p>
    <div>
        <?php
        $userTypeSelect="<select name='usertype'>";
            foreach($sitevar->allowedTypes as $userType){
                $userTypeSelect.="<option value='".$userType["typeID"]."'>".$userType["typeName"]."</option>";
            }
        $userTypeSelect.="</select>";
        echo $userTypeSelect;
        ?>
    </div>
    
    <p>Kasutajatunnus</p>
    <div>
        <input type="text" name="username"/>
    </div>
    <p>Parool</p>
    <div>
        <input type="text" name="passwd"/>
    </div>
    <p>Parooli kordus</p>
    <div>
        <input type="text" name="passwdretype"/>
    </div>
    <p>Omab kasutusoigust</p>
    <div>
        <input type="checkbox" name="valid" checked=true/>
    </div>
    <button type="submit">Lisa uus kasutaja</button>
</form>