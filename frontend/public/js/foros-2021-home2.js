// tabs to change grid
$(document).ready(function(){
    $(".grid-square-tab").click(function(){
        $(".grid-rectangle-tab").removeClass("active");
        $(".grid-square-tab").addClass("active");
        $(".tab-content").find(".grid-square").addClass("d-block");
        $(".tab-content").find(".grid-square").removeClass("d-none");
        $(".tab-content").find(".grid-rectangle").removeClass("d-block");
        $(".tab-content").find(".grid-rectangle").addClass("d-none");
    });
    $(".grid-rectangle-tab").click(function(){
        $(".grid-square-tab").removeClass("active");
        $(".grid-rectangle-tab").addClass("active");
        $(".tab-content").find(".grid-rectangle").removeClass("d-none");
        $(".tab-content").find(".grid-rectangle").addClass("d-block");
        $(".tab-content").find(".grid-square").removeClass("d-block");
        $(".tab-content").find(".grid-square").addClass("d-none");
    });
});