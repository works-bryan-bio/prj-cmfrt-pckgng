<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShippingServices Model
 *
 * @property \Cake\ORM\Association\HasMany $Shipments
 *
 * @method \App\Model\Entity\ShippingService get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShippingService newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShippingService[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShippingService|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShippingService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShippingService[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShippingService findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class ShippingServicesTable extends Table
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

        $this->table('shipping_services');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Shipments', [
            'foreignKey' => 'shipping_service_id'
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
        $validator
            ->requirePresence('name', 'create')            ->notEmpty('name');
        return $validator;
    }
}
