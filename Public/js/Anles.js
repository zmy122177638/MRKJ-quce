
(function(window, undefined) {
    "use strict"
    var _global;
    var AnlesPlugin = {
       'countDownUp':countDownUp
    }

    /**
    * 
    * @param {Object} option 
    * option.setHDTime 設置時間(秒)
    * option.countName 計時名字
    * option.callback 回調函數
    * option.loop 是否循環
    * option.type {MaxHours}返回最大小時數，{MaxDay}返回最大天數
    */
    function countDownUp(option){
        if(!(this instanceof countDownUp))return new countDownUp(option);
        this.setHDTime = option.setHDTime || 86400;
        this.localHDTime = option.setHDTime || 86400;
        this.countName = option.countName || 'countDown';
        this.callback = option.callback || Function;
        this.loop = option.loop;
        this.type = option.type || 'MaxHours';
        this.Init();
    }
    countDownUp.prototype = {
        Init(){
            this.setHDTime = sessionStorage.getItem(this.countName)?sessionStorage.getItem(this.countName):this.setHDTime;
            this.setInter();
        },
        setInter(){
            let _self = this;
            this.callback(this.countDown(this.setHDTime))
            sessionStorage.setItem(this.countName,this.setHDTime)
            this.setHDTime--;
            if(this.setHDTime < 0){
                if(this.loop){
                    this.setHDTime = this.localHDTime;
                    this.setInter();
                }else{
                    return false;
                }
            }else{     
                setTimeout(function(){
                    _self.setInter();
                },1000)
            } 
        },
        countDown(time){
            // time 单位秒
            let dayNum;
            let hours;
            let ddNum = Math.floor( time % (24*3600)); 
            let minutesNum = ddNum%(3600);         
            let minutes = Math.floor(minutesNum/(60));
            let secondNum = ddNum%(60)
            let second = Math.floor(secondNum);
            if(this.type == 'MaxHours'){
                hours = Math.floor(time / (3600));
                return [this.fillNum(hours),this.fillNum(minutes),this.fillNum(second)]
            }else if(this.type == 'MaxDay'){
                dayNum = Math.floor( time / (24*3600));
                hours = Math.floor(ddNum / (3600));
                return [this.fillNum(dayNum),this.fillNum(hours),this.fillNum(minutes),this.fillNum(second)]
            }
        },
        fillNum(num){
            if(num > 9){
                return num;
            }else{
                return '0'+num;
            }
        }
    }
    // 暴露给全局对象
    _global = (function(){ return this || (0, eval)('this'); }());
    if (typeof module !== "undefined" && module.exports) {
        module.exports = AnlesPlugin;
    } else if (typeof define === "function" && define.amd) {
        define(function(){return AnlesPlugin;});
    } else {
        !('AnlesPlugin' in _global) && (_global.AnlesPlugin = AnlesPlugin);
    }
})(window);