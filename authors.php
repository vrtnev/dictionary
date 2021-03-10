<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <title>Авторы - Библиографический словарь создателей Древнерусской рукописной картотеки</title>
    </head>
    <body>
    <?php
    include 'header.php';
    ?>
    <div class="container" style="padding-top: 10px">
    <?php
    if(isset($_GET['current'])) {
        $current = $_GET['current'];
        if ($current < 1)
            $current = 1;
        if ($current == 'first')
            $current = 1;
    }
    else
        $current = 1;
    require_once 'db.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $sql = 'SELECT COUNT(1) FROM `dictionary_prdaut1new`';
    $result = mysqli_query($link, $sql);
    $count = mysqli_fetch_array( $result );
    $last = $count[0];
    if ($_GET['current'] == 'last')
        $current = $last;
    if ($current>$last)
        $current = $last;
    $sql = 'SELECT * FROM `dictionary_prdaut1new` WHERE `id` = '.$current;
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $photo = mb_convert_case($row['Photo'], MB_CASE_LOWER, "UTF-8");
    $pict = mb_convert_case($row['Pict'], MB_CASE_LOWER, "UTF-8");
    ?>
    <main>
        <div>
            <a class="btn btn-primary" href="authors.php?current=first">К первой</a>
            <a class="btn btn-primary" href="authors.php?current=<?php echo $current-1 ?>">Предыдущая</a>
            <a class="btn btn-primary" href="authors.php?current=<?php echo $current+1 ?>">Следующая</a>
            <a class="btn btn-primary" href="authors.php?current=last">К последней</a>
            <p class="d-inline">Запись <?php echo $current?> из <?php echo $last ?></p>
        </div>
        <div>
            <div class="d-inline-block" style="padding-right: 10px; max-width: 60%;">
                <h1><?php echo $row['Name']?></h1>
                <p>Годы жизни: <?php echo $row['Years']?></p>
                <p>Специальность: <?php echo $row['Spec']?></p>
                <p>Жизнеописание: <?php echo $row['Life']?></p>
                <p>Образец почерка:</p>
                <img class="d-block" src="Cards/<?php echo $pict ?>">
                <a class="btn btn-info" href="scheduledSources.php?author=<?php echo $current ?>">О расписанных источниках</a>
                <a class="btn btn-info" href="publishedWorks.php?author=<?php echo $current ?>">Об изданных работах</a>
            </div>
            <div class="d-inline-block" style="vertical-align: text-bottom">
                <img src="Photos/<?php echo $photo ?>">
            </div>
        </div>
    </main>
    </div>
    </body>
</html>