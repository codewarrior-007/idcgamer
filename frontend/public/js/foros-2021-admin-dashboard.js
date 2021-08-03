$("body").on("click",".edit-role-button",function(){
    $(this).closest("td").find(".edit-role").removeClass("d-none");
    $(this).closest("td").find(".edit-role").addClass("d-flex");
    $(this).closest("td").find(".edit-role-button-container").removeClass("d-flex");
    $(this).closest("td").find(".edit-role-button-container").addClass("d-none");
});

$("body").on("click",".btn-close",function(){
    $(this).closest("td").find(".edit-role").removeClass("d-flex");
    $(this).closest("td").find(".edit-role").addClass("d-none");
    $(this).closest("td").find(".edit-role-button-container").removeClass("d-none");
    $(this).closest("td").find(".edit-role-button-container").addClass("d-flex");
});