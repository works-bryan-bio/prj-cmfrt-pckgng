<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MessageDetails Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Messages
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MessageDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\MessageDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MessageDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MessageDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MessageDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MessageDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MessageDetail findOrCreate($search, callable $callback = null)
 */class MessageDetailsTable extends Table
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

        $this->table('message_details');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Message', [
            'foreignKey' => 'message_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
        $rules->add($rules->existsIn(['message_id'], 'Message'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
