<script>
// You can also use "$(window).load(function() {"
    $(function () {

        // Slideshow 1
        $("#slider1").responsiveSlides({
            maxwidth: 1600,
            speed: 600
        });
    });
</script>

<!--start-image-slider---->
<div class="image-slider">
    <!-- Slideshow 1 -->
    <ul class="rslides" id="slider1">
        <li><img src="{{ asset('images/bckground.jpg') }}" alt=""></li>
        <li><img src="{{ asset('images/bckground2.jpg') }}" alt=""></li>
        <li><img src="{{ asset('images/bckground.jpg') }}" alt=""></li>
    </ul>
        <!-- Slideshow 2 -->
</div>
<!--End-image-slider---->
