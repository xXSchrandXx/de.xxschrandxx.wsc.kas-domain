{if $kasDomainList|count}
    <select id="{$option->optionName}" name="values[{$option->optionName}]">
        <option></option>
        {foreach from=$kasDomainList item=kasDomain}
            <option value="{@$kasDomain['domain_name']}" {if $kasDomain['domain_name'] == $value} selected{/if}>
                {$kasDomain['domain_name']}</option>
        {/foreach}
    </select>
{else}
    <p class="info">{lang}wcf.acp.kasDomainSelectOptionType.noServer{/lang}</p>
{/if}