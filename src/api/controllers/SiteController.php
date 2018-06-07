<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace api\controllers;

use powerkernel\yiicommon\controllers\RestController;

/**
 * Class SiteController
 * @package api\controllers
 */
class SiteController extends RestController
{

    /**
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(\Yii::$app->urlManager->createUrl(['/v1']));
    }

}
