<?php

namespace Rad\GraphQL;

use ErrorException;
use Psr\Http\Message\ServerRequestInterface;
use Rad\Log\Log;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Schema\AbstractSchema;

class GraphQLHandler implements GraphQLInterface {

    private $processor;
    private $schema;

    public function processPayload(ServerRequestInterface $request) {
        if ($this->processor === null || $this->schema === null) {
            throw new ErrorException('GraphQL Processor or Schema not defined');
        }
        if (in_array('application/json', $request->getHeader('Content-Type'))) {
            $requestData = (array) json_decode($request->getBody()->getContents());
            Log::getHandler()->debug(json_last_error_msg());
        } else {
            $requestData = $request->getBody()->getContents();
        }
        $payload = isset($requestData['query']) ? $requestData['query'] : null;
        $variables = isset($requestData['variables']) ? $requestData['variables'] : null;
        return $this->processor->processPayload($payload, $variables)->getResponseData();
    }

    public function setSchema(AbstractSchema $schema) {
        $this->schema = $schema;
        $this->processor = new Processor($schema);
    }

}
