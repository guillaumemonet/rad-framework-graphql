<?php

/**
 * PostInputType.php
 */

namespace example\Schema;

use Youshido\GraphQL\Type\InputObject\AbstractInputObjectType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\StringType;

class PostInputType extends AbstractInputObjectType {

    public function build($config) {
        $config
                ->addField('title', new NonNullType(new StringType()))
                ->addField('summary', new StringType());
    }

}
