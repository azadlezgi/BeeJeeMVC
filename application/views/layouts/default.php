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
            <li><a href="/task/index" class="nav-link px-2 link-dark">Список задач</a></li>
            <li><a href="/task/add" class="nav-link px-2 link-dark">Добавить задачу</a></li>
            <li><a href="/account/login" class="nav-link px-2 link-dark">Авторизация</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="/task/add" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Добавить</a>
            <?php if (isset($_SESSION['admin'])): ?>
            <a href="/account/logout" class="btn btn-danger"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a>
            <?php else: ?>
            <a href="/account/login" class="btn btn-outline-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Авторизация</a>
            <?php endif; ?>
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



<?php if (isset($_SESSION['admin'])): ?>
<div class="modal fade" id="confirm-delete"   tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вы уверены?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Вы уверены удалть эту задачу?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Отмена</button>
                <a class="btn btn-danger btn-ok">Удалить</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<script src="/public/js/jquery-3.6.0.min.js"></script>
<script src="/public/js/bootstrap.bundle.min.js"></script>

<?php if (isset($_SESSION['admin'])): ?>
<script>
    <!--
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    //-->
</script>
<?php endif; ?>

</body>
</html>