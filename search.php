<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <title>Поиск - Библиографический словарь создателей Древнерусской рукописной картотеки</title>
    </head>
    <body>
    <?php
    include 'header.php';
    require_once 'db.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $sql = 'SELECT * FROM `dictionary_ukaz_23a`';
    $result = mysqli_query($link, $sql);
    ?>
    <div class="container" style="padding-top: 10px">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <table class="table" id="myList">
            <thead>
            <tr>
                <th>Шифр источника</th>
                <th>Название источника</th>
                <th>Исследователи</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                print '<tr>';
                print '<td>'.$row['Шифр источника'].'</td>';
                print '<td>'.$row['Название источника'].'</td>';
                print '<td>'.$row['Исследователь - изд.'].'</td>';
                print '</tr>';
            };
            ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myList tbody tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </div>
    </body>
</html>