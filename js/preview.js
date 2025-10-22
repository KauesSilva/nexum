$(document).ready(function () {
    $(".desktop-view").click(function () {
        $(".desktop-view .bi-display").addClass("active");
        $(".mobile-view .bi-phone").removeClass("active");
        $(".tablet-view .bi-tablet").removeClass("active");
        $(".content").removeClass("mobile");
        $(".content").removeClass("tablet");
    });
});

$(document).ready(function () {
    $(".mobile-view").click(function () {
        $(".mobile-view .bi-phone").addClass("active");
        $(".desktop-view .bi-display").removeClass("active");
        $(".tablet-view .bi-tablet").removeClass("active");
        $(".content").removeClass("tablet");
        $(".content").addClass("mobile");
    });
});

$(document).ready(function () {
    $(".tablet-view").click(function () {
        $(".tablet-view .bi-tablet").addClass("active");
        $(".desktop-view .bi-display").removeClass("active");
        $(".mobile-view .bi-phone").removeClass("active");
        $(".content").removeClass("mobile");
        $(".content").addClass("tablet");
    });
});