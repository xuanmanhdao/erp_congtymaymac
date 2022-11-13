$(document).ready(function () {
    $('[data-click=changModalTab]').on("click", function (e) {
        var label = $(this).data("label");
        $('.tab-content').removeClass("tab-active");
        $('[data-label=tab-' + label + ']').addClass("tab-active");

        $('.modal-tab .tab').removeClass("active");
        $(this).addClass("active");
    });

    $('[data-click=changModalTab]').on("click", function (e) {
        var label = $(this).data("label");
        $('.tab-content').removeClass("tab-active");
        $('[data-label=tab-' + label + ']').addClass("tab-active");

        $('.modal-tab .tab').removeClass("active");
        $(this).addClass("active");
    });
});

// Click add class active for nav-item
// Cách 1: fail
/* var lis = document.getElementsByClassName("nav-items");
console.log(lis.length);
for (var i = 0; i < lis.length; i++) {
  lis[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("nav-active");
  current[0].className = current[0].className.replace(" nav-active", "");
  this.className += " nav-active";
  });
}
 */
// Cách 2:
var currentLocation = location.href;
var menuItem=document.querySelectorAll('a');
var menuLength = menuItem.length;
for (let i = 0; i < menuLength; i++) {
    if (menuItem[i].href === currentLocation) {
        menuItem[i].className = "active";
    }
}
console.log(currentLocation);



