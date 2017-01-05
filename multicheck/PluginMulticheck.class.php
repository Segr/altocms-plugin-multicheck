<?php
if (!class_exists('Plugin')) die('Hacking attemp!');

class PluginMulticheck extends Plugin {
    public $aDelegates = array(
        'template' => array(
            'tpls/fields/customs/field.custom.multicheck-edit.tpl'=>'_tpls/fields/customs/field.custom.multicheck-edit.tpl',
            'tpls/fields/customs/field.custom.multicheck-show.tpl'=>'_tpls/fields/customs/field.custom.multicheck-show.tpl',
			),
		);
	protected $aInherits=array(
        'action' => array(
			'ActionAdmin',
			),
		);
    public function Activate() {
		return true;
    }
    public function Deactivate(){
        return true;
    }
    public function Init() {
    }
}
?>
