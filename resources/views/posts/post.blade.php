


<div class="col-md-6">
    <div class="card mb-4 box-shadow">

        <img class="card-img-top " src="{{ asset('storage/'.$post->mainImage->filename) }}" style="max-width:100%" alt="Paveikslėlis">

        <div class="card-body" style="padding: 0">

            <div class="card-header">
                <strong>{{ $post->title }}</strong>
            </div>

            <div class="card-body" >

                <div class="row">
                    <div class="col">
                        @if($post->forSale == true)
                            <span style="color:green">Parduodamas</span>
                        @else
                            <span style="color:orangered">Neparduodamas</span>
                        @endif
                    </div>

                    <div class="col">
                        Kaina: {{  number_format($post->price, 2, ',', '.') }}€
                    </div>
                </div>

            </div>

            <div class="card-footer" style="text-align: center">
                <div class="row">

                    <div class="col-md-auto">
                        <a href="/?post-type={{ $post->postType->name }}">{{ $post->postType->name }}</a> |

                        <a href="/posts/categories/{{ $post->category['name'] }}">{{ $post->category['name']}}</a>
                    </div>

                    <div class="col">
                        Reitingas: {{ $post->userVotes->count() }}
                    </div>


                </div>
            </div>


            <div class="card-body py-1">
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
            </div>


            <div class="card-body pt-1">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/posts/{{ $post->id }}">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Peržiūrėti</button>
                        </a>
                    </div>
                    <small class="text-muted"><a href="/user/{{ $post->user->nickname }}">{{ $post->user->nickname }}</a> | {{ iconv("ISO-8859-13","utf-8",strftime("%Y-%b-%d %H:%M",strtotime($post->created_at))) }}</small>
                </div>
            </div>
        </div>

    </div>
</div>