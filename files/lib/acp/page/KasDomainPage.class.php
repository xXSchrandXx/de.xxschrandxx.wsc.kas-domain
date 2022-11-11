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

        foreach (KasSubDomainCacheBuilder::getInstance()->getData() as $subDomain) {
            if (!preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $subDomain['subdomain_name'], $regs)) {
                continue;
            }
            foreach ($this->domains as &$domain) {
                if ($domain['domain_name'] !== $regs['domain']) {
                    continue;
                }
                $domain['sub_domains'][] = $subDomain;
                break;
            }
        }

        wcfDebug($this->domains);
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
