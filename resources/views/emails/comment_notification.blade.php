<!DOCTYPE html>
<html>
<head>
    <title>New Comment Notification</title>
</head>
<body>
    <p>Hello {{ $comment->user->name }},</p>

    <p>A new comment has been added to your feedback:</p>

    <p>{{ $comment->content }}</p>

    <p>Thank you for using our platform!</p>
</body>
</html>
