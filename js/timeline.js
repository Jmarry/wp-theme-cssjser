/**
 * Created with JetBrains PhpStorm.
 * User: wb-wangyuefei
 * Date: 13-11-26
 * Time: 下午2:13
 * To change this template use File | Settings | File Templates.
 */
(function($){
    var timeline=function(){
        this._init();
    };
    timeline.prototype={
        _init:function(){},
        models:function(fName,args){
            var _self=this,_class={
                getDate:function(){
                    $.ajax({

                    })
                }
            };
            return _class[fName].apply(_self,args);
        },
        views:function(){},
        controls:function(){}
    };
    $(function(){

    })
})(Zepto);