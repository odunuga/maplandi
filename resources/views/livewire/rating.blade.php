<ul class="rating {{ isset($class)?$class:'' }}">
    <li>
        <div id="rate{{ $item->id }}" class="rateit"
             data-rateit-resetable="false"
        ></div>
    </li>
    <li><a id="ratingCounter{{$item->id}}"
           href="javascript:void(0)">({{ $item->averageRating(App\Models\User::class) }})</a></li>
</ul>
<script>
    $(document).ready(function () {
        @auth()
        $('.rateit').rateit('{{ $item->averageRating(App\Models\User::class)  }}');
        @else

        $('.rateit').rateit();
        @endauth
    })
</script>
