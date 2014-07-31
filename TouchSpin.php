<?php

namespace guzuomuse\touchspin;

/*
 * author:孤坐暮色
 *  
 */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

class TouchSpin extends \yii\base\Widget {
    /*
     * $selector css selector for example: ".class_name",".selector_1 .selector_2","#identitior"
     */

    public $selector;

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /*
      @var array  options配置
     */
    public $pluginOptions = [];

//    public function init(){
//        parent::init();
//        if(empty($this->selector)){
//            $this->selector='#'.$this->id;
//        }
//        echo Html::beginTag('div', $this->options) . "\n";
//        TouchSpinAsset::register($this->view,  \yii\web\View::POS_READY);
//        $this->registerJs();
//    }
    public function run() {
        parent::run();
        TouchSpinAsset::register($this->view, \yii\web\View::POS_READY);
        if (empty($this->selector)) {
            $this->selector = '#' . $this->id;
        }
        $this->registerJs();
    }

    public function registerJs() {
        if (!empty($this->pluginOptions)) {
            foreach ($this->pluginOptions as $k => $v) {
                $options.=$k . ':' . Json::encode($v) . ',';
            }
        }
        $str_start=Html::beginTag('div', $this->options);
        $str_end=Html::endTag('div');
        $js = <<<EOD
             
$("$this->selector").TouchSpin({{$options}});       

$("$this->selector").closest(".bootstrap-touchspin").wrap('$str_start.$str_end');          
        
EOD;


        $this->view->registerJs($js);
    }

}
