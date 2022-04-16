
<h2><?php echo $title; ?></h2>


<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error['message']; ?>
</div>
<?php endif; ?>

<form action="/account/login" method="post">
    <div class="form-group mb-3">
        <label for="login">Логин</label>
        <input class="form-control" type="text" name="login" id="login" required="required">
    </div>
    <div class="form-group mb-3">
        <label for="password">Пароль</label>
        <input class="form-control" type="password" name="password" id="password" required="required">
    </div>
    <button type="submit" class="btn btn-primary btn-block">Вход</button>
</form>