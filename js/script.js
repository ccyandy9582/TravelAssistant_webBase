$("document").ready(function() {
    var modal = document.getElementById("popout");
    var span = document.getElementById("popout_close");
    span.onclick = function() {
    // modal.style.display = "none";
    window.location.replace("login");
    }
    window.onclick = function(event) {
    if (event.target == modal) {
        // modal.style.display = "none";
        window.location.replace("login");
    }
    }
    $("#login_switch_btn").click(function() {
        if(!$("#login_switch").hasClass("cd")) {
            $("#login_switch").toggleClass("on").addClass("cd").css("animation-duration","0.75s");
            $("#login").toggleClass("on");
            setTimeout(function() {
                $("#login_switch").removeClass("cd")
            },750);
            $("#login_switch_btn span").each(function() {
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
        if(!(e.val()==e.parent().find('input[name="c_password"]').val())){
            e.parent().find('input[name="c_password"]').next().text("* Password does not match.");
            valid = false
        } else
            e.parent().find('input[name="c_password"]').next().text("");
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
    function check_lpw(e) {
        var valid = true;
        if(empty_input(e))
            valid = false;
        else
            e.next().text("");
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
    $("input[name='l_password']").on("keyup change", function() {
        check_lpw($(this));
    })
    $("#login_form").submit(function(e) {
        e.preventDefault();
        var error = false;
        if (!check_email($(this).find("input[name='email']")))
            error = true;
        if (!check_lpw($(this).find("input[name='l_password']")))
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
        if(!error)
            $("#load").load("register_process",$(this).serializeArray());
    })
    $("#recovery_form").submit(function(e) {
        e.preventDefault();
        var error = false;
        if (!check_email($(this).find("input[name='email']")))
            error = true;
        if(!error)
        $("#load").load("recovery_process",$(this).serializeArray());
    })
    $("#forgot_pw_btn").click(function() {
        if(!$("#login_switch").hasClass("cd")) {
            $("#forget_pw").addClass("on");
        }
    })
    $("#cancel_recovery").click(function() {
        $("#forget_pw").toggleClass("on");
    })
    $("#createPlanFrm").submit(function() {
        var country = $(this).find("select").eq(0).val();
        var number = $(this).find("input[type='number']").eq(0).val();
        var start = $(this).find("input[data='start']").eq(0).val();
        var end = $(this).find("input[data='end']").eq(0).val();
        var transport = $(this).find("input[type='checkbox']").eq(0).is(':checked');
        $("#load").load("gen_step1",{"country": country, "number": number, "start": start, "end": end , "transport": transport});
        return false;
    })
    var dt = new Date();
    var tmr = new Date(dt);
    tmr.setDate(tmr.getDate()+1);
    var time = tmr.getFullYear() + "-" + ("0"+(tmr.getMonth()+1)).slice(-2) + "-" + ("0"+(tmr.getDate())).slice(-2);
    $("#createPlanFrm").find("input[type='date']").each(function() {
        $(this).attr("min",time);
    })
    $(".logout").click(function() {
        $("#load").load("logout");
    })
})