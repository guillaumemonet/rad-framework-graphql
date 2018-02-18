<?php

/**
 * PostStatus.php
 */

namespace example\Schema;

use Youshido\GraphQL\Type\Enum\AbstractEnumType;

class PostStatus extends AbstractEnumType {

    public function getValues() {
        return [
            [
                'value' => 0,
                'name' => 'DRAFT',
            ],
            [
                'value' => 1,
                'name' => 'PUBLISHED',
            ]
        ];
    }

}
