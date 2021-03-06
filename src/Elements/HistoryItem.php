<?php

namespace Marknl\Iodef\Elements;

use Marknl\Iodef\IodefElement;

class HistoryItem extends IodefElement
{
    public function __construct()
    {
        $this->attributes = [
            'restriction'   => '',
            'action'        => '',
            'ext-action'    => '',
        ];

        $this->elements = [
            'DateTime'          => parent::REQUIRED,
            'IncidentId'        => parent::OPTIONAL,
            'Contact'           => parent::OPTIONAL,
            'Description'       => parent::OPTIONAL_MULTI,
            'AdditionalData'    => parent::OPTIONAL_MULTI,
        ];
    }

    /**
     * Attribute validation rules
     * @return array
     */
    public function getAttributeRules()
    {
        return [
            'required' => 'action',
            'in' => [
                ['restriction',
                    [
                        'default',
                        'public',
                        'need-to-know',
                        'private'
                    ]
                ],
                ['action',
                    [
                        'nothing',
                        'contact-source-site',
                        'contact-target-site',
                        'contact-sender',
                        'investigate',
                        'block-host',
                        'block-network',
                        'block-port',
                        'rate-limit-host',
                        'rate-limit-network',
                        'rate-limit-port',
                        'remediate-other',
                        'status-triage',
                        'status-new-info',
                        'other',
                        'ext-value',
                    ],
                ],
            ],
        ];
    }
}
