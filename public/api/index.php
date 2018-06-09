<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../config/env.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../../config/api.php';

(new yii\web\Application($config))->run();
