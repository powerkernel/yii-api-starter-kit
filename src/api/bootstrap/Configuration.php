<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace api\bootstrap;


use yii\base\Component;

/**
 * Class Configuration
 * @package api\bootstrap
 */
class Configuration extends Component
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->configUrlManager();

    }

    /**
     * configUrlManager
     */
    protected function configUrlManager()
    {
        $rules = [];
        $dir = \Yii::$app->vendorPath . '/powerkernel';
        $modules = scandir($dir);
        foreach ($modules as $module) {
            if (!preg_match('/[\.]+/', $module)) {
                $urlManagerFile = "$dir/$module/src/urlManager.php";
                if (file_exists($urlManagerFile)) {
                    $urlManagerConfig = require($urlManagerFile);
                    if (!empty($urlManagerConfig['rules'])) {
                        $rules = array_merge($rules, $urlManagerConfig['rules']);
                    }
                }
            }
        }
        if (!empty($rules)) {
            \Yii::$app->setComponents([
                'urlManager' => [
                    '__class' => \yii\web\UrlManager::class,
                    'enablePrettyUrl' => true,
                    'showScriptName' => false,
                    'rules' => array_merge(\Yii::$app->urlManager->rules, $rules)
                ],
            ]);
        }

    }
}