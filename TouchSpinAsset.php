<?php
/* 
 */
namespace guzuomuse\touchspin;
use yii\web\AssetBundle;
//设置别名,setAlias
\Yii::setAlias('@TouchSpin', dirname(__FILE__));
class TouchSpinAsset extends AssetBundle{
	public $sourcePath = '@TouchSpin/assets/';

	public $js = [
		"js/jquery.bootstrap-touchspin.js",
	];

	public $css = [
		"css/jquery.bootstrap-touchspin.css",                
	];

//	public $publishOptions = [
//		'forceCopy' => true
//	];

	public $depends = [
                'yii\web\JqueryAsset',
                'yii\bootstrap\BootstrapAsset',
	];    
}
