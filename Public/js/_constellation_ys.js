

// 开始分析
function startConstellationFX(nodeId){
    $('.index_container').hide();
    $('.result_img_container').hide();
    stopPlayHandCartoon();
    $('.result').show();
    $(nodeId).show();
    playhtml2Canvas(nodeId);
}

 // 选择星座
 $('.select_to').on('click',function(){
    var num = $(this).attr('data-constell');
    var ys_time = getToDayTime().todayTime;
    if($('.index_top').html() == "选择您要绑定的星座"){
        //询问框
        layer.open({
            content: `你要绑定的是${xzdata[num].xz_name}座`
            ,shade: "background-color: rgba(0,0,0,.3)" 
            ,style:""
            ,btn: ['确认', '重新选择']
            ,yes: function(index){
                layer.close(index);
                userxz = xzdata[num]; //绑定星座
                // 绑定星座今日运势
                AjaxEvent(xzType,userxz,ys_time);
            }
        });
    }else{
        // 别的星座今日运势
        AjaxEvent('today',xzdata[num],ys_time);
    }  
})
// 更换星座
$('.setconstell').on('click',function(){
    $('.result').hide();
    $('.index_container').show();
    $('.replacexz_container').show();
    $('.index_top').text('选择您要查看的星座');
    stopPlayHandCartoon();
})
// 修改星座
$('.setxzBtn').on('click',function(){
    $('.replacexz_container').hide();
    $('.index_top').text('选择您要绑定的星座');
})
// 查看更多
$('.getmore').on('click',function(e){
    e.stopPropagation();
    $('#'+xzType).hide();
    $('.result_menu').toggle();
})
// menu选择
$('.result_menu').find('li').on('click',function(e){
    var id = $(this).attr('id');
    xzType = id;
    $('.menu_select').show();
    $(this).hide();
    switch(id){
        case "today":
        var ys_time = getToDayTime().todayTime;
        AjaxEvent(xzType,userxz,ys_time);
        break;
        case "tomorrow":
        var ys_time = getToDayTime().nextDayTime;
        AjaxEvent(xzType,userxz,ys_time);
        break;
        case "week":
        var ys_time = weekNumInYear();
        AjaxEvent(xzType,userxz,ys_time);
        break;
        case "month":
        var ys_time = getToDayTime().todayTime;
        AjaxEvent(xzType,userxz,ys_time);
        break;
        case "anther":
        console.log('选择需要查看的运势日期')
        break;
        default:alert('请刷新页面重新测试')   
    }
})

// 取消menu
$('.result_img_container').on('click',function(){
    $('.result_menu').hide();
})



// 调用Html2Canvas
function playhtml2Canvas(nodeId){
    var width = document.querySelector(nodeId).clientWidth;
    var height = document.querySelector(nodeId).clientHeight;
    console.log(width,height)
    var scaleBy = 2; 
    var canvas = document.createElement("canvas");
    canvas.width = width * scaleBy;
    canvas.height = height * scaleBy;
    var context = canvas.getContext("2d");
    context.scale(scaleBy, scaleBy);
    html2canvas($(nodeId)[0], {
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
            $(nodeId).hide();
            $('.result_img_container').show();
            playCartoonHand();
        },
    }); 
}

 // 获取今天和明天时间
 function getToDayTime(){
    var time = new Date();
    var year = time.getFullYear();
    var month = time.getMonth()+1;
    var date = time.getDate();
    month = month<10?'0'+month:month;
    date = date<10?'0'+date:date;
    // 明天的时间
    var nextDay = new Date(time.getTime()+(24*60*60*1000))
    var n_year = nextDay.getFullYear();
    var n_month = nextDay.getMonth()+1;
    var n_date = nextDay.getDate();
    n_month = n_month<10?'0'+n_month:n_month;
    n_date = n_date<10?'0'+n_date:n_date;
    return {
        todayTime:year+'-'+month+'-'+date,
        nextDayTime:n_year+'-'+n_month+'-'+n_date
    }
}
// 获取星期
function getDayTime(time){
    var timeDate = new Date(time);
    var dayData = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
    return dayData[timeDate.getDay()]
}
// 获取今天是今年的第几周
function weekNumInYear() {
    var nowDate = new Date();
    var initTime = new Date();
    initTime.setMonth(0); // 本年初始月份
    initTime.setDate(1); // 本年初始时间
    var differenceVal = nowDate - initTime ; // 今天的时间减去本年开始时间，获得相差的时间
    var todayYear = Math.ceil(differenceVal/(24*60*60*1000)); // 获取今天是今年第几天
    var weekYear = Math.ceil(todayYear/7); // 获取今天是今年第几周
    // console.info("今天是本年第"+todayYear+"天，第"+weekYear+"周");//周日做为下周的开始计算
    return weekYear
};

// 提示保存图片
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
