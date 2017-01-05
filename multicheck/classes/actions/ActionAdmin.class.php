<?php
class PluginMulticheck_ActionAdmin extends PluginMulticheck_Inherits_ActionAdmin {
    protected function SubmitAddField($oContentType) {
        // * Проверяем отправлена ли форма с данными
        if (!F::isPost('submit_field')) {
            return false;
        }

        // * Проверка корректности полей формы
        if (!$this->CheckFieldsField($oContentType)) {
            return false;
        }

        /** @var ModuleTopic_EntityField $oField */
        $oField = E::GetEntity('Topic_Field');
        $oField->setFieldType(F::GetRequest('field_type'));
        $oField->setContentId($oContentType->getContentId());
        $oField->setFieldName(F::GetRequest('field_name'));
        $oField->setFieldDescription(F::GetRequest('field_description'));
        $oField->setFieldRequired(F::GetRequest('field_required'));
        if (F::GetRequest('field_type') == 'select') {
            $oField->setOptionValue('select', F::GetRequest('field_values'));
        }
        if (F::GetRequest('field_type') == 'multicheck') {
            $oField->setOptionValue('select', F::GetRequest('field_values'));
        }

        if (E::ModuleTopic()->AddContentField($oField)) {
            E::ModuleMessage()->AddNoticeSingle(E::ModuleLang()->Get('action.admin.contenttypes_success_fieldadd'), null, true);
            R::Location('admin/settings-contenttypes/edit/' . $oContentType->getContentId() . '/');
        }
        return false;
	}

    protected function SubmitEditField($oContentType, $oField) {
       // * Проверяем отправлена ли форма с данными
        if (!F::isPost('submit_field')) {
            return false;
        }

        // * Проверка корректности полей формы
        if (!$this->CheckFieldsField($oContentType)) {
            return false;
        }

        if (!E::ModuleTopic()->GetFieldValuesCount($oField->getFieldId())) {
            // Нет ещё ни одного значения этого поля, тогда можно сменить ещё и тип
            $oField->setFieldType(F::GetRequest('field_type'));
        }
        $oField->setFieldName(F::GetRequest('field_name'));
        $oField->setFieldDescription(F::GetRequest('field_description'));
        $oField->setFieldRequired(F::GetRequest('field_required'));
        if ($oField->getFieldType() == 'select') {
            $oField->setOptionValue('select', F::GetRequest('field_values'));
        }
        if ($oField->getFieldType() == 'multicheck') {
            $oField->setOptionValue('select', F::GetRequest('field_values'));
        }

        if (E::ModuleTopic()->UpdateContentField($oField)) {
            E::ModuleMessage()->AddNoticeSingle(E::ModuleLang()->Get('action.admin.contenttypes_success_fieldedit'), null, true);
            R::Location('admin/settings-contenttypes/edit/' . $oContentType->getContentId() . '/');
        }
        return false;
    }
}