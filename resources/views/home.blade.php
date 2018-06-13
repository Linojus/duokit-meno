@extends('layout')

@section('content')
    <div class="col-sm-9 blog-main">
        <div class="blog-post"><!--class="row justify-content-center" -->
            <div> <!-- class="col-md-8" -->
                <div class="card">
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3> Sveiki prisijungę! </h3>
                    </div>

                    <div class="card-header">Vartotojo informacija</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col"> <strong>Rolė:</strong> </div>
                            <div class="col"> {{ Auth::User()->role->name  }} </div>
                        </div>

                        <div class="row">
                            <div class="col"> <strong>E-paštas:</strong> </div>
                            <div class="col"> {{ Auth::User()->email  }} </div>
                        </div>

                        <div class="row">
                            <div class="col"><strong>Vardas:</strong> </div>
                            <div class="col"> {{ Auth::User()->name }} </div>
                        </div>

                        <div class="row">
                            <div class="col"> <strong>Pavardė:</strong> </div>
                            <div class="col"> {{ Auth::User()->surname }} </div>
                        </div>

                        <div class="row">
                            <div class="col"> <strong>Slapyvardis:</strong> </div>
                            <div class="col"> {{ Auth::User()->nickname }} </div>
                        </div>

                        <div class="row">
                            <div class="col"> <strong>Aprašymas:</strong> </div>
                            <div class="col"> {{ Auth::User()->description }} </div>
                        </div>

                        <div class="row">
                            <div class="col"> <strong>Kontaktinė informacija:</strong> </div>
                            <div class="col"> {{ Auth::User()->contacts }} </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>



        <div class="blog-post">

            @if(count($posts))

                <h4>Mano skelbimai ({{ count($posts) }}): </h4>
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

                <h3>Jūs skelbimų neturite</h3>

            @endif


        </div>
    </div>
@endsection
