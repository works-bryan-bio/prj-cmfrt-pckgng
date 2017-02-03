<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InventoryOrder Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $Shipments
 * @property \Cake\ORM\Association\BelongsTo $ShippingCarriers
 * @property \Cake\ORM\Association\BelongsTo $ShippingServices
 * @property \Cake\ORM\Association\BelongsTo $InventoryOrders
 * @property \Cake\ORM\Association\HasMany $InventoryOrder
 *
 * @method \App\Model\Entity\InventoryOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\InventoryOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InventoryOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InventoryOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InventoryOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InventoryOrder findOrCreate($search, callable $callback = null)
 */class InventoryOrderTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('inventory_order');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Shipments', [
            'foreignKey' => 'shipment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ShippingCarriers', [
            'foreignKey' => 'shipping_carrier_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ShippingServices', [
            'foreignKey' => 'shipping_service_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')            ->allowEmpty('id', 'create');
        
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['shipment_id'], 'Shipments'));
        $rules->add($rules->existsIn(['shipping_carrier_id'], 'ShippingCarriers'));
        $rules->add($rules->existsIn(['shipping_service_id'], 'ShippingServices'));

        return $rules;
    }
}
