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
<?php if ($task['time_estimated']): ?>
            <li>
                <strong><?= t('Total Time estimated:') ?></strong>
                <span><?= t('%s hours', $tte + $task['time_estimated']) ?></span>
            </li>
            <?php endif ?>
            <?php if ($task['time_spent']): ?>
            <li>
                <strong><?= t('Total Time spent:') ?></strong>
                <span><?= t('%s hours', $tts + $task['time_spent']) ?></span>
            </li>
<?php endif ?>
<?php endif ?>
