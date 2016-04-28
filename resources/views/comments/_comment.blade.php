<div class="box-comment">
    <img class="img-circle img-sm" src="/assets/images/user2-160x160.jpg" alt="user image">
    <div class="comment-text">
        <span class="username">
            {{ $user->name }}
            <span class="text-muted pull-right">8:03 PM Today</span>
        </span>
        {{ $comment->body }}
    </div>
</div>