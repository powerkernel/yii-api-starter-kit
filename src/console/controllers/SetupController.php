<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace console\controllers;


use powerkernel\yiicore\models\User;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SetupController extends Controller
{
    /**
     * Run: #bin/ php yii setup
     *
     * @return int Exit code
     * @throws \yii\mongodb\Exception
     * @throws \Exception
     */
    public function actionIndex()
    {
        if (User::find()->count() == 0) {
            /* create admin account */
            echo "Creating admin account...\n";
            $user = new User();
            $user->name = 'Admin';
            $user->email = \Yii::$app->params['organization']['adminEmail'];
            $user->save();
            echo "Admin account created.\n";
            /* add role */
            sleep(1);
            echo "Assigning admin role...\n";
            $auth = \Yii::$app->authManager;
            $admin = $auth->getRole('admin');
            $auth->assign($admin, (string)$user->id);
            echo "Role assigned.\n";
            echo "Your application has been installed.\n";
        } else {
            echo "Your application is already installed.\n";
        }
        return ExitCode::OK;
    }


}