<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shipping Model
 *
 * @method \App\Model\Entity\Shipping newEmptyEntity()
 * @method \App\Model\Entity\Shipping newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Shipping[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shipping get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shipping findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Shipping patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shipping[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shipping|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shipping saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shipping[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipping[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipping[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Shipping[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShippingTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('shipping');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('postcode')
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode')
            ->add('postcode', [
                [
                    'rule' => ['lengthbetween', 5, 5],
                    'message' => 'Zipcode must be 5 digits'
                ]]);

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->boolean('long_product')
            ->requirePresence('long_product', 'create')
            ->notEmptyString('long_product');

        $validator
            ->integer('shipping_price')
            ->requirePresence('shipping_price', 'create')
            ->notEmptyString('shipping_price');

        return $validator;
    }
}
