<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

defined('YII_DEBUG') or define('YII_DEBUG', file_exists(__DIR__.'/prod')?false:true);
defined('YII_ENV') or define('YII_ENV', file_exists(__DIR__.'/prod')?'prod':'dev');