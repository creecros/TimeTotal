<?php $tts = 0; $tte = 0; $engage= false; ?>
<?php $links = $this->model->taskLinkModel->getAllGroupedByLabel($task['id']); ?>

<?php if (! empty($links)): ?>
    <?php foreach ($links as $label => $grouped_links): ?>
        <?php if ($label == 'targets milestone'): ?>
        <?php $engage = true; ?>
        <?php foreach ($grouped_links as $link): ?>
                <?php if (! empty($link['task_time_spent'])): ?>
                    <?php $tts = $tts + $link['task_time_spent']; ?>
                <?php endif ?>
                <?php if (! empty($link['task_time_spent']) && ! empty($link['task_time_estimated'])): ?>
                <?php endif ?>
                <?php if (! empty($link['task_time_estimated'])): ?>
                    <?php $tte = $tte + $link['task_time_estimated'] ?>
                <?php endif ?>
        <?php endforeach ?>
        <?php endif ?>
    <?php endforeach ?>
<?php endif ?>

<?php if ($engage): ?>
<div class="task-icon-age">
<?php if ($task['time_estimated']): ?>
                <span title="<?= t('Total Time estimated')?>" class="task-icon-age-total"><span class="ui-helper-hidden-accessible"><?= t('Total Time estimated') ?> </span><?= t('%s hrs.', $tte + $task['time_estimated']) ?></span>
            <?php endif ?>
            <?php if ($task['time_spent']): ?>
                <span title="<?= t('Total Time spent')?>" class="task-icon-age-column"><span class="ui-helper-hidden-accessible"><?= t('Total Time spent') ?> </span><?= t('%s hrs.', $tts + $task['time_spent']) ?></span>
<?php endif ?>
</div>
<?php endif ?>