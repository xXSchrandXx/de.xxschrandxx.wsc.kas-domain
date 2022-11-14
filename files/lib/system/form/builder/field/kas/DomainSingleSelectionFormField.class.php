<?php

namespace wcf\system\form\builder\field\kas;

use wcf\system\form\builder\field\SingleSelectionFormField;
use wcf\system\form\builder\field\TDefaultIdFormField;
use wcf\util\KasDomainUtil;

class DomainSingleSelectionFormField extends SingleSelectionFormField
{
    use TDefaultIdFormField;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->label('wcf.global.kasDomain');
        $options = [];
        \array_push($options, [
            'depth' => 0,
            'isSelectable' => 1,
            'label' => 'wcf.global.language.noSelection',
            'value' => 'none'
        ]);
        foreach (KasDomainUtil::getDomainsWithSubDomains() as $domain) {
            \array_push($options, [
                'depth' => 0,
                'isSelectable' => $domain['is_active'] === 'Y' ? 1 : 0,
                'label' => $domain['domain_name'],
                'value' => $domain['domain_name']
            ]);
            if (!isset($domain['subdomains'])) {
                continue;
            }
            foreach ($domain['subdomains'] as $subDomain) {
                \array_push($options, [
                    'depth' => 1,
                    'isSelectable' => 1,
                    'label' => $subDomain['subdomain_name'],
                    'value' => $subDomain['subdomain_name']
                ]);
            }
        }
        $this->options($options, true);
    }

    /**
     * @inheritDoc
     */
    protected static function getDefaultId()
    {
        return 'kasDomain';
    }
}
