$(document).ready(function () {
    $('[data-click=changModalTab]').on("click", function (e) {
        var label = $(this).data("label");
        $('.tab-content').removeClass("tab-active");
        $('[data-label=tab-'+ label +']').addClass("tab-active");

        $('.modal-tab .tab').removeClass("active");
        $(this).addClass("active");
    });
});