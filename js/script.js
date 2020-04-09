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
            $(".login_switch_msg").each(function() {
                $(this).toggleClass("hidden");
            })
            setTimeout(function() {
                $("#login form").each(function() {
                    $(this).toggleClass("hidden");
                })
            },375);
        }
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