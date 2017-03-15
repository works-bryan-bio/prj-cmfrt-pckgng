<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MessageHeader Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\HasMany $MessageDetails
 *
 * @method \App\Model\Entity\MessageHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\MessageHeader newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MessageHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MessageHeader|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MessageHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MessageHeader[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MessageHeader findOrCreate($search, callable $callback = null)
 */class MessageHeaderTable extends Table
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

        $this->table('message_header');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MessageDetails', [
            'foreignKey' => 'message_header_id'
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
            ->requirePresence('message_subject', 'create')            ->notEmpty('message_subject');
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
        $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
