<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bidmessage[]|\Cake\Collection\CollectionInterface $bidmessages
 */
?>
<div class="bidmessages index content">
    <?= $this->Html->link(__('New Bidmessage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bidmessages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('bidinfo_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bidmessages as $bidmessage): ?>
                <tr>
                    <td><?= $this->Number->format($bidmessage->id) ?></td>
                    <td><?= $this->Number->format($bidmessage->bidinfo_id) ?></td>
                    <td><?= $bidmessage->has('user') ? $this->Html->link($bidmessage->user->id, ['controller' => 'Users', 'action' => 'view', $bidmessage->user->id]) : '' ?></td>
                    <td><?= h($bidmessage->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bidmessage->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bidmessage->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bidmessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidmessage->id)]) ?>
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
