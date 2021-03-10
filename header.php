<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Библиографический словарь</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($_SERVER[REQUEST_URI]=="/")
                    {
                        echo 'active';
                    }
                    ?>" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($_SERVER[REQUEST_URI]=="/history.php")
                    {
                        echo 'active';
                    }
                    ?>" href="history.php">История</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($_SERVER[REQUEST_URI]=="/authors.php")
                    {
                        echo 'active';
                    }
                    ?>" href="authors.php">Авторы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php
                    if ($_SERVER[REQUEST_URI]=="/search.php")
                    {
                        echo 'active';
                    }
                    ?>" href="search.php">Поиск</a>
                </li>
            </ul>
        </div>
    </div>
</nav>