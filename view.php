<?php
    $log = $_GET["log"];
?>

<?php
    ini_set('display_errors', 1);
    require "src/lib/ip.php";
?>

<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>

<table>
    <tr>
        <th>Time</th>
        <th>IP Address</th>
        <th>Hostname</th>
        <th>City</th>
        <th>Region/State/Province</th>
        <th>Country</th>
        <th>Coords</th>
        <th>Zip/Postal</th>
        <th>Area Code</th>
        <th>Org/ISP</th>
    </tr>
    <?php
        print_logs($log);
    ?>
</table>