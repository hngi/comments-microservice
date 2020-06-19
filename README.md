Click <a href='contribution.md'> here </a> for directives on how to contribute

## Documentation

comments microservice

<b>Introduction<b>
What does your API do? This is a comment microservice that allows user to create comments, edit comments and also flags comment. Users can also reply comments , flags reply and also upvote and downvote comments and replies. \n

<b>Overview </b>
Developers should note that all the parameters in the uris are not optional. All body contents should be sent in json. \n

Authentication
What is the preferred way of using the API? This API can be accessed with any programing language

\n

Error Codes
404, 400
\n

<b>Base Url: </b> https://fgn-comments-microservice.herokuapp.com

<b>POST tweet/comment</b>
tweet/comment
This route creates comments received on twitter report. The body will carry the owner username and email also the report id

BODY raw
{"report_id":"integer","comment_body": "string", "comment_origin": "string", "comment_owner_username": "string", "comment_owner_email": "string"}


Example Request
Default
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
Example Response
201
Body Headers (0)
["data" =>  [],
                    "message" =>  "Comment saved successfully",
                    "response" => "Created"]
GET reports/comments
reports/comments
This route returns all the comments in the database without the flagged comments.



Example Request
Default
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
Example Response
200
Body Headers (0)
'data' => [ "report_id": "integer',comment_origin: string, comment_body: string, comment_owner: string, votes: integer, replies_count: integer, upvotes: integer, downvotes: integer ],
                    'message' => 'Comment returned successfully',
                    'response'=> 'Ok'
GET report/comment/{report_id}
report/comment/{report_id}
This route returns all the comments in under a report in the database without the flagged comments.



Example Request
Default
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
Example Response
200
Body Headers (0)
'data' => [ "report_id": "integer',comment_origin: string, comment_body: string, comment_owner: string, votes: integer, replies_count: integer, upvotes: integer, downvotes: integer ],
                    'message' => 'Comment returned successfully',
                    'response'=> 'Ok'
DEL report/comment/{comment_id}
report/comment/{comment_id}
This route deletes a particular user comment



Example Request
Default
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
Example Response
200
Body Headers (0)
[
 'data' => ['comment' => ['id', $id]],
                'message' => 'Comment deleted successfully',
                'response' => 'Ok'
            ]
PATCH reports/comment/vote/{comment_id}
reports/comment/vote/{comment_id}
This route modifies the comments vote. User should send vote types between *upvote and *downvote. The body of the call must include the comment id

BODY raw
"vote_type": enum['upvote', 'downvote']


Example Request
Default
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
Example Response
202
Body Headers (0)
'data' => [comment_votes: integer, upvotes: integer, downvotes: integer],
                    'message' => 'Comment voted successfully',
                    'response' => 'Accepted'
PATCH reports/comment/flag/{comment_id}
reports/comment/flag/{comment_id}
This route flags comment

BODY raw
"is_flagged": true


Example Request
Default
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
Example Response
202
Body Headers (0)
'data' => [],
                    'message' => 'Comment flagged successfully',
                    'response' => 'Accepted'
PATCH reports/comment/edit/{comment_id}
reports/comment/edit/{comment_id}
This routes edits comment

BODY raw
"comment_body": "string"


Example Request
Default
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
PATCH reports/comment/reply/vote/{reply_id}
reports/comment/reply/vote/{reply_id}
Votes reply

BODY raw
vote_type: enum['upvote', 'downvote']


Example Request
Default
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
Example Response
202
Body Headers (0)
'data' => [],
                    'message' => 'Report flasuccessfully',
                    'response' => 'Ok'
PATCH reports/comment/edit/reply/{report_id}
reports/comment/edit/reply/{report_id}
This route allows user to edit reply

BODY raw
"reply_body": string


Example Request
Default
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
Example Response
202
Body Headers (0)
'data' => [],
                    'message' => 'Reply editted successfully',
                    'response' => 'Accepted'
PATCH reports/comment/reply/flag/{reply_id}
reports/comment/reply/flag/{reply_id}
Flags reply

BODY raw
"is_flagged": true


Example Request
Default
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
Example Response
202
Body Headers (0)
'data' => [],
                    'message' => 'Reply flagged successfully',
                    'response' => 'Accepted'
GET report/comment/{comment_id}/reply/{reply_id}
report/comment/{comment_id}/reply/{reply_id}
Get all the replies for a comment



Example Request
Default
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
Example Response
200
Body Headers (0)
'data' => [ "report_id": "integer'," comment_id": integer, reply_body: string,  votes: integer, reply_id: integer, upvotes: integer, downvotes: integer ],
                    'message' => 'Comment returned successfully',
                    'response'=> 'Ok'