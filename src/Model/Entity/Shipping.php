<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shipping Entity
 *
 * @property int $id
 * @property int $postcode
 * @property int $amount
 * @property int $long_product
 * @property int $shipping_price
 */
class Shipping extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'postcode' => true,
        'amount' => true,
        'long_product' => true,
        'shipping_price' => true,
    ];

}
