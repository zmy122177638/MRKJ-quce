
var manName = null;
var womanName = null;
var gid = 7;
var bid = 7;
var isHandCartoonPlay = false;

window.onload = function() {
    var liheight = document.querySelector('.scroller').firstElementChild.firstElementChild.clientHeight;
    var initScoll = -12 * liheight
    myScrollg = new IScroll('#wrapper-g', {
        scrollX: false,
        scrollY: true,
        momentum: false,
        snap: false,
        snapSpeed: 400,
        keyBindings: true,
    });
    myScrollb = new IScroll('#wrapper-b', {
        scrollX: false,
        scrollY: true,
        momentum: false,
        snap: false,
        snapSpeed: 400,
        keyBindings: true,
    });
    myScrollg.on('scrollEnd', function () {
        checkScoll(myScrollg, 0);
    });
    myScrollb.on('scrollEnd', function () {
        checkScoll(myScrollb, 1);
    });

    function display() {
        $('.activefnt-g .unselected').hide()
        $('.activefnt-g .selected').show()
        $('.activefnt-b .unselected').hide()
        $('.activefnt-b .selected').show()
    }

    function init() {
        myScrollg.scrollBy(0, initScoll);
        myScrollb.scrollBy(0, initScoll);
        $('.activefnt-g .unselected').show()
        $('.activefnt-g .selected').hide()
        $('.activefnt-b .unselected').show()
        $('.activefnt-b .selected').hide()
        $('.activefnt-b').removeClass('activefnt-b');
        $('#wrapper-b li').eq(13).addClass('activefnt-b');
        $('.activefnt-g').removeClass('activefnt-g');
        $('#wrapper-g li').eq(13).addClass('activefnt-g');
        display()
    }
    init();

    function checkScoll(scroll, flg) {
        y = scroll.y;
        absy = Math.abs(y);
        if (absy % liheight >= liheight / 2) {
            scollup = absy % liheight - liheight;
            scroll.scrollBy(0, scollup);
        }
        if (absy % liheight > 0 && absy % liheight < liheight / 2) {
            scolldown = absy % liheight;
            scroll.scrollBy(0, scolldown);
        }
        absy = Math.abs(y);
        index1 = Math.round(absy / liheight);
        index = [7,8,9,10,11,12,1,2,3,4,5,6,7,8,9,10,11,12,1,2,3,4,5,6][index1]
        console.log(index)
        if (flg === 1) {
            $('.activefnt-b .unselected').show()
            $('.activefnt-b .selected').hide()
            $('.activefnt-b').removeClass('activefnt-b');
            $('#wrapper-b li').eq(index1+1).addClass('activefnt-b');
            bid = index;
        } else {
            $('.activefnt-g .unselected').show()
            $('.activefnt-g .selected').hide()
            $('.activefnt-g').removeClass('activefnt-g');
            $('#wrapper-g li').eq(index1+1).addClass('activefnt-g');
            gid = index;
        }
        display()
    }

}

function onStartHandle() {
    womanName = document.querySelector(".woman-name").value.trim();
    manName = document.querySelector(".man-name").value.trim();
    if (womanName === '') {
        alert('请输入女生姓名');
        return;
    }
    if (manName === '') {
        alert('请输入男生姓名');
        return;
    }
    // ajax数据
    ajaxDataEvent();
    // 隐藏主页
    $('.content').hide()
    $('.nav_body').hide();
    //显示等待界面
    $('.loadingBox').show()
    // 显示结果
    $('.result').show();
    $('.result_container').show();
    // 开始截图
    playhtml2Canvas();
}

// 传递数据
function ajaxDataEvent(){
    $('.woman').html(womanName);
    $('.man').html(manName);
    $('.womanxz').attr('src',bstart[gid - 1]);
    $('.manxz').attr('src',gstart[bid - 1]);
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


var cartoonFlag = 0;
function playCartoonHand() {
    if (isHandCartoonPlay) {
        return false;
    }
    isHandCartoonPlay = true;
    var oCartoonPages = $('.zwfy-report-cartoon');
    $('.zwfy-report-cartoonBox').show();
    playCartoonHandTimer1 = setInterval(function () {
        for (var i = 0; i < oCartoonPages.length; i++) {
            oCartoonPages[i].setAttribute("class", "zwfy-report-cartoon");
        }
        oCartoonPages[cartoonFlag].setAttribute("class", "zwfy-report-cartoon zwfy-report-cartoon-active");
        cartoonFlag++;
        if (cartoonFlag == 3) {
            cartoonFlag = 0;
        }
    }, 200)
    playCartoonHandTimer2 = setTimeout(function () {
        clearInterval(playCartoonHandTimer1);
        playCartoonHandTimer = null;
        isHandCartoonPlay = false;
        stopPlayHandCartoon();
    }, 5000)
}

function stopPlayHandCartoon() {
    isHandCartoonPlay = false;
    clearInterval(playCartoonHandTimer1);
    playCartoonHandTimer1 = null;

    clearTimeout(playCartoonHandTimer2);
    playCartoonHandTimer2 = null;
    $('.zwfy-report-cartoonBox').hide()
}

$('.show').on('click', function () {
    playCartoonHand();
})
$('.start').on('click', function () {
    onStartHandle();
})
$('.again').on('click', function () {
    $('.result_img_container').hide();
    $('.nav_body').show();
    $('.content').show()
    document.querySelector('.woman-name').value = null;
    document.querySelector('.man-name').value = null;
    stopPlayHandCartoon();
    window.onscroll = null;
})
