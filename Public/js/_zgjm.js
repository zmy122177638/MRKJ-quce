
document.querySelector('.again').onclick = onPlayAgainHandle;
document.querySelector('.show').onclick = playCartoonHand;


function onStartHandle(jmData){
    $(".loadingBox").show();
    $('.jm_container').hide();
    $('.nav_body').hide();
    ajaxDataEvent(jmData);
    $('.result').show();
    $('.result_container').show();
    //发送ajax请求
    playhtml2Canvas();
    //显示等待界面
}

function ajaxDataEvent(jmData){
    $('.result_wrap_cc').html('');
    $('.result_wrap_t').text(jmData.name);
    jmData.text.forEach(function(item){
        $('.result_wrap_cc').append(`<p>${item}</p>`)
    });
    if(jmData.text.length <= 1){$(".result_wrap_cc p").css({"borderBottom":'none','paddingBottom':'0'})}
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
            $('.result_container').hide();
            $(".loadingBox").hide();
            $('.result_img_container').show();
            if(iswx == 1){
                playCartoonHand();
            }
        },
    }); 
}

function onPlayAgainHandle(){
    $('.result').hide();
    $('.jm_container').show();
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
