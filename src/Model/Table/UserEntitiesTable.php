<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserEntities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Clients
 * @property \Cake\ORM\Association\HasMany $ProjectDiscussions
 * @property \Cake\ORM\Association\HasMany $ProjectProposalDiscussions
 * @property \Cake\ORM\Association\HasMany $ProjectProposals
 *
 * @method \App\Model\Entity\UserEntity get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserEntity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserEntity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserEntity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserEntity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserEntity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserEntity findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */class UserEntitiesTable extends Table
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

        $this->table('user_entities');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clients', [
            'foreignKey' => 'user_entity_id'
        ]);
        $this->hasMany('ProjectDiscussions', [
            'foreignKey' => 'user_entity_id'
        ]);
        $this->hasMany('ProjectProposalDiscussions', [
            'foreignKey' => 'user_entity_id'
        ]);
        $this->hasMany('ProjectProposals', [
            'foreignKey' => 'user_entity_id'
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
            ->requirePresence('firstname', 'create')            ->notEmpty('firstname');
        $validator
            ->allowEmpty('middlename');
        $validator
            ->requirePresence('lastname', 'create')            ->notEmpty('lastname');
        $validator
            ->email('email')            ->requirePresence('email', 'create')            ->notEmpty('email');
        $validator
            ->allowEmpty('contact_no');
        $validator
            ->allowEmpty('photo');
        $validator
            ->integer('is_active')            ->allowEmpty('is_active');
        $validator
            ->integer('is_password_changed')            ->allowEmpty('is_password_changed');
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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
