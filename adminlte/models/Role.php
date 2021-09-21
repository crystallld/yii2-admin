<?php
/**
 * Class Role
 * @package common\models
 */
namespace adminlte\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\Model;

class Role extends Model
{
    use ActiveRecordTrait;
    /**
     * @var integer
     */
    public $id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $parent;
    /**
     * @var boolean
     */
    public $isDefault;

    public function attributeLabels()
    {
        return [
            'id'            => '角色ID',
            'name'          => '角色名称',
            'description'   => '角色描述',
            'parent'        => '父级角色',
        ];
    }

    /**
     * @see yii\base\Model
     * @param $data
     * @param null $formName
     * @return bool
     */
    public function load($data, $formName = null)
    {
        $scope = $formName === null ? $this->formName() : $formName;

        if ($scope === '' && !empty($data)) {
            $this->setAttributes($data, false);

            return true;
        } elseif (isset($data[$scope])) {
            $this->setAttributes($data[$scope], false);

            return true;
        }

        return false;
    }
}