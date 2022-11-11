<?php

namespace wcf\acp\action;

use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use wcf\acp\page\KasDomainPage;
use wcf\action\AbstractAction;
use wcf\system\cache\builder\KasDomainCacheBuilder;
use wcf\system\cache\builder\KasSubDomainCacheBuilder;
use wcf\system\request\LinkHandler;

final class KasDomainResetListAction extends AbstractAction
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        parent::execute();

        KasDomainCacheBuilder::getInstance()->reset();
        KasSubDomainCacheBuilder::getInstance()->reset();

        $this->executed();

        if (isset($_POST['noRedirect'])) {
            return new EmptyResponse();
        } else {
            return new RedirectResponse(
                LinkHandler::getInstance()->getControllerLink(KasDomainPage::class)
            );
        }
    }
}