<div class="container">
    <div class="row">
    <!-- Contenedor Principal -->
        <div class="comments-container">
            <h1>{{ trans('homepage.all_comment') }}</h1>
            @foreach($comments as $key => $comment)
            <ul id="comments-list" class="comments-list">
                <li>
                    <div class="comment-main-level">
                        <!-- Avatar -->
                        <div class="comment-avatar">
                            <img alt="{{ $comment->user->name }}"
                            src="{{ is_null($comment->user->avatar) ?
                            config('user.avatar.default_url') : $comment->user->avatar }}">
                        </div>
                        <!-- Contenedor del Comentario -->
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name by-author">
                                    {{ $comment->user->name }}
                                </h6>
                                <span>{{ $comment->created_at }}</span>
                            </div>
                            <div class="comment-content">
                                {{ $comment->content }}
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
</div>
