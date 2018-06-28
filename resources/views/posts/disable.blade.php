

@if(auth()->user())

    @if (Auth::user()->role->name == "Administratorius")

        @if($post->disabled == true)

            <form method="POST" action="/posts/{{ $post->id }}/enable">

                {{ csrf_field() }}

                <div class="form-group">

                    <button type="submit" class="btn btn-success">Rodyti skelbimą</button>

                </div>

            </form>

        @else

            <form method="POST" action="/posts/{{ $post->id }}/disable">

                {{ csrf_field() }}

                <div class="form-group">

                    <button type="submit" class="btn btn-danger">Paslėpti skelbimą</button>

                </div>

            </form>

        @endif

    @endif

@endif