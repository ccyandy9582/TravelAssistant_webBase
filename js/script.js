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
            return true;
        }
        return false;
    }
    function check_email(e) {
        var valid = true;
        if (!(/^.+@.+\..+$/.test(e.val()+""))) {
            e.next().text("* Email is not valid.");
            valid = false;
        } else 
            e.next().text("");
        if(empty_input(e)) 
            valid = false;
        return valid;
    }
    function check_pw(e) {
        var valid = true;
        if(!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()-_=+`~[{\]}\\|;:'",<.>\/?])(?=.{8,})/.test(e.val()+""))) {
            e.next().text("* Please use 8 or more characters with a mix of uppercase and lowercase letters, numbers & symbols.");
            valid = false;
        } else
            e.next().text("");
        if(empty_input(e))
            valid = false;
        return valid;
    }
    function check_cpw(e) {
        var valid = true;
        if(!(e.val()==e.parent().find('input[name="password"]').val())){
            e.next().text("* Password does not match.");
            valid = false
        } else
            e.next().text("");
        if(empty_input(e))
            valid = false;
        return valid;
    }
    $("input[name='email']").on("keyup change",function() {
        check_email($(this));
    })
    $("input[name='password']").on("keyup change", function() {
        check_pw($(this));
    })
    $("input[name='c_password']").on("keyup change", function() {
        check_cpw($(this));
    })
    $("#login_form").submit(function(e) {
        e.preventDefault();
        var error = false;
        if (!check_email($(this).find("input[name='email']")))
            error = true;
        if (!check_pw($(this).find("input[name='password']")))
            error = true;
        if(!error)
            $("#load").load("login_process",$(this).serializeArray());
    })
    $("#reg_form").submit(function(e) {
        e.preventDefault();
        var error = false;
        if (!check_email($(this).find("input[name='email']")))
            error = true;
        if (!check_pw($(this).find("input[name='password']")))
            error = true;
        if (!check_pw($(this).find("input[name='c_password']")))
            error = true;
        if(!error || error  )
            $("#load").load("register_process",$(this).serializeArray());
    })
})