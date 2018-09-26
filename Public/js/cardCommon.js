/*
 *     author:Amber;
 *     Date:17/5/22;
 *     description: CommonJs to GameCard
 * */

(function (window, document) {
    var gameCard = {};
    //加载图片
    gameCard.loadImgs = function (url, fn) {
        var a = new Image();
        a.crossOrigin = 'anonymous';
        a.onload = fn;
        a.src = url;
        return a;
    };
    /**分享提示*/
    var cartoonFlag = 0;
    var isHandCartoonPlay = false;
    var playCartoonHandTimer1;
    var playCartoonHandTimer2;
    //播放分享提示动画
    gameCard.playCartoonHand = function () {
        if (isHandCartoonPlay) {
            return false;
        }
        isHandCartoonPlay = true;
        var oCartoonPages = document.getElementsByClassName('zwfy-report-cartoon');
        var box = document.getElementsByClassName('zwfy-report-cartoonBox')[0];
        box.style.display = 'block';
        playCartoonHandTimer1 = setInterval(function () {
            for (var i = 0; i < oCartoonPages.length; i++) {
                oCartoonPages[i].setAttribute("class", "zwfy-report-cartoon");
            }
            oCartoonPages[cartoonFlag].setAttribute("class", "zwfy-report-cartoon zwfy-report-cartoon-active");
            cartoonFlag++;
            if (cartoonFlag == 3) {
                cartoonFlag = 0;
            }
        }, 200);
        playCartoonHandTimer2 = setTimeout(function () {
            clearInterval(playCartoonHandTimer1);
            playCartoonHandTimer = null;
            gameCard.stopPlayHandCartoon();
            isHandCartoonPlay = false;
        }, 5000)
    };
    //停止分享提示动画
    gameCard.stopPlayHandCartoon = function () {
        isHandCartoonPlay = false;

        clearInterval(playCartoonHandTimer1);
        playCartoonHandTimer1 = null;

        clearTimeout(playCartoonHandTimer2);
        playCartoonHandTimer2 = null;

        var box = document.getElementsByClassName('zwfy-report-cartoonBox')[0];
        box.style.display = 'none';

    };
    var countCount = 0;
    gameCard.addTongji = function () {
        var filter = document.getElementsByClassName("filter")[0];
        filter.addEventListener('touchstart', function () {
            timeout = setTimeout(function () {
                var query = {};
                if (countCount == 0) {
                    gameCard.ajaxPOST(tongjiUrl, query, function () {
                    });
                }
                countCount++;
            }, 350);
        });
        filter.addEventListener('touchmove', function () {
            clearTimeout(timeout);
            timeout = 0;
        });

        filter.addEventListener('touchend', function () {
            clearTimeout(timeout);
            timeout = 0;
        });
    };
    gameCard.isLowVersion = function () {
        var isAndroid = navigator.userAgent.toLowerCase().match(/android/i) ? true : false;
        var version = navigator.userAgent.toLowerCase().match(/MicroMessenger\/([\d\.]+)/i);
        return ((version < 'micromessenger/6.3.23') && isAndroid);
    };
    gameCard.needUpQiniu = function (){
        var isAndroid = navigator.userAgent.toLowerCase().match(/android/i) ? true : false;
        var version = navigator.userAgent.toLowerCase().match(/MicroMessenger\/([\d\.]+)/i);
        if(isAndroid){
            if(version&&version>'micromessenger/6.3.23')
                return false;
            else
                return true;
        }else{
            return false;
        }
    };
    gameCard.upToqiniuHandle = function (data,fn) {
        gameCard.upimg(data, Math.floor(Math.random() * 999)+'' + (new Date).getTime() + ".png",fn);
    };

    gameCard.makeImgFilter = function (src) {
        var filter = document.getElementsByClassName("filterImg")[0];
        filter.setAttribute("src", src);
        document.querySelector('.canvas').setAttribute('src',src)
    };

    gameCard.upimg = function (img, name, fn) {
        //up2Qiniu(img, qnToken, "test/xzys/", name, fn);
        up2Qiniu(img, this.token, this.path, name, fn);
    };

    gameCard.ajaxPOST = function (url, data, callback) {
        var postData = data;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        if (typeof(postData) === 'object') {
            postData = (function (obj) { // 转成post需要的字符串.
                var str = "";
                for (var prop in obj) {
                    str += prop + "=" + obj[prop] + "&"
                }
                return str;
            })(postData);
        }
        xhr.onreadystatechange = function () {
            var XMLHttpReq = xhr;
            if (XMLHttpReq.readyState == 4) {
                if (XMLHttpReq.status == 200) {
                    var text = XMLHttpReq.responseText;
                    callback && callback(text);
                }
            }
        };
        xhr.send(postData);
    };

    gameCard.getQueryString=function (name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return r[2]; return null;
    }

    function up2Qiniu(pic, token, path, name, callback) {
        //var pic = canvas.toDataURL("image/jpeg");
        pic = pic.replace(/^data:\s*image\/\w+;base64,/mg, '');
        var key = path + name;
        var url = "http://up.qiniu.com/putb64/-1/key/" + URLSafeBase64Encode(key);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                var result = JSON.parse(xhr.responseText);
                callback(result);
            }
        };
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/octet-stream");
        xhr.setRequestHeader("Authorization", "UpToken " + token);
        xhr.send(pic);
    }

    function URLSafeBase64Encode(v) {
        v = base64_encode(v);
        return v.replace(/\//g, '_').replace(/\+/g, '-');
    }

    function base64_encode(data) {
        var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
        var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
            ac = 0,
            enc = '',
            tmp_arr = [];
        if (!data) {
            return data;
        }
        data = utf8_encode(data + '');
        do { // pack three octets into four hexets
            o1 = data.charCodeAt(i++);
            o2 = data.charCodeAt(i++);
            o3 = data.charCodeAt(i++);
            bits = o1 << 16 | o2 << 8 | o3;
            h1 = bits >> 18 & 0x3f;
            h2 = bits >> 12 & 0x3f;
            h3 = bits >> 6 & 0x3f;
            h4 = bits & 0x3f;
            // use hexets to index into b64, and append result to encoded string
            tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
        } while (i < data.length);
        enc = tmp_arr.join('');
        switch (data.length % 3) {
            case 1:
                enc = enc.slice(0, -2) + '==';
                break;
            case 2:
                enc = enc.slice(0, -1) + '=';
                break;
        }
        return enc;
    }

    function utf8_encode(argString) {
        if (argString === null || typeof argString === 'undefined') {
            return '';
        }
        var string = (argString + ''); // .replace(/\r\n/g, '\n').replace(/\r/g, '\n');
        var utftext = '',
            start, end, stringl = 0;
        start = end = 0;
        stringl = string.length;
        for (var n = 0; n < stringl; n++) {
            var c1 = string.charCodeAt(n);
            var enc = null;
            if (c1 < 128) {
                end++;
            } else if (c1 > 127 && c1 < 2048) {
                enc = String.fromCharCode(
                    (c1 >> 6) | 192, (c1 & 63) | 128
                );
            } else if (c1 & 0xF800 ^ 0xD800 > 0) {
                enc = String.fromCharCode(
                    (c1 >> 12) | 224, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
                );
            } else { // surrogate pairs
                if (c1 & 0xFC00 ^ 0xD800 > 0) {
                    throw new RangeError('Unmatched trail surrogate at ' + n);
                }
                var c2 = string.charCodeAt(++n);
                if (c2 & 0xFC00 ^ 0xDC00 > 0) {
                    throw new RangeError('Unmatched lead surrogate at ' + (n - 1));
                }
                c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000;
                enc = String.fromCharCode(
                    (c1 >> 18) | 240, ((c1 >> 12) & 63) | 128, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
                );
            }
            if (enc !== null) {
                if (end > start) {
                    utftext += string.slice(start, end);
                }
                utftext += enc;
                start = end = n + 1;
            }
        }
        if (end > start) {
            utftext += string.slice(start, stringl);
        }
        return utftext;
    };
    window.gameCard = gameCard
})(window, document);