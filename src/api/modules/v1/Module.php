<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace api\modules\v1;

/**
 * Class Module v1
 * @package api\modules\v1
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $modules = \Yii::$app->params['modules']['v1'];
        $this->modules = $modules;
    }
}