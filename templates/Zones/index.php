<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zone[]|\Cake\Collection\CollectionInterface $zones
 */
?>
<div class="zones index content">
    <?= $this->Html->link(__('See Shipping'), ['controller' => 'Shipping','action' => 'index'], ['class' => 'button float-right']) ?>

    <?= $this->Html->link(__('New Zone'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Zones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('zone') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($zones as $zone): ?>
                <tr>
                    <td><?= $this->Number->format($zone->id) ?></td>
                    <td><?= $this->Number->format($zone->zone) ?></td>
                    <td><?= $this->Number->format($zone->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $zone->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zone->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zone->id)]) ?>
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
