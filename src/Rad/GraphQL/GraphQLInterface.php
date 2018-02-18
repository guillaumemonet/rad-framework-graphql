<?php

namespace Rad\GraphQL;

use Youshido\GraphQL\Schema\Schema;

interface GraphQLInterface {

    public function setSchema(Schema $schema);

    public function processPayload(): string;
}
