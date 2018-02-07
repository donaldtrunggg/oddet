<script type="text/javascript" src="{{ asset("js/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/responsiveCarousel.min.js") }}"></script>
<script>
    $(function(){
        $('.crsl-items').carousel({
            visible: 3,
            itemMinWidth: 180,
            itemEqualHeight: 370,
            itemMargin: 9
        });

        $("a[href=#]").on('click', function(e) {
            e.preventDefault();
        });
    });
</script>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex-1].style.display = "block";
    }
</script>