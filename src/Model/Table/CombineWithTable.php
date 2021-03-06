<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shipments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $ShippingCarriers
 * @property \Cake\ORM\Association\BelongsTo $ShippingServices
 *
 * @method \App\Model\Entity\Shipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Shipment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Shipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shipment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Shipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Shipment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shipment findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class CombineWithTable extends Table
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

        $this->table('shipments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        /*$this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
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
        $this->belongsTo('ShippingPurposes', [
            'foreignKey' => 'shipping_purpose_id',
            'joinType' => 'INNER'
        ]);*/
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        
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
        
        return $rules;
    }
}
