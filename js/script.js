$("document").ready(function() {
    $(".login_switch_btn").click(function() {
        if(!$("#login_switch").hasClass("cd")) {
            $("#login_switch").toggleClass("on").addClass("cd").css("animation-duration","0.75s");
            $("#login").toggleClass("on");
            setTimeout(function() {
                $("#login_switch").removeClass("cd")
            },750);
            $(".login_switch_btn span").each(function() {
                $(this).toggleClass("hidden");
            })
            setTimeout(function() {
                $("#login form").each(function() {
                    $(this).toggleClass("hidden");
                })
            },375);
        }
    })
})