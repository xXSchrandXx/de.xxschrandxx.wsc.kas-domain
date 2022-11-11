{if $kasDomainList|count}
    <select id="{$option->optionName}" name="values[{$option->optionName}]">
        <option></option>
        {foreach from=$kasDomainList item=kasDomain}
            <option value="{@$kasDomain->getObjectID()}" {if $kasDomain->getObjectID() == $value} selected{/if}>
                {$kasDomain->getTitle()}</option>
        {/foreach}
    </select>
{else}
    <p class="info">{lang}wcf.acp.kasDomainSelectOptionType.noServer{/lang}</p>
{/if}