<?php

namespace wcf\util;

use wcf\system\cache\builder\KasDomainCacheBuilder;
use wcf\system\cache\builder\KasSubDomainCacheBuilder;

class KasDomainUtil
{
    /**
     * Resets cached domains
     */
    public static function resetDomains()
    {
        KasDomainCacheBuilder::getInstance()->reset();
    }

    /**
     * Get cached domains
     * @return array
     */
    public static function getDomains()
    {
        return KasDomainCacheBuilder::getInstance()->getData();
    }

    /**
     * Resets cached subdomains
     */
    public static function resetSubDomains()
    {
        KasSubDomainCacheBuilder::getInstance()->reset();
    }

     /**
      * Get cached subdomains
     * @return array
     */
    public static function getSubDomains()
    {
        return KasSubDomainCacheBuilder::getInstance()->getData();
    }

    /**
     * Adds subdomains to their domain
     * @param array $domains
     * @param array $subDomains
     * @return array
     */
    public static function addSubDomains(&$domains, $subDomains)
    {
        foreach ($subDomains as $subDomain) {
            if (!preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $subDomain['subdomain_name'], $regs)) {
                continue;
            }
            foreach ($domains as &$domain) {
                if ($domain['domain_name'] !== $regs['domain']) {
                    continue;
                }
                $domain['subdomains'][] = $subDomain;
                break;
            }
        }
    }

    /**
     * Get cached domains with their subdomains
     * @return array
     */
    public static function getDomainsWithSubDomains()
    {
        $domains = self::getDomains();
        $subDomains = self::getSubDomains();
        self::addSubDomains($domains, $subDomains);
        return $domains;
    }
}
