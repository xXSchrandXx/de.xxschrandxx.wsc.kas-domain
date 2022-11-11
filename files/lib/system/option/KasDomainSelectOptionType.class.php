<?php

namespace wcf\system\option;

use wcf\data\option\Option;
use wcf\system\cache\builder\KasDomainCacheBuilder;
use wcf\system\exception\UserInputException;
use wcf\system\WCF;

class KasDomainSelectOptionType extends AbstractOptionType
{
    /**
     * @inheritDoc
     */
    public function getFormElement(Option $option, $value)
    {
        $kasDomainList = KasDomainCacheBuilder::getInstance()->getData();

        WCF::getTPL()->assign([
            'kasDomainList' => $kasDomainList,
            'option' => $option,
            'value' => $value
        ]);
        return WCF::getTPL()->fetch('__kasDomainSelectOptionType');
    }

    /**
     * @inheritDoc
     */
    public function validate(Option $option, $newValue)
    {
        if (!empty($newValue)) {
            $kasDomainList = KasDomainCacheBuilder::getInstance()->getData();

            // TODO
            if (false) {
                throw new UserInputException($option->optionName);
            }
        }
    }
}
