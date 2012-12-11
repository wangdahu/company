<?php
/**
 * eg: <?php $this->widget('ext.Editor.Editor', array('name' => '...'))?>
 * eg: <?php $this->widget('ext.Editor.Editor', array('name' => '...', 'value' => '...', config => array(...)))?>
 *
 */

class Editor extends CWidget{

    public $name = "content";
    public $value;
    public $forceScript;
    public $config;
    public $debug;

    public function run(){
        if(!isset($this->config['textarea'])){
            $this->config['textarea'] = $this->name;
        }

        if(!isset($this->config['initialContent'])){
            $this->config['initialContent'] = $this->value;
        }

        $id = $this->name;
        if($this->debug){
            echo '<textarea rows="6" clos="60" name="'.$id.'"'.$this->config['initialContent'].'</textarea>';
            return;
        }
        $config = json_encode($this->config);
        $script = $this->forceScript ? '' : '<div type="text/editor" id="'.$id.'"></div>';

        echo <<<HTML
            $script
            <script>
            $(function(){
                    var name = '$id',
                        editor = new baidu.editor.ui.Editor($config);
                    editor.render(name);
                    baidu.editors = baidu.editors || {};
                    baidu.editors[name] = editor;

                    // sync content on every change event
                    var id = name.replace(/\[(\w*)\]/g, '_$1');
                    // create a hidden element for yii validation
                    $(editor.iframe).closest('form').submit(updateContent).append('<input id="'+id+'" type="hidden" />');
                    updateContent();
                    $(editor.document.body).bind("input", updateContent).bind("paste", updateContent);

                    function updateContent(){
                        editor.sync();
                        var contentTxt = editor.getContentTxt(),
                            content = contentTxt.length ? editor.getContent() : '';
                        // make sure the content do not ony contains empty tags
                        document.getElementById('ueditor_textarea_'+name).value = content;
                        document.getElementById(id).value = content;
                    }
                });
        </script>
              HTML;
        Yii::app()->clientScript->registerCssFile('/source/uediter/themes/default/ueditor.css');
        Yii::app()->clientScript->registerScriptFile('/source/uediter/editor_config.js');
        Yii::app()->clientScript->registerScriptFile('/source/uediter/editor_all_min.js');
        Yii::app()->clientScript->registerScriptFile('/source/uediter/lang/zh-cn/zh-cn.js');
    }
}
