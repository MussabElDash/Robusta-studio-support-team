<div class="box-comment">
    @if( $user->profile_image_path == null)
        <img class="img-circle img-sm" src="/assets/images/user2-160x160.jpg" alt="user image">
    @else
        <img src="{{ $user->profile_image_path }}" alt="" class="img-circle">
    @endif
    <div class="comment-text">
        <span class="username">
            {{ $user->name }}
            <span class="text-muted pull-right">{{ Carbon::createFromTimeStamp(strtotime($comment->updated_at))->toFormattedDateString() }}</span>
        </span>
        {{ $comment->body }}
    </div>
</div>