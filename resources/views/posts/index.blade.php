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

                        @foreach($posts as $post)
                            @if($post->disabled == false)
                                @include('posts.post')
                            @endif()
                        @endforeach

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


