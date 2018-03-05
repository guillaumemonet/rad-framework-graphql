#!/bin/sh
curl -XPOST -H "Content-Type:application/json"  -d '{"query":"{ latestPost { title, status, likeCount } }"}' http://localhost:8000/graphql
