<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvoiceDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Invoices
 *
 * @method \App\Model\Entity\InvoiceDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvoiceDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoiceDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceDetail findOrCreate($search, callable $callback = null)
 */class InvoiceDetailsTable extends Table
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

        $this->table('invoice_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id',
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
            ->requirePresence('product_service', 'create')            ->notEmpty('product_service');
        $validator
            ->requirePresence('description', 'create')            ->notEmpty('description');
        $validator
            ->numeric('quantity')            ->requirePresence('quantity', 'create')            ->notEmpty('quantity');
        $validator
            ->numeric('rate')            ->requirePresence('rate', 'create')            ->notEmpty('rate');
        $validator
            ->numeric('amount')            ->requirePresence('amount', 'create')            ->notEmpty('amount');
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
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));

        return $rules;
    }
}
