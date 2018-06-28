@extends ('layout')

@section('content')


    <div class="col-sm-9 blog-main">

        <div class="blog-post">


        @if(count($posts))

            <!--
                <h4>Skelbimų skaičius: {{ count($posts) }}</h4>
                <hr>
-->
                <div class="album py-0 bg-light">
                    <!-- <div class="container"> -->

                    <div class="row">


                        @if(auth()->user() && Auth::user()->role->name == "Administratorius")

                                @foreach($posts as $post)
                                    @include('posts.post')
                                @endforeach

                        @else

                            @foreach($posts as $post)
                                @if($post->disabled == false)
                                    @include('posts.post')
                                @endif()
                            @endforeach

                        @endif


                    </div>
                    <!-- </div> -->
                </div>

                <hr>
                {{ $posts->links() }}

            @else

                <h3>Skelbimų nerasta</h3>

            @endif

        </div>

        <hr>

    </div><!-- /.blog-main -->



@endsection


