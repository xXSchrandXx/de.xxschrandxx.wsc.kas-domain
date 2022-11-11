{include file='header' pageTitle='wcf.acp.page.kasDomain.title'}

<header class="contentHeader">
	<div class="contentHeaderTitle">
		<h1 class="contentTitle">{lang}wcf.acp.page.kasDomain.title{/lang}</h1>
	</div>

	<nav class="contentHeaderNavigation">
		{include file='__kasDomainResetButtons'}
		{event name='contentHeaderNavigation'}
	</nav>
</header>

{if $domains|count}
	<div class="section">
		<table class="table">
			<thead>
				<tr>
					<th>{lang}wcf.acp.page.kasDomain.domain_name{/lang}</th>
					<th>{lang}wcf.acp.page.kasDomain.is_active{/lang}</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$domains item=domain}
					<tr>
						<td class="columnTitle">{$domain['domain_name']}</td>
						<td class="columnBoolean">{$domain['is_active']}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
{else}
	<p class="info">{lang}wcf.global.noItems{/lang}</p>
{/if}

<footer class="contentFooter">
	<nav class="contentFooterNavigation">
		{include file='__kasDomainResetButtons'}
		{event name='contentFooterNavigation'}
	</nav>
</footer>

{include file='footer'}
