@extends ('layout')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Kurti naują skelbimą</h1>

        <hr>

        <form class="form" method="POST" action="/posts" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Pavadinimas:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="body">Aprašymas</label>
                <textarea id="body" name="body" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Skelbimo kategorija</label>
                <select class="form-control" id="category_id" name="category_id" required>

                    @foreach($categories as $categoryId => $category)

                        <option value="{{ $categoryId }}">{{ $category }}</option>

                    @endforeach

                </select>

            </div>


            <div class="form-group">
                <label for="type_id">Skelbimo tipas</label>
                <select class="form-control" id="type_id" name="type_id" required>

                    @foreach($postTypes as $postTypeId => $postType)

                        <option value="{{ $postTypeId }}">{{ $postType }}</option>

                    @endforeach

                </select>

            </div>


            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="forsale" name="forSale" value="true">
                <label class="form-check-label" for="forsale">Parduodamas</label>
            </div>

            <br>




            <div class="form-group">
                <div>
                    <label for="price">Kaina, €</label>
                    <input class="form-control" id="price" name="price" type="number" value="0" min="0" step="0.01"  required>
                </div>

            </div>



            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="mainImage" name="mainImage" required>
                    <label class="custom-file-label" for="mainImage">Pasirinkite paveikslėlį</label>
                </div>
            </div>


            <div class="form-group">
                <label for="tags">Žymės</label>
                <textarea id="tags" name="tags" class="form-control" placeholder="Žymės, atskirtos # simboliu"></textarea>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Skelbti</button>
            </div>



        </form>

        @include('layouts.errors')


    </div>
@endsection


