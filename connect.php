<?php
/*
Program:
    authentify with database, not using PDO.
*/

$url = parse_url(getenv("DATABASE_URL"));
$con = pg_connect("host=" . $url['host']
                    . " port=" . $url['port']
                    . " dbname=" . substr($url['path'], 1)
                    . " user=" . $url['user']
                    . " password=" . $url['pass']
                );

$res = pg_query($con, "select * from sample") or die("not work" . pg_last_error());
while($row = pg_fetch_row($res)){
    print_r($row);
}

pg_close($con);
?>