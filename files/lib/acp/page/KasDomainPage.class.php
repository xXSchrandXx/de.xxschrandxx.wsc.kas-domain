<?php

namespace wcf\acp\page;

use wcf\page\AbstractPage;
use wcf\system\WCF;
use wcf\util\KasDomainUtil;

class KasDomainPage extends AbstractPage
{
    /**
     * @inheritDoc
     */
    public $activeMenuItem = 'wcf.acp.menu.link.configuration.kas.kasDomainPage';

    /**
     * @inheritDoc
     */
    public $neededPermission = ['admin.kas.canManageDomains'];

    /**
     * List of cached domains
     * @var array
     */
    protected $domains;

    /**
     * List of cached subdomains
     * @var array
     */
    protected $subDomains;

    /**
     * @inheritDoc
     */
    public function readParameters()
    {
        $this->domains = KasDomainUtil::getDomainsWithSubDomains();
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
