<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Azad Rashidoff">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/font-awesome.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="icon" href="/public/images/favicon.ico">
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            Logo
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
            <li><a href="/task/add" class="nav-link px-2 link-dark">Добавить задачу</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="/account/login" class="btn btn-outline-primary me-2">Авторизация</button>
            <a href="/account/register" class="btn btn-primary">Регистрация</a>
        </div>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="text-muted">&copy; <?php echo date("Y") ?> <a href="http://rashidoff.com/" target="_blank">Rashidoff</a></span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" href="https://www.linkedin.com/in/azad-rashidoff/" target="_blank"><i class="fa fa-linkedin-square fa-lg" aria-hidden="true"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="https://www.facebook.com/azad.rashidoff" target="_blank"><i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/azadlezgi31/" target="_blank"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a></li>
        </ul>
    </footer>
</div>
<script src="/public/js/bootstrap.bundle.min.js"></script>

</body>
</html>