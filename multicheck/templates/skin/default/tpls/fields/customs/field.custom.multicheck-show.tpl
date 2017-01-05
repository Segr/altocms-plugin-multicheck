{if $oField}
    {$oTopicField = $oTopic->getField($oField->getFieldId())}
    {if $oTopicField}
        <p>
            <strong>{$oField->getFieldName()}</strong>:
            {$oTopicField->getValue()}
        </p>
    {/if}
{/if}