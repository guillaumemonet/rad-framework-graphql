<?php

namespace Rad\GraphQL;

use ErrorException;
use Psr\Http\Message\RequestInterface;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Schema\Schema;

class GraphQLHandler implements GraphQLInterface {

    private $processor;
    private $schema;

    public function processPayload(RequestInterface $request): string {
        if ($this->processor === null || $this->schema === null) {
            throw new ErrorException('GraphQL Processor or Schema not defined');
        }
        if (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
            $rawBody = file_get_contents('php://input');
            $requestData = json_decode($rawBody ?: '', true);
        } else {
            $requestData = $_POST;
        }
        $payload = isset($requestData['query']) ? $requestData['query'] : null;
        $variables = isset($requestData['variables']) ? $requestData['variables'] : null;
        return $processor->processPayload($payload, $variables)->getResponseData();
    }

    public function setSchema(Schema $schema) {
        $this->schema = $schema;
        $this->processor = new Processor($schema);
    }

}
