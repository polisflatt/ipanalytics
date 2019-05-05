<?php
    require dirname(__FILE__)."/settings.php"; /* Because relative fucking paths are a pain in PHP! */

    function ip_address() /* Get IP Address */
    {
        return isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    }

    function ip_information_curl($ip_address) /* I don't know why it's still named curl... */
    { /* Gets information from an IP query website. I use ipinfo.io, but you can use something different. Be prepared to change some code though... */
        $fp = file_get_contents($GLOBALS["ip_website"] . $ip_address);
        return $fp;
    }

    /* Add IP to the log */
    function log_ip($ip_address)
    {
        $str_date = date($GLOBALS["date_format"], time());


        $log_folder_new = $GLOBALS["log_folder"] . $str_date . "/";

        /* JSON Array */
        $json_array = array (
            "ip" => (string) $ip_address, /* Our IP Address */
            "time" => (string) time() /* The time at which it was logged */
        );


        if (!file_exists($log_folder_new))
        {
            /* If our logs don't already exist.*/
            mkdir($log_folder_new);
        }

        $json_input = json_decode(file_get_contents("$log_folder_new/log.json"));

        if ($json_input == NULL)
        {
            $json_input = array();
        }
        /* Poor way to add to the JSON array */

        array_push($json_input, $json_array);

        $fp = fopen("$log_folder_new/log.json", "w");
        fwrite($fp, json_encode($json_input, JSON_PRETTY_PRINT) . PHP_EOL); /* Pretty print is a waste of space, but I keep it there for debugging purposes. */
        fclose($fp);
    }



    /* Create a nice addition to a preexisting table with table headers with the values here */
    function format_ip_html($ip_address, $time = 0)
    {
        $json_raw = ip_information_curl($ip_address);
        $json = json_decode($json_raw, true);
        $formatted_time = date($GLOBALS["time_format"], $time);
        /* Get our information */

        printf(
            "<tr>\n"
        );

        printf(
            "<td>$formatted_time</td>\n"
        );

        foreach ($json as $item) 
        {
            /* Lazily print each item */
            printf(
                "<td>$item</td>\n"
            );
    
        }

        printf(
            "</tr>\n"
        );

    }

    /* Get all of our logs */
    function print_logs($date)
    {
        $json_content = json_decode(file_get_contents("src/logs/$date/log.json"), true);

        foreach ($json_content as $item)
        {
            
            format_ip_html($item["ip"], $item["time"]);
        }
    }
?>