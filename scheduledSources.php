<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <title>Расписанные источники - Библиографический словарь создателей Древнерусской рукописной картотеки</title>
    </head>
    <body>
    <?php
    include 'header.php';
    if (isset($_GET['author'])) {
        $author = $_GET['author'];
        require_once 'db.php';
        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
        $sql = 'SELECT * FROM `dictionary_prdaut1new` WHERE `id` = '.$author;
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $authorName = $row['Name'];

        $sql = 'SELECT COUNT(1) FROM `dictionary_scheduled_sources` WHERE `author_id` = '.$author;
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        $count = $row[0];

        $sql = 'SELECT * FROM `dictionary_scheduled_sources` WHERE `author_id` = '.$author;
        $result = mysqli_query($link, $sql);
    }
    else $author = 'null';
    ?>
    <div class="container" style="padding-top: 10px">
        <main>
            <h1>Расписанные источники автора</h1>
            <p><?php echo $authorName ?></p>
            <?php
            if ($count == 0)
                echo '<div class="alert alert-primary" role="alert">У данного автора нет расписанных источников</div>';
            else {
                echo '<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Краткое название</th>
                        <th scope="col">Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                    ';
                while ($row = mysqli_fetch_array($result)) {
                    print '<tr>';
                    print '<td>'.$row['name'].'</td>';
                    print '<td>'.$row['description'].'</td>';
                    print '</tr>';
                };
                print '</tbody>
                    </table>';

            }
            ?>



                </tbody>
            </table>
        </main>
    </div>
    </body>
</html>
