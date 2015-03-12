<?php
namespace raoul2000\widget\slideout;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use raoul2000\widget\sidr\SidrAsset;

/**
 * The **Slideout widget** is a wrapper around the [slideout.js plugin](https://mango.github.io/slideout/).
 *
 * @author Raoul
 */
class Slideout extends Widget
{
	const DEFAULT_NAME = 'yii2_raoul2000_slideout';
			
	public $instanceName = self::DEFAULT_NAME;
	
	/**
	 * @var array plugin options
	 */
	public $pluginOptions = [];

	/**
	 * @see \yii\base\Object::init()
	 */
	public function init()
	{
		parent::init();
		if( empty($this->instanceName)) {
			throw new InvalidConfigException('Missing "instanceName" property');
		}
	}

	/**
	 * @see \yii\base\Widget::run()
	 */
	public function run()
	{
		$this->registerClientScript();
	}

	/**
	 * Generates and registers javascript to start the plugin.
	 */
	public function registerClientScript()
	{
		$view = $this->getView();
		SlideoutAsset::register($view);

		$options = empty($this->pluginOptions) ? "{}" : Json::encode($this->pluginOptions);
		$js = 'var '. $this->instanceName.' = new Slideout(' . $options . ')';
		$view->registerJs($js, $view::POS_END);
	}
}
