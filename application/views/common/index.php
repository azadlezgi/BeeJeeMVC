<?php if ($tastList): ?>
<div class="list-group home_list">
    <?php foreach ($tastList as $task): ?>
    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
        <span class="border border-primary rounded-circle short_name"><?php echo $task['short_name']; ?></span>
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0"><?php echo $task['username']; ?> (<em><?php echo $task['email']; ?></em>)</h6>
                <p class="mb-0 opacity-75"><?php echo $task['description']; ?></p>
            </div>
            <small class="opacity-50 text-nowrap"><?php echo $task['date']; ?></small>
        </div>
    </a>
    <?php endforeach; ?>
</div>

<?php echo $pagination; ?>

<?php else: ?>
<div class="alert alert-warning" role="alert">
    Нет ни одного задачи
</div>
<?php endif; ?>