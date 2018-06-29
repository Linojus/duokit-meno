
<li class="list-group-item">
    <!-- <div class="comment mb-2 col-sm-1 row"> -->
    <div class="comment-content col-md-11 col-sm-8">
        <h6 class="small comment-meta">
            <a href="/user/{{$comment->user->nickname}}">
                {{ $comment->user->name . ' ' . $comment->user->surname . ' (' .$comment->user->nickname . ')'}}
            </a>
            <?php setlocale(LC_TIME, 'lt_LT.ISO-8859-13'); ?>
            <i> {{ iconv("ISO-8859-13","utf-8",strftime("%Y %B %d (%H:%M)",strtotime($comment->created_at))) }} </i>
        </h6>
        <div class="comment-body " >
            {{ $comment->body }}


            @if(auth()->user() && (Auth::user()->role->name == "Administratorius" || Auth::user()->id == $comment->user_id) )

                <br>

                <form method="POST" action="/posts/{{ $comment->post_id }}/comments/{{ $comment->id }}">

                    {{ method_field('DELETE') }}

                    {{ csrf_field() }}

                    <div class="">

                        <button type="submit" class="btn btn-outline-danger" style="padding: .25rem .4rem;font-size: .875rem;line-height: .5;border-radius : .2rem;">
                            Trinti komentarą
                        </button>

                    </div>

                </form>


            @endif

        </div>
    </div>
    <!-- </div> -->
</li>