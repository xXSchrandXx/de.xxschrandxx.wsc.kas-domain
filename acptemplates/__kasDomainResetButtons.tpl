<ul>
	<li>
		<a 
			onclick="
				WCF.System.Confirmation.show('{jslang}wcf.acp.kasDomain.clear.sure{/jslang}', $.proxy(function (action) {
					if (action == 'confirm')
						window.location.href = $(this).attr('href');
				}, this));
				return false;
			" 
			href="{link controller='KasDomainResetList'}{/link}" class="button">
				<span class="icon icon16 fa-refresh"></span>
				<span>{lang}wcf.acp.kasDomain.button.clear{/lang}</span>
		</a>
	</li>
</ul>