<?php
echo '</div></div></div>';
echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>';
echo '<script>
  $(document).ready(function() {
    $(".search-child").hide();
    $(".toggle-more-less").click(function() {
        $(this).closest(".search-parent").find(".search-child").toggle();
     
        //$(this).closest("figcaption").toggleClass("show");
        //thought this would work
    });
});
</script>';
echo '</body>';
echo '</html>';