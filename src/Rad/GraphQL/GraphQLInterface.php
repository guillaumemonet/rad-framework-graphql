<?php

namespace Rad\GraphQL;

use Psr\Http\Message\ServerRequestInterface;
use Youshido\GraphQL\Schema\AbstractSchema;

interface GraphQLInterface {

    public function setSchema(AbstractSchema $schema);

    public function processPayload(ServerRequestInterface $request);
}
