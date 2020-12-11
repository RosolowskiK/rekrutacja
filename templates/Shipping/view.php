<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shipping $shipping
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Shipping'), ['action' => 'edit', $shipping->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Shipping'), ['action' => 'delete', $shipping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shipping->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shipping'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Shipping'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="shipping view content">
            <h3><?= h($shipping->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shipping->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postcode') ?></th>
                    <td><?= $this->Number->format($shipping->postcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($shipping->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Long Product') ?></th>
                    <td><?= $this->Number->format($shipping->long_product) ?></td>
                </tr>
                <tr>
                    <th><?= __('Shipping Price') ?></th>
                    <td><?= $this->Number->format($shipping->shipping_price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
