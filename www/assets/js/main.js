/**
 * Created by sergey on 21.01.15.
 */
function rankingTriggerSend(postid,rank){
    $.ajax({
        type: "POST",
        url: "/ajax/ranking",
        data: { postid: postid, rank: rank }
    });
//.done(function( html ) {        $( "#results" ).append( html );    });
}

function rankingTriggerUp(el){
    if(el.hasClass("active")){
        return false;
    }

    var rankingWidget=el.closest(".ranking");
    var curvalue=rankingWidget.data("curvalue");
    var postid=rankingWidget.data("postid");
    var trigger_up=rankingWidget.find(".up");
    var trigger_down=rankingWidget.find(".down");
    var count_label=rankingWidget.find(".label");
    var changing=0;
    var rank=count_label.html();

    if(curvalue=="-1"){
        changing=2;
        trigger_down.removeClass("active");
    }else if(curvalue=="0"){
        changing=1;
        trigger_up.addClass("active");
        trigger_down.removeClass("active");
    }else{
        changing=0;
        trigger_up.addClass("active");
        return false;
    }

    rankingWidget.data("curvalue",curvalue+changing);
    rank=rank+changing;
    count_label.html(rank);
    rankingTriggerSend(postid,curvalue+changing);
}

function rankingTriggerDown(el){
    if(el.hasClass("active")){
        return false;
    }

    var rankingWidget=el.closest(".ranking");
    var curvalue=rankingWidget.data("curvalue");
    var postid=rankingWidget.data("postid");
    var trigger_up=rankingWidget.find(".up");
    var trigger_down=rankingWidget.find(".down");
    var count_label=rankingWidget.find(".label");
    var changing=0;
    var rank=count_label.html();

    if(curvalue=="1"){
        changing=-2;
        trigger_up.removeClass("active");
    }else if(curvalue=="0"){
        changing=-1;
        trigger_down.addClass("active");
        trigger_up.removeClass("active");
    }else{
        changing=0;
        trigger_down.addClass("active");
        return false;
    }

    rankingWidget.data("curvalue",curvalue+changing);
    rank=rank+changing;
    count_label.html(rank);
    rankingTriggerSend(postid,curvalue+changing);
}




$(document).ready(function() {
    rankingWidgets=$('.ranking[data-allowvote="1"]');

    for(var i=0; i<rankingWidgets.length;i++){
        var rankingWidget=rankingWidgets.eq(i);

        rankingWidget.find(".up").click(function(){
            rankingTriggerUp(this);
        });
        rankingWidget.find(".down").click(function(){
            rankingTriggerDown(this);
        });

    }

});
