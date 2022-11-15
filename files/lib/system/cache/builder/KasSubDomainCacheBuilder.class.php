<?php

namespace wcf\system\cache\builder;

use wcf\system\kas\KasApi;

class KasSubDomainCacheBuilder extends AbstractCacheBuilder
{
    public function rebuild(array $parameters)
    {
        $data = [];
        try {
            $api = new KasApi();
            $data = $api->get_subdomains();
        } catch (\KasApi\KasApiException $e) {
            // TODO
            \wcf\functions\exception\logThrowable($e);
        }
        return $data;
    }
}
