<div class="col-sm-3 blog-sidebar">

    <div class="sidebar-module">
        <h4>Skelbimai pagal tipą</h4>
        <ol class="list-unstyled">
            @foreach($navPostTypes as $navPostType)

                <li>
                    <a href="/?post-type={{ $navPostType['name'] }}">
                        {{ $navPostType['name'] }}
                    </a>
                </li>

            @endforeach

        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Skelbimai pagal kategoriją</h4>
        <ol class="list-unstyled">

<?php //dd($navCategories) ?>
            @foreach($navCategories as $navCategory)

                <li>
                    <a href="/?category={{ $navCategory['name'] }}">
                        {{ $navCategory['name'] }}
                    </a>
                </li>

            @endforeach

        </ol>
    </div>



    <div class="sidebar-module">
        <h4>Skelbimai pagal mėnesį</h4>
        <ol class="list-unstyled">

            @foreach($archives as $stats)

                <li>
                    <a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                        <?php
                        //setlocale(LC_TIME, config('app.locale'));
                        //Carbon\Carbon::setUtf8(true);
                        ?>
                        {{ iconv("ISO-8859-13","utf-8",strftime("%B %Y",strtotime($stats['month'] . ' ' . $stats['year']))) }}
                    </a>
                </li>

            @endforeach

        </ol>
    </div>


    <div class="sidebar-module">
        <h4>Žymės</h4>
        <ol class="list-unstyled">

            @foreach($tags as $tag)

                    <a href="/posts/tags/{{ $tag }}">
                        #{{ $tag }}
                    </a>

            @endforeach

        </ol>
    </div>


<!--
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
-->
    <!--
    <div class="sidebar-module">
        <h4>Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
-->

</div><!-- /.blog-sidebar -->