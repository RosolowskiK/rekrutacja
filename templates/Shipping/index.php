<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipping[]|\Cake\Collection\CollectionInterface $shipping
 */
?>
<div class="shipping index content">
    <?= $this->Html->link(__('See Zones'), ['controller' => 'Zones','action' => 'index'], ['class' => 'button float-right']) ?>


    <?= $this->Html->link(__('New Shipping'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Shipping') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('long_product') ?></th>
                    <th><?= $this->Paginator->sort('shipping_price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shipping as $shipping): ?>
                <tr>
                    <td><?= $this->Number->format($shipping->id) ?></td>
                    <td><?= $this->Number->format($shipping->postcode) ?></td>
                    <td><?= $this->Number->format($shipping->amount) ?></td>
                    <td><?= $this->Number->format($shipping->long_product) ?></td>
                    <td><?= $this->Number->format($shipping->shipping_price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $shipping->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shipping->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shipping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipping->id)]) ?>
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
