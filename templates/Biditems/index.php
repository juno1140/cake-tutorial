<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Biditem[]|\Cake\Collection\CollectionInterface $biditems
 */
?>
<div class="biditems index content">
    <?= $this->Html->link(__('New Biditem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Biditems') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('finished') ?></th>
                    <th><?= $this->Paginator->sort('endtime') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($biditems as $biditem): ?>
                <tr>
                    <td><?= $this->Number->format($biditem->id) ?></td>
                    <td><?= $biditem->has('user') ? $this->Html->link($biditem->user->id, ['controller' => 'Users', 'action' => 'view', $biditem->user->id]) : '' ?></td>
                    <td><?= h($biditem->name) ?></td>
                    <td><?= h($biditem->finished) ?></td>
                    <td><?= h($biditem->endtime) ?></td>
                    <td><?= h($biditem->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $biditem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $biditem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $biditem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $biditem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
