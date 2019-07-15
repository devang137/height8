/* js  */
/* ---------------------- */
/*   Admin Setting Menu   */
/* ---------------------- */
window.addEventListener("load", function() {
    var tabs = document.querySelectorAll("ul.nav-tabs > li");

    for (i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", switchTab);
    }

    function switchTab(event) {
        event.preventDefault();

        document.querySelector("ul.nav-tabs li.active").classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove("active");

        var clickedTab = event.currentTarget;
        var anchor = event.target;
        var activePaneID = anchor.getAttribute("href");

        clickedTab.classList.add("active");
        document.querySelector(activePaneID).classList.add("active");

    }
});

/* -------------------------------- */
/*  Disable Right click & F12 Key   */
/* -------------------------------- */

    // window.oncontextmenu = function () {
    //             return false;
    // }
    // jQuery(document).keydown(function (event) {
    //     if (event.keyCode == 123) {
    //         return false;
    //     }
    //     else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
    //         return false;
    //     }
    // });
