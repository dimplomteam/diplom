/**
 * Created by sergey on 21.01.15.
 */
function rankingTriggerSend(postid,rank){
    $.ajax({
        type: "POST",
        url: "/ajax/ranking",
        data: { postid: postid, rank: rank },
        success: function(data){
            console.log(data);
        }
    });
//.done(function( html ) {        $( "#results" ).append( html );    });
}

function rankingTriggerUp(el){

    var rankingWidget=el.closest(".rating");
    var curvalue=parseInt(rankingWidget.data("curvalue"));
    var postid=rankingWidget.data("postid");
    var trigger_up=rankingWidget.find(".up");
    var trigger_down=rankingWidget.find(".down");
    var count_label=rankingWidget.find(".label");
    var changing=0;
    var rank=parseInt(count_label.html());

    if(rankingWidget.hasClass("up")){
        return false;
    }

   // console.log(rankingWidget);

    if(curvalue=="-1"){
        changing=2;
        rankingWidget.removeClass("dowm");
    }else if(curvalue=="0"){
        changing=1;
        rankingWidget.addClass("up");
        rankingWidget.removeClass("down");
    }else{
        changing=0;
        rankingWidget.addClass("up");
        return false;
    }
    console.log(changing);


    rankingWidget.data("curvalue",curvalue+changing);
    rank=rank+changing;
    count_label.html(rank);
    rankingTriggerSend(postid,curvalue+changing);
}

function rankingTriggerDown(el){

    var rankingWidget=el.closest(".rating");
    var curvalue=parseInt(rankingWidget.data("curvalue"));
    var postid=rankingWidget.data("postid");
    var trigger_up=rankingWidget.find(".up");
    var trigger_down=rankingWidget.find(".down");
    var count_label=rankingWidget.find(".label");
    var changing=0;
    var rank=parseInt(count_label.html());

    if(rankingWidget.hasClass("down")){
        return false;
    }

    if(curvalue=="1"){
        changing=-2;
        rankingWidget.removeClass("up");
    }else if(curvalue=="0"){
        changing=-1;
        rankingWidget.addClass("down");
        rankingWidget.removeClass("up");
    }else{
        changing=0;
        rankingWidget.addClass("down");
        return false;
    }

    rankingWidget.data("curvalue",curvalue+changing);
    rank=rank+changing;
    count_label.html(rank);
    rankingTriggerSend(postid,curvalue+changing);
}




$(document).ready(function() {
    rankingWidgets=$('.rating[data-allowvote="1"]');

    for(var i=0; i<rankingWidgets.length;i++){
        var rankingWidget=rankingWidgets.eq(i);
        //console.log(rankingWidget);
        rankingWidget.find(".up").click(function(){
            rankingTriggerUp($(this));
        });
        rankingWidget.find(".down").click(function(){
            rankingTriggerDown($(this));
        });

    }

});
