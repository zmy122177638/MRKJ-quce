
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
    manName = document.querySelector(".input_2").value.trim();
    womanName = document.querySelector(".input_1").value.trim();
    if(womanName === ''){
        layer.open({content: '请输入女生姓名',skin: 'msg',time: 2});
        return;
    }else if(!/^[\u4e00-\u9fa5]+$/.test(womanName)){
        layer.open({content: '请输入女生中文姓名',skin: 'msg',time: 2});
        return;
    }
    if(manName === ''){
        layer.open({content: '请输入男生姓名',skin: 'msg',time: 2});
        return;
    }else if(!/^[\u4e00-\u9fa5]+$/.test(manName)){
        layer.open({content: '请输入男生中文姓名',skin: 'msg',time: 2});
        return;
    }
    $('.nav_body').hide();
    //显示等待界面
    $(".loadingBox").show();
    //发送ajax请求
    ajaxDataEvent();
    
}
// 异步回调
function callback(){
    $('.nmpd_container').hide();
    $('.result').show();
    $('.result_container').show();
    $("body").css('backgroundColor','#FFE3E9');
    // 画图
    playhtml2Canvas()
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
    $('.input_1').val('');
    $('.input_2').val('');
    $('.result').hide();
    $('.nmpd_container').show();
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



