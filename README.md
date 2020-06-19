Click [here](contribution.md) for directives on how to contribute

# comments microservice

## Introduction
What does your API do? This is a comment microservice that allows user to create comments, edit comments and also flags comment. Users can also reply comments , flags reply and also upvote and downvote comments and replies. 

## Overview 
Developers should note that all the parameters in the uris are not optional. All body contents should be sent in json. 

## Authentication
What is the preferred way of using the API? This API can be accessed with any programing language

## Error Codes
```
404, 400, 401
```


## Base Url
[https://fgn-comments-microservice.herokuapp.com](https://fgn-comments-microservice.herokuapp.com)


## POST : `tweet/comment`

This route creates comments received on twitter report. The body will carry the owner username and email also the report id

> BODY 

```json
{"report_id":"integer","comment_body": "string", "comment_origin": "string", "comment_owner_username": "string", "comment_owner_email": "string"}
```

> Example Request
` Default
```js
var raw = "{\"report_id\":\"integer\",\"comment_body\": \"string\", \"comment_origin\": \"string\", \"comment_owner_username\": \"string\", \"comment_owner_email\": \"string\"}";


var requestOptions = {
  method: 'POST',
  body: raw,
  redirect: 'follow'
};

fetch("tweet/comment", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
> Example Response

```
201
```
**Body Headers (0)**
```json
{"data" :  [],
"message" :  "Comment saved successfully",
"response" : "Created"}
```

## GET: reports/comments

This route returns all the comments in the database without the flagged comments.


> Example Request
- Default
```js
var raw = "";

var requestOptions = {
  method: 'GET',
  body: raw,
  redirect: 'follow'
};

fetch("reports/comments", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```

> Example Response

```
200
```
**Body Headers (0)**
```json
{"data" : [{
    "report_id": "integer",
    "comment_origin": "string",
    "comment_body": "string", 
    "comment_owner": "string", 
    "votes": "integer", 
    "replies_count": "integer", 
    "upvotes": "integer", 
    "downvotes": "integer" 
    },],
"message" : "Comment returned successfully",
"response" : "Ok"
}
```

## GET: report/comment/{report_id}

This route returns all the comments in under a report in the database without the flagged comments.

> Example Request
- Default

```js
var raw = "";

var requestOptions = {
  method: 'GET',
  body: raw,
  redirect: 'follow'
};

fetch("report/comment/{report_id}", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
> Example Response
```
200
```
**Body Headers (0)**
```json
{"data" : [{ 
        "report_id": "integer",
        "comment_origin" : "string",
        "comment_body" : "string",
        "comment_owner" : "string",
        "votes" : "integer",
        "replies_count" : "integer",
        "upvotes" : "integer",
        "downvotes" : "integer",
    },],
    "message" : "Comment returned successfully",
    "response" : "Ok"
}
```

## DEL: report/comment/{comment_id}

This route deletes a particular user comment

> Example Request
- Default
```js
var raw = "";

var requestOptions = {
  method: 'DELETE',
  body: raw,
  redirect: 'follow'
};

fetch("report/comment/{comment_id}", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
  ```
> Example Response
```
200
```
** Body Headers (0)**
```json
[
 "data" : {"comment" : {"id" : "int"}},
                "message" : "Comment deleted successfully",
                "response" : "Ok"
            ]
```
## PATCH : reports/comment/vote/{comment_id}

This route modifies the comments vote. User should send vote types between *upvote and *downvote. The body of the call must include the comment id

## BODY  Raw
```
"vote_type": enum['upvote', 'downvote']
```

> Example Request
- Default
```js
var raw = "\"vote_type\": enum['upvote', 'downvote']";

var requestOptions = {
  method: 'PATCH',
  body: raw,
  redirect: 'follow'
};

fetch("reports/comment/vote/{comment_id}", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
> Example Response
202
**Body Headers (0)**
```json
{"data" : [{
    "comment_votes": "integer",
    "upvotes": "integer",
    "downvotes": "integer",
    "'message" : "Comment voted successfully",
    "response" : "Accepted"
    },]
    }
```
## PATCH: reports/comment/flag/{comment_id}

This route flags comment

> BODY raw

```
"is_flagged": true
```

> xample Request
- Default
```Js
var raw = "\"is_flagged\": true";

var requestOptions = {
  method: 'PATCH',
  body: raw,
  redirect: 'follow'
};

fetch("reports/comment/flag/{comment_id}", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
  ```

> Example Response
```
202
```

**Body Headers (0)**
```
'data' => [],
    202esponse' => 'Accepted'
```

## PATCH: reports/comment/edit/{comment_id}

This routes edits comment

> BODY raw
```
"comment_body": "string"
```

> Example Request
- Default
```js
var raw = "\"comment_body\": \"string\"";

var requestOptions = {
  method: 'PATCH',
  body: raw,
  redirect: 'follow'
};

fetch("reports/comment/edit/{comment_id}", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
Example Response
202
Body Headers (0)
'data' => [],
                    'message' => 'Comment editted successfully',
                    'response' => 'Accepted'
```
## PATCH: reports/comment/reply/vote/{reply_id}

Votes reply

> BODY raw
```
vote_type: enum['upvote', 'downvote']
```

> Example Request
- Default
```js
var raw = "vote_type: enum['upvote', 'downvote']";

var requestOptions = {
  method: 'PATCH',
  body: raw,
  redirect: 'follow'
};

fetch("reports/comment/reply/vote/{reply_id}\n", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
  ```
> Example Response
```
202
```
**Body Headers (0)**
```json
"data" : {
    "message" : "Report flag successfully",
    "response" : "Ok"
    },
```
## PATCH: reports/comment/edit/reply/{report_id}

This route allows user to edit reply

> BODY raw
```
"reply_body": string

```
> Example Request
- Default
```js
var raw = "\"reply_body\": string";

var requestOptions = {
  method: 'PATCH',
  body: raw,
  redirect: 'follow'
};

fetch("reports/comment/edit/reply/{report_id}", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
  ```
> Example Response
```
202
```
**Body Headers (0)**
```
'data' => [
        'message' => 'Reply editted successfully',
        'response' => 'Accepted'
    ],
```
## PATCH:  reports/comment/reply/flag/{reply_id}

Flags reply

> BODY raw
```
"is_flagged": true

```
> Example Request
- Default
```js
var raw = "\"is_flagged\": true";

var requestOptions = {
  method: 'PATCH',
  body: raw,
  redirect: 'follow'
};

fetch("reports/comment/reply/flag/{reply_id}\n", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
> Example Response
```
202
```
**Body Headers (0)**
```json
'data' => [],
                    'message' => 'Reply flagged successfully',
                    'response' => 'Accepted'
```
## GET report/comment/{comment_id}/reply/{reply_id}

Gets all the replies for a comment

> Example Request
- Default
```js
var raw = "";

var requestOptions = {
  method: 'GET',
  body: raw,
  redirect: 'follow'
};

fetch("report/comment/{comment_id}/reply/{reply_id}", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
```
> Example Response
```
200
```
**Body Headers (0)**
```json
{"data" : [{ 
    "report_id": "integer",
    "comment_id": "integer",
    "reply_body": "string",
    "votes": "integer",
    "reply_id": "integer",
    "upvotes": "integer",
    "downvotes": "integer" 
    },],
"message"  : "Comment returned successfully",
"response" : "Ok"
}
```
