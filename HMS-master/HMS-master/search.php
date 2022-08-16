<?php include "header.php"?>

<?php



$con = new PDO('mysql:host=localhost;dbname=hospital_database', 'root', "");
if (isset($_POST["submit"])) {
    $key = $_POST["submit"];
   $query = $con->prepare('(SELECT emri, info FROM db_departament WHERE emri LIKE :keyword ORDER BY emri) UNION (SELECT emri, mbiemri FROM users WHERE emri LIKE :keyword OR mbiemri LIKE :keyword ORDER BY emri) UNION (SELECT specializimi, status FROM users_doc_spec WHERE specializimi LIKE :keyword OR status LIKE :keyword ORDER BY specializimi)');
    $query->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll();
    $rows = $query->rowCount();

    if ($rows != 0) {
        foreach ($results as $r) {
            if (is_null($r['info'])) {
                echo '<br><br><br>' .
                    '<table style="border: 1px solid;">
                            <tr style="border: 1px solid;">
                                <th>Name</th>
                                <th>Surname</th>
                                
                            </tr>
                            <tr>' .
                    '<td>' . $r['emri'] . '</td>' .
                    '<td>' . $r['mbiemri'] . '</td>' .

                    '</tr>
                    </table>';
            } else {
                echo '<br><br><br>' .
                    '<table>
                            <tr>
                                <th>Name</th>
                                <th>Information</th>
                                
                            </tr>
                            <tr>' .
                    '<td>' . $r['emri'] . '</td>' .
                    '<td>' . $r['info'] . '</td>' .

                    '</tr>
                    </table>';
            }
           
        }
    } else {
        echo "No data available";
    }

}
?>



<?php include "footer.html"?>

