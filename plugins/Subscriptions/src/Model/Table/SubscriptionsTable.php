<?php
namespace Subscriptions\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subscriptions Model
 *
 * @property \Subscriptions\Model\Table\PlansTable|\Cake\ORM\Association\BelongsTo $Plans
 *
 * @method \Subscriptions\Model\Entity\Subscription get($primaryKey, $options = [])
 * @method \Subscriptions\Model\Entity\Subscription newEntity($data = null, array $options = [])
 * @method \Subscriptions\Model\Entity\Subscription[] newEntities(array $data, array $options = [])
 * @method \Subscriptions\Model\Entity\Subscription|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Subscriptions\Model\Entity\Subscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Subscriptions\Model\Entity\Subscription[] patchEntities($entities, array $data, array $options = [])
 * @method \Subscriptions\Model\Entity\Subscription findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SubscriptionsTable extends Table
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

        $this->setTable('subscriptions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Croogo/Core.Trackable');
        $this->addBehavior('Search.Search');
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'created' => 'new',
                    'updated' => 'existing',
                ],
            ],
        ]);

        $this->belongsTo('Plans', [
            'foreignKey' => 'plan_id',
            'className' => 'Subscriptions.Plans'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->allowEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

        $validator
            ->integer('updated_by')
            ->allowEmpty('updated_by');

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
        $rules->add($rules->existsIn(['plan_id'], 'Plans'));

        return $rules;
    }
}
