<ul>
	<li>
		<a 
			onclick="
				WCF.System.Confirmation.show('{jslang}wcf.acp.page.kasDomain.clear.sure{/jslang}', $.proxy(function (action) {
					if (action == 'confirm')
						window.location.href = $(this).attr('href');
				}, this));
				return false;
			" 
			href="{link controller='KasDomainResetList'}{/link}" class="button">
				{icon name='refresh'}
				<span>{lang}wcf.acp.page.kasDomain.button.clear{/lang}</span>
		</a>
	</li>
</ul>
