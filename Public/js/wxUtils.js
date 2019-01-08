
(function(window, undefined) {
  "use strict"
  var _global;
  var wxUtils = {
     
  }
  var wxpay = function(){

  }
  // 暴露给全局对象
  _global = (function(){ return this || (0, eval)('this'); }());
  if (typeof module !== "undefined" && module.exports) {
      module.exports = wxUtils;
  } else if (typeof define === "function" && define.amd) {
      define(function(){return wxUtils;});
  } else {
      !('wxUtils' in _global) && (_global.wxUtils = wxUtils);
  }
})(window);