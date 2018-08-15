<?php
/*
Program:
    authentify with database, not using PDO.
*/

/*** Connect by PHP PostgreSQL function ***/
$url = parse_url(getenv("DATABASE_URL"));
$dbh = pg_connect("host=" . $url['host']
                    . " port=" . $url['port']
                    . " dbname=" . substr($url['path'], 1)
                    . " user=" . $url['user']
                    . " password=" . $url['pass']
                );

/*** output ***/
$res = pg_query($dbh, "select * from sample") or die("not work" . pg_last_error());
while($row = pg_fetch_row($res)){
    print_r($row);
}

/*** Disconnect ***/
pg_close($dbh);
?>