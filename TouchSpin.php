<?php

namespace guzuomuse\touchspin;
/* 
 * author:孤坐暮色
 *  
*/
use yii\helpers\Json;
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
    public $pluginOptions=[];
    
        
    public function init(){
        parent::init();
        if(empty($this->selector)){
            $this->selector='#'.$this->id;
        }
        TouchSpinAsset::register($this->view,  \yii\web\View::POS_READY);
        $this->registerJs();
    }
    
    public function registerJs(){
        foreach ($this->pluginOptions as $k=>$v){
            $options.=$k.':'.  Json::encode($v).',';
        }

        $js=<<<EOD
$("$this->selector").TouchSpin({{$options}});       

EOD;
        

        $this->view->registerJs($js);
    }
}

