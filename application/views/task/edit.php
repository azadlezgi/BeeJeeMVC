
<h2><?php echo $title; ?></h2>

<?php if (isset($error)): ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error['message']; ?>
</div>
<?php endif; ?>

<?php if (isset($success)): ?>
<div class="alert alert-success" role="alert">
    <?php echo $success['message']; ?>
</div>
<?php endif; ?>

<form action="/task/edit/<?php echo $id; ?>" method="POST">
    <div class="form-group mb-3">
        <label for="username">Имя</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Имя" value="<?php echo $username; ?>" required="required">
    </div>
    <div class="form-group mb-3">
        <label for="email">E-mail</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" value="<?php echo $email; ?>" required="required">
    </div>
    <div class="form-group mb-3">
        <label for="description">Задача</label>
        <textarea name="description" class="form-control" id="description" placeholder="Задача" required="required"><?php echo $description; ?></textarea>
    </div>

    <div class="form-group mb-3">
        <label class="form-check-label" for="status">
            Статус
        </label>
        <input name="status" class="form-check-input" type="checkbox" value="1" id="status"<?php echo ($status==1 ? " checked" : ""); ?>>
    </div>

    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>