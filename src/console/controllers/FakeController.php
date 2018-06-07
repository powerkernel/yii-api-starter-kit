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
 * Class FakeController
 * @package console\controllers
 */
class FakeController extends Controller
{
    /**
     * Run: #bin/ php yii fake
     *
     * @return int Exit code
     */
    public function actionIndex()
    {
        echo "Fake controller.\n";
        return ExitCode::OK;
    }

    /**
     * generate fake x users
     */
    public function actionUser()
    {
        $num = 10;
        $users = [];
        $faker = \Faker\Factory::create();
        echo "Generating {$num} users...\n";
        for ($i = 0; $i < $num; $i++) {
            $users[$i] = new User();
            $users[$i]->name = $faker->name;
            $users[$i]->email = $faker->email;
            $users[$i]->timezone = $faker->timezone;
            if ($users[$i]->save()) {
                $percent = round(($i + 1) / $num, 2) * 100;
                echo "{$percent} completed...\n";
            }
        }
        unset($users);
    }
}