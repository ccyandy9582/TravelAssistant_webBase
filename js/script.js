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
    function empty_input(e) {
        e.next().text("* This field is required.");
    }
    $("input[name='email']").on("keyup change",function() {
        if (!(/^.+@.+\..+$/.test($(this).val()+"")))
            $(this).next().text("* Email is not valid.");
        else 
            $(this).next().text("");
        if ($(this).val() == "") {
            empty_input($(this));
        }
    })
    $("input[name='password']").on("keyup change", function() {
        if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\|;:'",<.>\/?])(?=.{8,})/.test($(this).val()+""))) {
            alert(1);
        }
    })
    //[!@#$%^&*()~`\-_=+,<.>;:/?'"[{\]}\\\|]
})