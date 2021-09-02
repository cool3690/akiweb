//右側消息_消息列：滑鼠移至消息列背景顏色綠色
$(document).ready(function(){	
    $(".news_div2").hover(function(){	
        $(this).toggleClass('main');
    });
	
    $(".news_div3").hover(function(){	
        $(this).toggleClass('main');
    });

    $(".news_div4").hover(function(){	
        $(this).toggleClass('main');
    });
	
    $(".news_div5").hover(function(){	
        $(this).toggleClass('main');
    });
});

//右側消息_消息列：滑鼠移至消息列背景顏色綠色
$(document).ready(function(){	
    $(".card-body").hover(function(){	
        $(this).css({"color": "#000000"});
        $("#p1_ds").toggleClass('main2');
    });
	
});

//右側消息_消息列：文字白色、對應的圖片透明度0.5
$(document).ready(function(){
    $(".news_div2").hover(function(){
        $(this).css({"color": "#EFEFEF"});
        $("#date2").css("color", "#EFEFEF");
        $("#new_img2").css("opacity", "0.5");
        }, function(){
        $(this).css({"color": "#000000"});
        $("#date2").css("color", "#808080");
        $("#new_img2").css("opacity", "1");
    });

    $(".news_div3").hover(function(){
        $(this).css({"color": "#EFEFEF"});
        $("#date3").css("color", "#EFEFEF");
        $("#new_img3").css("opacity", "0.5");
        }, function(){
        $(this).css({"color": "#000000"});
        $("#date3").css("color", "#808080");
        $("#new_img3").css("opacity", "1");
    });

    $(".news_div4").hover(function(){
        $(this).css({"color": "#EFEFEF"});
        $("#date4").css("color", "#EFEFEF");
        $("#new_img4").css("opacity", "0.5");
        }, function(){
        $(this).css({"color": "#000000"});
        $("#date4").css("color", "#808080");
        $("#new_img4").css("opacity", "1");
    });
	
    $(".news_div5").hover(function(){
        $(this).css({"color": "#EFEFEF"});
        $("#date5").css("color", "#EFEFEF");
        $("#new_img5").css("opacity", "0.5");
        }, function(){
        $(this).css({"color": "#000000"});
        $("#date5").css("color", "#808080");
        $("#new_img5").css("opacity", "1");
    });

});


//右側消息_圖片：滑鼠移至圖片背景顏色綠色
$(document).ready(function(){
    $("#new_img2").hover(function(){	
        $(".news_div2").toggleClass('main');
    });
	
    $("#new_img3").hover(function(){	
        $(".news_div3").toggleClass('main');
    });
	
    $("#new_img4").hover(function(){	
        $(".news_div4").toggleClass('main');
    });
	
    $("#new_img5").hover(function(){	
        $(".news_div5").toggleClass('main');
    });
	
});

//右側消息_圖片：文字白色、對應的圖片透明度0.5
$(document).ready(function(){
    $("#new_img2").hover(function(){
        $(".news_div2").css({"color": "#EFEFEF"});
        $("#date2").css("color", "#EFEFEF");
        $(this).css("opacity", "0.5");
        }, function(){
        $(".news_div2").css({"background-color": "#EFEFEF", "color": "#000000"});
        $("#date2").css("color", "#808080");
        $(this).css("opacity", "1");
    });

    $("#new_img3").hover(function(){
        $(".news_div3").css({"color": "#EFEFEF"});
        $("#date3").css("color", "#EFEFEF");
        $(this).css("opacity", "0.5");
        }, function(){
        $(".news_div3").css({"background-color": "#EFEFEF", "color": "#000000"});
        $("#date3").css("color", "#808080");
        $(this).css("opacity", "1");
    });

    $("#new_img4").hover(function(){
        $(".news_div4").css({"color": "#EFEFEF"});
        $("#date4").css("color", "#EFEFEF");
        $(this).css("opacity", "0.5");
        }, function(){
        $(".news_div4").css({"color": "#000000"});
        $("#date4").css("color", "#808080");
        $(this).css("opacity", "1");
    });
	
    $("#new_img5").hover(function(){
        $(".news_div5").css({"color": "#EFEFEF"});
        $("#date5").css("color", "#EFEFEF");
        $(this).css("opacity", "0.5");
        }, function(){
        $(".news_div5").css({"background-color": "#EFEFEF", "color": "#000000"});
        $("#date5").css("color", "#808080");
        $(this).css("opacity", "1");
    });

});

// cs1左側選單item顏色
$(document).ready(function(){
    $("#list_in_p1").hover(function(){
        $(this).css("color", "#26D07C");
        }, function(){
        $(this).css("color", "#9d9d9d");
    });
});

$(document).ready(function(){
    $("#list_in_p2").hover(function(){
        $(this).css("color", "#26D07C");
        }, function(){
        $(this).css("color", "#9d9d9d");
    });
});

$(document).ready(function(){
    $("#list_in_p3").hover(function(){
        $(this).css("color", "#26D07C");
        }, function(){
        $(this).css("color", "#9d9d9d");
    });
});

$(document).ready(function() {
    $( ".cs1" ).click( function() {
        $("#icon").toggleClass('flip');
    });
});	

$(document).ready(function(){
    $("#premixed_button1").click(function(){ 
		$("#premixed_button1").css("background-color", "#26D07C");
		$("#premixed_button2").css("background-color", "#006A28");
		$("#premixed_button3").css("background-color", "#006A28");
        $("#table1").show();
        $("#table2").hide();
        $("#table3").hide();
    });
    $("#premixed_button2").click(function(){
		$("#premixed_button1").css("background-color", "#006A28");
		$("#premixed_button2").css("background-color", "#26D07C");
		$("#premixed_button3").css("background-color", "#006A28");
        $("#table1").hide();
        $("#table2").show();
        $("#table3").hide();
    });
    $("#premixed_button3").click(function(){
		$("#premixed_button1").css("background-color", "#006A28");
		$("#premixed_button2").css("background-color", "#006A28");
		$("#premixed_button3").css("background-color", "#26D07C");
        $("#table1").hide();
        $("#table2").hide();
        $("#table3").show();
    });
});

