<?php

namespace wcf\acp\page;

use wcf\page\AbstractPage;
use wcf\system\cache\builder\KasDomainCacheBuilder;
use wcf\system\cache\builder\KasSubDomainCacheBuilder;
use wcf\system\WCF;

class KasDomainPage extends AbstractPage
{
    protected $domains;
    protected $subDomains;

    /**
     * @inheritDoc
     */
    public function readParameters()
    {
        $this->domains = KasDomainCacheBuilder::getInstance()->getData();
        $this->subDomains = KasSubDomainCacheBuilder::getInstance()->getData();

        wcfDebug($this->domains, $this->subDomains);
    }

    /**
     * @inheritDoc
     */
    public function assignVariables()
    {
        parent::assignVariables();

        // assign sorting parameters
        WCF::getTPL()->assign([
            'domains' => $this->domains,
            'subDomains' => $this->subDomains
        ]);
    }
}
