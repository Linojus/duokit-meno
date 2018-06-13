@extends('layout')

@section('content')
    <div class="col-sm-9 blog-main">
        <div class="blog-post" ><!--class="row justify-content-center" -->
            <div> <!-- class="col-md-8" -->
                <div class="card">

                    <div class="card-header">Vartotojo informacija</div>

                    <div class="card-body">

                        @if($user)
                            <div class="row">
                                <div class="col"> <strong>Rolė:</strong> </div>
                                <div class="col"> {{ $user->role->name  }} </div>
                            </div>

                            <div class="row">
                                <div class="col"><strong>Vardas:</strong> </div>
                                <div class="col"> {{ $user->name }} </div>
                            </div>

                            <div class="row">
                                <div class="col"> <strong>Pavardė:</strong> </div>
                                <div class="col"> {{ $user->surname }} </div>
                            </div>

                            <div class="row">
                                <div class="col"> <strong>Slapyvardis:</strong> </div>
                                <div class="col"> {{ $user->nickname }} </div>
                            </div>

                            <div class="row">
                                <div class="col"> <strong>Aprašymas:</strong> </div>
                                <div class="col"> {{ $user->description }} </div>
                            </div>

                            <div class="row">
                                <div class="col"> <strong>Kontaktinė informacija:</strong> </div>
                                <div class="col"> {{ $user->contacts }} </div>
                            </div>

                        @else
                            Vartotojas nerastas
                        @endif

                    </div>

                </div>
            </div>
        </div>



        <div class="blog-post">

            @if(count($posts))

                <hr>

                <div class="album py-0 bg-light">
                    <!-- <div class="container"> -->

                    <div class="row">

                        @foreach($posts as $post)
                            @include('posts.post')
                        @endforeach

                    </div>
                    <!-- </div> -->
                </div>

                <hr>
                {{ $posts->links() }}

            @else

                <h3>Vartotojas skelbimų neturi</h3>

            @endif

        </div>





    </div>
@endsection
