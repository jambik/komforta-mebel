@if ($slides->count())
    <section id="slides">
        <div class="container">
            <div class="row">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @foreach ($slides as $key => $val)
                            <li data-target="#slider" data-slide-to="{{ $key }}"{!! $key == 0 ? ' class="active"' : '' !!}></li>
                        @endforeach
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach ($slides as $key => $val)
                            <div class="item{{ $key == 0 ? ' active' : '' }}">
                                <img src="/images/original/{{ $val->img_url . $val->image }}">
                                <div class="carousel-caption">
                                    {!! $val->title ? '<h2>' . $val->title . '</h2>' : '' !!}
                                    {!! $val->text ? '<p>' . $val->text . '</p>' : '' !!}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#slider" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif