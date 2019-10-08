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
        if (e.val() == "") {
            e.next().text("* This field is required.");
        }
    }
    $("input[name='email']").on("keyup change",function() {
        if (!(/^.+@.+\..+$/.test($(this).val()+"")))
            $(this).next().text("* Email is not valid.");
        else 
            $(this).next().text("");
        empty_input($(this));
    })
    $("input[name='password']").on("keyup change", function() {
        if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\|;:'",<.>\/?])(?=.{8,})/.test($(this).val()+"")))
            $(this).next().text("* Please use 8 or more characters with a mix of uppercase and lowercase letters, numbers & symbols.");
        else
            $(this).next().text("");
        empty_input($(this));
    })
    $("input[name='c_password']").on("keyup change", function() {
        if(!($(this).val()==$(this).parent().find('input[name="password"]').val()))
            $(this).next().text("* Password does not match.");
        else
            $(this).next().text("");
        empty_input($(this));
    })
})