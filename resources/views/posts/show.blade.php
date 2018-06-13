@extends ('layout')

@section('content')


    <div class="col-sm-8 blog-main">

        <h1>
            {{ $post->title }}
        </h1>

        @if(count($post->tags))
            <div>
                <small>
                    Žymės:
                    @foreach($post->tags as $tag)
                        #<a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>
                    @endforeach
                </small>
            </div>
        @endif

        <h5>
            <a href="/?post-type={{ $post->postType->name }}">{{ $post->postType->name }}</a> | <a href="/posts/categories/{{ $post->category['name'] }}">{{ $post->category['name']}}</a>
        </h5>

        <hr>

        <img class="img-thumbnail" src="{{ asset('storage/'.$post->mainImage->filename) }}" width="100%" />

        <small class="text-muted">Skelbia: <a href="/user/{{ $post->user->nickname }}">{{ $post->user->nickname }}</a></small>
        <hr>

        <h4>Aprašymas</h4>
        <div>
            {{ $post->body }}
        </div>

        <hr>


        <div class="row">

            <div class="col">
                @if($post->forSale == true)
                    <h5 style="color:green">Parduodamas</h5>
                @else
                    <h5 style="color:orangered">Neparduodamas</h5>
                @endif

            </div>

            <div class="col">

                <?php setlocale(LC_MONETARY, 'lt_LT');   ?>
                Kaina: {{  number_format($post->price, 2, ',', '.') }}€

            </div>

        </div>

        <hr>

        <div>

            Reitingas:
            <?php  /* var_dump($weed = $post->userUpVotes->pluck('total','upvote')->toArray())*/?>
            {{ $post->userVotes->count() }}

        </div>

        <div class="row">
            <div class="col">

                @if( empty($userVote) || $userVote->upvote == 0)
                    <form method="POST" action="/posts/{{ $post->id }}/upvote">

                        {{ csrf_field() }}

                        <div class="form-group">

                            <input type="hidden" id="vote" name="vote" value="1">

                            <button type="submit" class="btn btn-outline-success">Patinka</button>

                        </div>

                    </form>

                @else
                    <form method="POST" action="/posts/{{ $post->id }}/downvote">

                        {{ csrf_field() }}

                        <div class="form-group">

                            <input type="hidden" id="vote" name="vote" value="0">

                            <button type="submit" class="btn btn-outline-danger">Nepatinka</button>

                        </div>

                    </form>
                @endif

            </div>

            <div class="col ml-auto">
                @if( empty($userSaved) || $userSaved == false)


                    <form method="POST" action="/user/{{ $post->id }}/saved">

                        {{ csrf_field() }}

                        <div class="form-group">

                            <button type="submit" class="btn btn-outline-info">Išsisaugoti</button>

                        </div>

                    </form>


                @else

                    <form method="POST" action="/user/{{ $post->id }}/saved">

                        {{ method_field('DELETE') }}

                        {{ csrf_field() }}

                        <div class="form-group">

                            <button type="submit" class="btn btn-outline-warning">Pamiršti</button>

                        </div>

                    </form>

                @endif
            </div>

        </div>

        <hr>


        <ul class="list-group">
            <div class="comments" style="word-wrap: break-word;" id="comments">
                <h3 class="mb-2">Komentarai</h3>
                @foreach($post->comments as $comment)
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
                            </div>
                        </div>
                        <!-- </div> -->
                    </li>
                @endforeach
            </div>
        </ul>

        <hr>






        <div class="">

            <div class="card-block">

                <form method="POST" action="/posts/{{ $post->id }}/comments">

                    {{ csrf_field() }}


                    <div class="form-group">

                        <textarea name="body" placeholder="Jūsų mintys..." class="form-control"></textarea>

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Komentuoti</button>

                    </div>


                </form>

                @include('layouts.errors')

            </div>

        </div>


        <hr>



    </div>
@endsection