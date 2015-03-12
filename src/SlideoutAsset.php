<?php

namespace raoul2000\widget\slideout;

use yii\web\AssetBundle;

/**
 *
 * @author Raoul <raoul.boulard@gmail.com>
 */
class SlideoutAsset extends AssetBundle {
	
	public $sourcePath = '@bower/slideout/lib';
	
	public function init() {
		//$this->sourcePath = __DIR__ . '/../assets';
		$this->js [] = YII_DEBUG ? 'slideout.js' : 'slideout.min.js';
	}
}
