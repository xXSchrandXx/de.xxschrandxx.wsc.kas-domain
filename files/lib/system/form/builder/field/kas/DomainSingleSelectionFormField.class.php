<?php

namespace wcf\system\form\builder\field\kas;

use wcf\system\cache\builder\KasDomainCacheBuilder;
use wcf\system\form\builder\field\SingleSelectionFormField;
use wcf\system\form\builder\field\TDefaultIdFormField;

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
        foreach (KasDomainCacheBuilder::getInstance()->getData() as $domain) {
            if ($domain['is_active'] === 'N') {
                continue;
            }
            \array_push($options, $domain['domain_name']);
        }
        $this->options([
            $options
        ], false, false);
    }

    /**
     * @inheritDoc
     */
    protected static function getDefaultId()
    {
        return 'kasDomain';
    }
}
