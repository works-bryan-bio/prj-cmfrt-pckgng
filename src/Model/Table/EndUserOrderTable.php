<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EndUserOrder Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $ShippingServices
 *
 * @method \App\Model\Entity\EndUserOrder get($primaryKey, $options = [])
 * @method \App\Model\Entity\EndUserOrder newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EndUserOrder[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EndUserOrder|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EndUserOrder patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EndUserOrder[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EndUserOrder findOrCreate($search, callable $callback = null)
 */class EndUserOrderTable extends Table
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

        $this->table('end_user_order');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
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
        $validator
            ->requirePresence('name', 'create')            ->notEmpty('name');
        $validator
            ->requirePresence('address', 'create')            ->notEmpty('address');
        $validator
            ->requirePresence('comments', 'create')            ->notEmpty('comments');
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
        $rules->add($rules->existsIn(['shipping_service_id'], 'ShippingServices'));

        return $rules;
    }
}
