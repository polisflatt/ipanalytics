<?php
    require dirname(__FILE__)."/settings.php";

    function ip_address()
    {
        return isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    }

    function ip_information_curl($ip_address)
    {
        $fp = file_get_contents($GLOBALS["ip_website"] . $ip_address);
        return $fp;
    }

    function log_ip($ip_address)
    {
        $str_date = date($GLOBALS["date_format"], time());

        $log_folder_new = $GLOBALS["log_folder"] . $str_date . "/";

        $json_array = array (
            "ip" => (string) $ip_address,
            "time" => (string) time()
        );


        if (!file_exists($log_folder_new))
        {
            mkdir($log_folder_new);
        }

        $json_input = json_decode(file_get_contents("$log_folder_new/log.json"));

        if ($json_input == NULL)
        {
            $json_input = array();
        }

        array_push($json_input, $json_array);

        $fp = fopen("$log_folder_new/log.json", "w");
        fwrite($fp, json_encode($json_input, JSON_PRETTY_PRINT) . PHP_EOL);
        fclose($fp);
    }



    
    function format_ip_html($ip_address, $time = 0)
    {
        $json_raw = ip_information_curl($ip_address);
        $json = json_decode($json_raw, true);
        $formatted_time = date($GLOBALS["time_format"], $time);

        printf(
            "<tr>\n"
        );

        printf(
            "<td>$formatted_time</td>\n"
        );

        foreach ($json as $item) 
        {
            
            printf(
                "<td>$item</td>\n"
            );
    
        }

        printf(
            "</tr>\n"
        );

    }

    function print_logs($date)
    {
        $json_content = json_decode(file_get_contents("src/logs/$date/log.json"), true);

        foreach ($json_content as $item)
        {
            
            format_ip_html($item["ip"], $item["time"]);
        }
    }
?>