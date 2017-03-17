<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoice Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Shipments
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\HasMany $InvoiceDetails
 *
 * @method \App\Model\Entity\Invoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Invoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Invoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice findOrCreate($search, callable $callback = null)
 */class InvoiceTable extends Table
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

        $this->table('invoice');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Shipments', [
            'foreignKey' => 'shipments_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'clients_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('InvoiceDetails', [
            'foreignKey' => 'invoice_id'
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
            ->requirePresence('billing_address', 'create')            ->notEmpty('billing_address');
        $validator
            ->requirePresence('terms', 'create')            ->notEmpty('terms');
        $validator
            ->date('invoice_date')            ->requirePresence('invoice_date', 'create')            ->notEmpty('invoice_date');
        $validator
            ->date('due_date')            ->requirePresence('due_date', 'create')            ->notEmpty('due_date');
        $validator
            ->requirePresence('product_services', 'create')            ->notEmpty('product_services');
        $validator
            ->requirePresence('description', 'create')            ->notEmpty('description');
        $validator
            ->numeric('quantity')            ->requirePresence('quantity', 'create')            ->notEmpty('quantity');
        $validator
            ->numeric('rate')            ->requirePresence('rate', 'create')            ->notEmpty('rate');
        $validator
            ->numeric('balance_due')            ->requirePresence('balance_due', 'create')            ->notEmpty('balance_due');
        $validator
            ->dateTime('date_created')            ->requirePresence('date_created', 'create')            ->notEmpty('date_created');
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
        //$rules->add($rules->existsIn(['shipments_id'], 'Shipments'));
        //$rules->add($rules->existsIn(['clients_id'], 'Clients'));

        return $rules;
    }
}
