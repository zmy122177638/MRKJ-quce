
var manName = null;
var womanName = null;
var oldManName = null;
var oldWomanName = null;
var result_main = "60%";
var result_sub= "一见钟情";
var textinfo = "情路多波折，成日与爱人分分合合，有时还可能发生三角关系，害周遭朋友为你担心。";

document.querySelector(".startBtn").onclick = onStartHandle;
document.querySelector('.again').onclick = onPlayAgainHandle;
document.getElementsByClassName('show')[0].onclick = playCartoonHand;

function onStartHandle(){
    myName = document.querySelector(".myInput").value.trim();
    heName = document.querySelector(".hisInput").value.trim();
    if(myName === ''){
        layer.open({
            content:'请输入自己的姓名',
            skin:'msg',
            time:2
        })
        return;
    }
    if(heName === ''){
        layer.open({
            content:'请输入TA的姓名',
            skin:'msg',
            time:2
        })
        return;
    }
    if(!/^[\u4e00-\u9fa5]+$/.test(myName)){
        layer.open({
            content:'请输入中文姓名',
            skin:'msg',
            time:2
        })
        return;
    }else if(!/^[\u4e00-\u9fa5]+$/.test(heName)){
        layer.open({
            content:'请输入中文姓名',
            skin:'msg',
            time:2
        })
        return;
    }
      
    $('.namenum_container').hide();
    $('.nav_body').hide();
    $(window).scrollTop(0);
    $('.result').show();
    $('.result_container').show();
    //显示等待界面
    $(".loadingBox").show();
    //发送ajax请求
    ajaxDataEvent(playhtml2Canvas);
    
}

// 调用Html2Canvas
function playhtml2Canvas(){
    var width = document.querySelector('.result_container').clientWidth;
    var height = document.querySelector('.result_container').clientHeight;
    console.log(width,height)
    var scaleBy = 2; 
    var canvas = document.createElement("canvas");
    canvas.width = width * scaleBy;
    canvas.height = height * scaleBy;
    var context = canvas.getContext("2d");
    context.scale(scaleBy, scaleBy);
    html2canvas($('.result_container'), {
        allowTaint: false,
        taintTest: true,
        useCORS:true,
        canvas: canvas,
        onrendered: function(canvas) {
            canvas.id = "mycanvas";
            // document.body.appendChild(canvas);
            // 生成base64图片数据
            var dataUrl = canvas.toDataURL('image/png');
            document.querySelector('.result_img').src=dataUrl;
            $('.loadingBox').hide()
            $('.result_container').hide();
            $('.result_img_container').show();
            playCartoonHand();
        },
    }); 
}

function onPlayAgainHandle(){
    $('.myInput').val('');
    $('.hisInput').val('');
    $('.result').hide();
    $('.namenum_container').show();
    $('.nav_body').show();
    $("body").css('backgroundColor','#ffffff');
    $(".loadingBox").hide();
    stopPlayHandCartoon();
}


var cartoonFlag = 0;
var isHandCartoonPlay = false;
var playCartoonHandTimer1;
var playCartoonHandTimer2;
function playCartoonHand() {
    if(isHandCartoonPlay){
        return false;
    }
    isHandCartoonPlay = true;
    var oCartoonPages = document.getElementsByClassName('zwfy-report-cartoon');
    var box = document.getElementsByClassName('zwfy-report-cartoonBox')[0];
    box.style.display = 'block';
    playCartoonHandTimer1 = setInterval(function(){
        for (var i = 0; i < oCartoonPages.length; i++) {
            oCartoonPages[i].setAttribute("class", "zwfy-report-cartoon");
        }
        oCartoonPages[cartoonFlag].setAttribute("class", "zwfy-report-cartoon zwfy-report-cartoon-active");
        cartoonFlag++;
        if (cartoonFlag == 3) {
            cartoonFlag = 0;
        }
    },200)
    playCartoonHandTimer2 = setTimeout(function(){
        clearInterval(playCartoonHandTimer1);
        playCartoonHandTimer = null;
        stopPlayHandCartoon();
        isHandCartoonPlay = false;
    },5000)
}

function stopPlayHandCartoon(){
    isHandCartoonPlay = false;

    clearInterval(playCartoonHandTimer1);
    playCartoonHandTimer1 = null;

    clearTimeout(playCartoonHandTimer2);
    playCartoonHandTimer2 = null;

    var box = document.getElementsByClassName('zwfy-report-cartoonBox')[0];
    box.style.display = 'none';
}
