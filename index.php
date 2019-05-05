<html>
    <body>

        <h1><i>Scanning for log files...</i></h1>
        

        <center><h3>Log Files:</h3></center>

        <?php
            ini_set('display_errors', 1);
            require "src/lib/ip.php";

            foreach (array_diff(scandir("src/logs/"), array(".", "..")) as $log)
            {
                printf(
                    "<center><a href='view.php?log=$log'>$log</a></center>\n"
                );
            }
        ?>

        <h1><i>Want to log your own self?</i></h1>
        <h2>Go <a href="log.php">here!</a></h2>

        <h1><i>Want to log using our websites? (not recommended)</i></h1>
        <h3>Send a request to src/log.php on our website!</h3>

        <h1><i>Want to log on an external website?</i></h1>
        <h3>Simply get the files here, hide them, and then on your page, import src/log.php into your PHP/HTML file.</h3>

    </body>

</html>
