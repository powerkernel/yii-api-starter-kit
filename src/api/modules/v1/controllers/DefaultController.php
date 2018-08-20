<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace api\modules\v1\controllers;

use powerkernel\yiicommon\controllers\RestController;


/**
 * Class DefaultController
 * @package api\modules\v1\controllers
 */
class DefaultController extends RestController
{

    /**
     * @return array
     */
    public function actionIndex()
    {

        return [
            'data' => [
                'version' => '1.0.0',
            ]
        ];
    }

    /**
     * get basic contact info
     * @return array
     */
    public function actionContact(){
        return [
            'success'=>true,
            'data'=> \Yii::$app->params['organization']
        ];
    }

}
