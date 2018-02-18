<?php

namespace example;

use example\Schema\BlogSchema;
use Rad\Controller\Controller;
use Rad\GraphQL\GraphQL;

/**
 * Description of GraphQLController
 *
 * @author guillaume
 */
class GraphQLController extends Controller {

    /**
     * @get /graphql/
     * @post /graphql/
     * @produce json
     */
    public function graphQL() {
        $blogSchema = new BlogSchema();
        GraphQL::getHandler()->setSchema($blogSchema);
        return GraphQL::getHandler()->processPayload();
    }

}
