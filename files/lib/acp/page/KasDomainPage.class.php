<?php

namespace wcf\acp\page;

use wcf\page\AbstractPage;
use wcf\system\cache\builder\KasDomainCacheBuilder;
use wcf\system\WCF;

class KasDomainPage extends AbstractPage
{
    protected $domains;

    /**
     * @inheritDoc
     */
    public function readParameters()
    {
        $this->domains = KasDomainCacheBuilder::getInstance()->getData();
    }

    /**
     * @inheritDoc
     */
    public function assignVariables()
    {
        parent::assignVariables();

        // assign sorting parameters
        WCF::getTPL()->assign([
            'domains' => $this->domains
        ]);
    }
}
