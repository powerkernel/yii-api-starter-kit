<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace api\modules\v1\controllers;

use yii\rest\Controller;

/**
 * Class DefaultController
 * @package api\modules\v1\controllers
 */
class DefaultController extends Controller
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

}
