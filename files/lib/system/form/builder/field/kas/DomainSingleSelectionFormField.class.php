<?php

namespace wcf\system\form\builder\field\kas;

use wcf\system\form\builder\field\SingleSelectionFormField;
use wcf\system\form\builder\field\TDefaultIdFormField;
use wcf\system\form\builder\field\validation\FormFieldValidationError;
use wcf\system\form\builder\field\validation\FormFieldValidator;
use wcf\util\KasDomainUtil;

class DomainSingleSelectionFormField extends SingleSelectionFormField
{
    use TDefaultIdFormField;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        $this->label('wcf.global.form.kasDomain');
        $options = [];
        \array_push($options, [
            'depth' => 0,
            'isSelectable' => 1,
            'label' => 'wcf.global.language.noSelection',
            'value' => 'none'
        ]);
        $this->addValidator(new FormFieldValidator('checkSelection', function (DomainSingleSelectionFormField $field) {
            if ($field->getSaveValue() === 'none') {
                $field->addValidationError(
                    new FormFieldValidationError(
                        'checkSelection',
                        'wcf.global.form.kasDomain.error.checkSelection'
                    )
                );
            }
        }));
        foreach (KasDomainUtil::getDomainsWithSubDomains() as $domain) {
            \array_push($options, [
                'depth' => 0,
                'isSelectable' => $domain['is_active'] === 'Y' ? 1 : 0,
                'label' => $domain['domain_name'],
                'value' => $domain['domain_name']
            ]);
            if (!isset($domain['subdomains'])) {
                continue;
            }
            foreach ($domain['subdomains'] as $subDomain) {
                \array_push($options, [
                    'depth' => 1,
                    'isSelectable' => 1,
                    'label' => $subDomain['subdomain_name'],
                    'value' => $subDomain['subdomain_name']
                ]);
            }
        }
        $this->options($options, true);
    }

    /**
     * @inheritDoc
     */
    protected static function getDefaultId()
    {
        return 'kasDomain';
    }
}
