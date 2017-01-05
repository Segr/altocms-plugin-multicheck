{if $oField}
    {$iFieldId = $oField->getFieldId()}
	{$iFieldValues = array_filter(array_map('trim', explode(',', $_aRequest.fields.$iFieldId)))}
	<div class="info-container"><i class="fa fa-info-circle pull-right js-title-topic" data-original-title="{$oField->getFieldDescription()}"></i></div>
    <div class="form-group">
		<label for="properties-{$iFieldId}">{$oField->getFieldName()}</label>
		<table border="0" width="100%">
		{foreach from=$oField->getSelectVal() name=items item=sValue}
			{if ($sValue@iteration-1)%3==0}<tr>{/if}<td width="33%" style="vertical-align:top">
			<div class="checkbox" style="margin-left:25px">
				<label style="margin-left:-25px">
					<input class="form-control" type="checkbox" id="fields-{$iFieldId}" name="fields[{$iFieldId}][]" value="{$sValue}" {if in_array(trim($sValue), $iFieldValues)}checked="checked"{/if} />
					{$sValue}
				</label>
			</div>
			</td>{if ($sValue@iteration-1)%3==2 && $sValue@last}</tr>{/if}
		{/foreach}
		</table>
    </div>
{/if}