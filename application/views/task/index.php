<h2><?php echo $title; ?></h2>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['success']['message']; ?>
    </div>
<?php
    unset($_SESSION['success']);
endif; ?>

<?php if ($tastList): ?>

<div class="row mb-3">
    <div class="col-md-9">

    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label for="sort">Сортировка</label>
            <select class="form-select" id="sort" onchange="location = this.value;">
                <option value="/task/index"<?php echo ($sort == 0 ? " selected" : ""); ?>>По умолчанию</option>
                <option value="/task/sort/1"<?php echo ($sort == 1 ? " selected" : ""); ?>>По юзеру</option>
                <option value="/task/sort/2"<?php echo ($sort == 2 ? " selected" : ""); ?>>По E-mail</option>
                <option value="/task/sort/3"<?php echo ($sort == 3 ? " selected" : ""); ?>>По статусу</option>
            </select>
        </div>
    </div>
</div>

<div class="list-group task_list">
    <?php foreach ($tastList as $task): ?>
        <div class="list-group-item list-group-item-action d-flex gap-3 py-3<?php echo ($task['status']==1 ? " list-group-item-success" : ""); ?>" aria-current="true">
            <span class="border border-primary rounded-circle short_name"><?php echo $task['short_name']; ?></span>
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0"><?php echo $task['username']; ?> (<em><?php echo $task['email']; ?></em>)</h6>
                    <p class="mb-0 opacity-75"><?php echo $task['description']; ?></p>
                </div>
                <small class="opacity-50 text-nowrap"><?php echo $task['date']; ?></small>
            </div>

            <?php if (isset($_SESSION['admin'])): ?>
                <div class="btn-group btn-group-sm action_buttons" role="group">
                    <a href="/task/edit/<?php echo $task['id']; ?>" class="btn btn-primary" title="Редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <button class="btn btn-danger" data-href="/task/delete/<?php echo $task['id']; ?>" data-bs-toggle="modal" data-bs-target="#confirm-delete" title="Удалить"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php echo $pagination; ?>

<?php else: ?>
<div class="alert alert-warning" role="alert">
    Нет ни одного задачи
</div>
<?php endif; ?>