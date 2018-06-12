<div class="blog-post">

    <h2 class="blog-post-title">
        <a href="/posts/{{ $post->id }}">

            {{ $post->title }}

        </a>
    </h2>

    <p class="blog-post-meta">

        <a href="/user/{{ $post->user->nickname }}">{{ $post->user->nickname }}</a>
        {{ iconv("ISO-8859-13","utf-8",strftime("%Y %B %d (%H:%M)",strtotime($post->created_at))) }}
    </p>

    {{ $post->body }}



</div><!-- /.blog-post -->