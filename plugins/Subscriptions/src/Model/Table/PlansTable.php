<?php
namespace Subscriptions\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;
use Croogo\Core\Model\Table\CroogoTable;

/**
 * Plans Model
 *
 * @property \Subscriptions\Model\Table\SubscriptionsTable|\Cake\ORM\Association\HasMany $Subscriptions
 *
 * @method \Subscriptions\Model\Entity\Plan get($primaryKey, $options = [])
 * @method \Subscriptions\Model\Entity\Plan newEntity($data = null, array $options = [])
 * @method \Subscriptions\Model\Entity\Plan[] newEntities(array $data, array $options = [])
 * @method \Subscriptions\Model\Entity\Plan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Subscriptions\Model\Entity\Plan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Subscriptions\Model\Entity\Plan[] patchEntities($entities, array $data, array $options = [])
 * @method \Subscriptions\Model\Entity\Plan findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PlansTable extends CroogoTable
{

    /**
     * Display fields for this model
     *
     * @var array
     */
    protected $_displayFields = [
        'id',
        'name',
        'amount',
    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('plans');
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

        $this->hasMany('Subscriptions', [
            'foreignKey' => 'plan_id',
            'className' => 'Subscriptions.Subscriptions'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        return $validator;
    }
}
