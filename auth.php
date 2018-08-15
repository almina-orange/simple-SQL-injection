<?php
/*
Program:
    authentify with database.
*/

function output() {
    try {
        /*** Connect by PHP Data Object (PDO) ***/
        $url = parse_url(getenv('DATABASE_URL'));  // using heroku env
        $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
        $dbh = new PDO($dsn, $url['user'], $url['pass']);  // connect using PDO

        /*** Process on database ***/
        $id = $_POST['user_id'];
        $passwd = $_POST['user_password'];

        $sql = "SELECT * FROM sample WHERE id = '$id' AND password = '$passwd'";  // make query

        /*** output by HTML ***/
        // $stmt = $dbh->query($sql);
        // while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     print($result['id']);
        // }
        $html = '';  // html sentence

        // table header
        $line = '';
        $line = '<tr>';
        $line .= '<td>' . 'id' . '</td>';
        $line .= '<td>' . 'name' . '</td>';
        $line .= '<td>' . 'age' . '</td>';
        $line .= '<td>' . 'password' . '</td>';
        $html .= $line . '</tr>'; // $htmlに1行分追加

        // table contents from database
        foreach($dbh->query($sql) as $row) {
            $line = '';
            $line = '<tr>';
            $line .= '<td>' . $row['id'] . '</td>';
            $line .= '<td>' . $row['name'] . '</td>';
            $line .= '<td>' . $row['age'] . '</td>';
            $line .= '<td>' . $row['password'] . '</td>';
            $html .= $line . '</tr>'; // $htmlに1行分追加
        }
        $html = '<table>' .$html. '</table>';

        echo $html;  // output

        /*** Disconnect ***/
        $dbh = null;
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage()."<br/>");
        die();
    }
}
?>

<!-- output.html -->
<html lang='en'>

<head>
    <title>output.html</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: solid 1px;
            padding: 0.5em;
        }
    </style>
</haed>

<body>
    <h3>Search result</h3>
    <div class="form" style="margin: 5px; padding: 5px;">
        <?php output(); ?>
    </div>
</body>

</html>
