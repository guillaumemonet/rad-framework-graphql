<?php

namespace Rad\GraphQL;

use Psr\Http\Message\RequestInterface;
use Youshido\GraphQL\Schema\AbstractSchema;

interface GraphQLInterface {

    public function setSchema(AbstractSchema $schema);

    public function processPayload(RequestInterface $request);
}
