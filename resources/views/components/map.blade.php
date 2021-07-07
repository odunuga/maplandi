<div class="map-section">
    <div class="map-container">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="500" id="gmap_canvas"
                        src="{{ $src }}"  style="border:0;" allowfullscreen="" loading="lazy" frameborder="0"
                        scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 500px;
                        width: 100%;
                    }

                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 500px;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
