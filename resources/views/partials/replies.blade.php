<li class="collection-item">
    <ul class="question">
        <li class="question-reply-first">{{ $reply->user->name }}</li>
        <li class="question-reply-second">{{ $reply->body  }}</li>
        <li class="question-reply-third">{{ $reply->created_at->diffForHUmans() }}</li>
    </ul>
</li>

