<!-- output.html -->

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
        // $sql = "SELECT * FROM sample";

        // output
        // $stmt = $dbh->query($sql);
        // while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     print($result['id']);
        //     print($result['name']);
        //     print($result['age']);
        //     print($result['password']);
        // }
        // foreach($dbh->query($sql) as $row) {
        //     print_r($row);
        // }
        $html = '';
        foreach($dbh->query($sql) as $data) {
            $line = '<tr>';
            $line .= '<td>' . $data['id'] . '</td>';
            $line .= '<td>' . $data['name'] . '</td>';
            $line .= '<td>' . $data['age'] . '</td>';
            $line .= '<td>' . $data['password'] . '</td>';
            $html .= $line . '</tr>'; // $htmlに1行分追加
        }
        $html .= '<table>' .$html. '</table>';

        /*** Disconnect ***/
        $dbh = null;
    } catch (PDOException $e) {
        print("Error: " . $e->getMessage()."<br/>");
        die();
    }
}
?>

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
    <div class="form" style="margin: 5px; border: solid 1px">
        <?php
        output();
        ?>
    </div>
</body>

</html>
