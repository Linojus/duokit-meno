@extends('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <div ><!--class="row justify-content-center" -->
            <div> <!-- class="col-md-8" -->
                <div class="card">

                    <div class="card-header">Vartotojo informacija</div>

                    <div class="card-body">

                        @if($user)
                            Rolė: {{ $user->role->name  }}<br>
                            Vardas: {{ $user->name }}<br>
                            Pavardė: {{ $user->surname }}<br>
                            Slapyvardis: {{ $user->nickname }}<br>
                            Aprašymas: {{ $user->description }}<br>
                            Kontaktinė informacija: {{ $user->contacts }}<br>
                        @else
                            Vartotojas nerastas
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
