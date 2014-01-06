<?php
    
    ### conf.php
    ### this is used to set some app variables that will ease the job and keep things consistent.
    ### custom functions and db connect are included here aswell, it's like a little init script.
    ### session is started.
    
    
    /*
    
    ### TODOLIST:
        
        1.  Andmebaasi create (if not exists)
        2.  Andmebaasi andmete lisamine (if none exist [usertypes])
        3.  Mõelda kas lisamise ja muutmiseleht peaksid asetsema eraldi või ei (ehk eraldi tabid)
        4.  Errori süsteem (functions.php tõenäoliselt)
        5.  Sisselogimata kasutaja view
        6.  Sisseloginud kasutaja view
        7.  dispetšeri view
        8.  Juhi view
        9.  Tellimuste lisamine ja muutmine.
        10. JS + RESPONSIVE CSS
        11. Registreerimine (kinnituskoodid)
        12. Menüü view kasutajatüüpide loogikaga
    
    */
    
    
    
    
    ### Define Site variables
    
    $sitevar=new stdClass();
    $sitevar->env="DEV"; # may be DEV/TEST/PROD
    $sitevar->sitename="Taxigo";
    $sitevar->err=array();
    $sitevar->basePath="c:/users/kaarel/desktop/kaarel/work/kool/taxigo/";
    $sitevar->templatesPath=$sitevar->basePath."templates/";
    $sitevar->corePath=$sitevar->basePath."core/";
    $sitevar->actionsPath=$sitevar->basePath."actions/";
    $sitevar->dbUser="";
    $sitevar->dbName="";
    $sitevar->dbPass="";
    $sitevar->dbHost="";
    $sitevar->status="down";
    
    ### include functions and db connect
    
    include($sitevar->corePath."functions.php");
    include($sitevar->corePath."db.php");
    
    ### start session
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
        $timeout = 600; // Number of seconds until it times out.
         
        // Check if the timeout field exists.
        if(isset($_SESSION['timeout'])) {
            // See if the number of seconds since the last
            // visit is larger than the timeout period.
            $duration = time() - (int)$_SESSION['timeout'];
            if($duration > $timeout) {
                // Destroy the session and restart it.
                session_destroy();
                session_start();
            }
        }
         
        // Update the timout field with the current time.
        $_SESSION['timeout'] = time();
    }

?>