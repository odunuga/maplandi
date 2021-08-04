<ul class="rating {{ isset($class)?$class:'' }}" >
    <li>
        <div id="deal{{ $item->id }}" class="rateit"
             data-rateit-resetable="false"
        ></div>
    </li>
    <li><a href="javascript:void(0)">({{ $item->ratingsCount() }})</a></li>
</ul>
