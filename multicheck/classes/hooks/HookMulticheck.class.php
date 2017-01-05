<?php

class PluginMulticheck_HookMulticheck extends Hook {
    public function RegisterHook() {
        $this->AddHook('content_field_proccess',                     'hook_content_field_proccess');
        $this->AddHookTemplate('admin_content_add_field_list',       Plugin::GetTemplateDir(__CLASS__) . 'tpls/content-field-multicheck-option.tpl');
        $this->AddHookTemplate('admin_content_add_field_properties', Plugin::GetTemplateDir(__CLASS__) . 'tpls/content-field-multicheck-properties.tpl');
    }

    public function hook_content_field_proccess(array &$aVars) {
        $oField = $aVars['oField'];
        if ('multicheck' == $oField->getFieldType()) {
            if (!empty($_REQUEST['fields'][$oField->getFieldId()])) {
				if (is_array($_REQUEST['fields'][$oField->getFieldId()])) {
					$aVars['sData'] = $_REQUEST['fields'][$oField->getFieldId()] = implode(',', $_REQUEST['fields'][$oField->getFieldId()]);
				}
            }
        }
    }

}

// EOF
