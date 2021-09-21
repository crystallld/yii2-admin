<?php
namespace adminlte;

use yii\base\Exception;
use yii\web\AssetBundle;
use yii\web\View;

/**
 * AdminLte AssetBundle
 */
class AdminLteAsset extends AssetBundle
{
    public $sourcePath = '@adminlte/dist';

    public $css = [
        'css/AdminLTE.min.css',
    ];

    public $js = [
        'js/adminlte.min.js',
        'js/demo.js',
    ];

    public $depends = [
        'adminlte\BowerAsset',
    ];

    /**
     * @var string|bool Choose skin color,
     * eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = '_all-skins';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->skin) {
            preg_match('/skin(-[a-z]+){1,2}/', $this->skin, $matches);

            $skin = empty($matches)? $this->skin: current($matches);

            if (('_all-skins' !== $skin) && (strpos($skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }

            $this->css[] = sprintf('css/skins/%s.min.css', $skin);
        }

        parent::init();
    }
}