@extends('layout')

@section('content')
<div class="col-sm-8 blog-main">
    <div ><!--class="row justify-content-center" -->
        <div> <!-- class="col-md-8" -->
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Sveiki prisijungę!
                </div>

                <hr>



                <div class="card-header">Vartotojo informacija</div>

                <div class="card-body">

                    Rolė: {{ Auth::User()->role->name  }}<br>
                    E-paštas: {{ Auth::User()->email }}<br>
                    Vardas: {{ Auth::User()->name }}<br>
                    Pavardė: {{ Auth::User()->surname }}<br>
                    Slapyvardis: {{ Auth::User()->nickname }}<br>
                    Aprašymas: {{ Auth::User()->description }}<br>
                    Kontaktinė informacija: {{ Auth::User()->contacts }}<br>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
