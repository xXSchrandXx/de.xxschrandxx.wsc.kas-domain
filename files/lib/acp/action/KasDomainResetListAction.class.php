<?php

namespace wcf\acp\action;

use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\Response\RedirectResponse;
use wcf\acp\page\KasDomainPage;
use wcf\action\AbstractAction;
use wcf\system\request\LinkHandler;
use wcf\util\KasDomainUtil;

final class KasDomainResetListAction extends AbstractAction
{
    /**
     * @inheritDoc
     */
    public $neededPermission = ['admin.kas.canManageDomains'];

    /**
     * @inheritDoc
     */
    public function execute()
    {
        parent::execute();

        KasDomainUtil::resetDomains();
        KasDomainUtil::resetSubDomains();

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