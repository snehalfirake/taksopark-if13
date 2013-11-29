<?php

?>
</div>
<script src="http://localhost/js/jquery.js" type="text/javascript"></script>
<script src="http://localhost/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    less = {
        env: "development", // or "production"
        async: false,       // load imports async
        fileAsync: false,   // load imports async when in a page under
                            // a file protocol
        poll: 1000,         // when in watch mode, time in ms between polls
        functions: {},      // user functions, keyed by name
        dumpLineNumbers: "comments", // or "mediaQuery" or "all"
        relativeUrls: false,// whether to adjust url's to be relative
                            // if false, url's are already relative to the
                            // entry less file
        rootpath: ":/localhost/"// a path to add on to the start of every url
                            //resource
    };
</script>
<script src="http://localhost/js/less.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#logReg li a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
        $(".nav-tabs li a").each(function(){
            console.log("hello");
            if ($(this).attr("href")==window.location) {
                $(this).parent().attr("class","active");
            }
        })
    });
</script>
</body>
</html>
