<ul class="rating {{ isset($class)?$class:'' }}">
    <li>
        <div id="deal{{ $deal->id }}" class="rateit"
             data-rateit-resetable="false"
        ></div>
    </li>

    <li><a href="javascript:void(0)">({{ $deal->ratingsCount() }})</a></li>
</ul>
