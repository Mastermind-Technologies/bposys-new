<?php if (count($notifications) > 0): ?>
    <?php foreach ($notifications as $notification): ?>
        <li>
            <a href="<?= base_url();  ?>form/view/<?= $notification->referenceNum  ?> ">
                <div>
                    <i class="fa fa-comment fa-fw"></i> <?= $notification->notifMessage ?>
                    <br>
                    <span class="pull-left text-muted small"><?= $notification->createdAt ?></span>
                </div>
            </a>
        </li>
        <br>
        <li class="divider"></li>
    <?php endforeach ?>
<?php else: ?>
    <li>
        <h5 class="text-center text-muted">You have no notifications yet.</h5>
        <li class="divider"></li>
    </li>
<?php endif ?>

<li>
    <a class="text-center" href="#">
        <strong>See All Alerts</strong>
        <i class="fa fa-angle-right"></i>
    </a>
</li>
