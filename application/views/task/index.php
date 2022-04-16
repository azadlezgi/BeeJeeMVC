<h2><?php echo $title; ?></h2>

<?php if ($tastList): ?>
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