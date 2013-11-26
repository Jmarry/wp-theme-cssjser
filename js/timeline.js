/**
 * Created with JetBrains PhpStorm.
 * User: wb-wangyuefei
 * Date: 13-11-26
 * Time: 下午2:13
 * To change this template use File | Settings | File Templates.
 */
(function($){
    var default_config={
        layout:$('#timeline')
    },timeline=function(config){
        this.config= $.extend({},default_config,config);
        this._init();
    };
    timeline.prototype={
        _init:function(){
            var _self=this;
            this.models('getData',function(data){
                _self.views('render_timeline',data);
            });
        },
        models:function(fName){
            var _self=this,_class={
                getData:function(callback){
                    $.ajax({
                        url:globle_config.ajaxUrl,
                        type:'GET',
                        dataType: 'json',
                        data:{action:'timeline',paged:1},
                        success:function(data){
                            $.isFunction(callback)&&callback.apply(_self,_self.plugin.toArray(arguments));
                        }
                    })
                }
            };
            return _class[fName]&&_class[fName].apply(_self, _self.plugin.toArray(arguments,1));
        },
        views:function(fNames){
            var _self=this,_class={
                render_timeline:function(data){
                    var template=$('<div class="timeline-wrap">'+
                        '<div class="timeline-bar"></div>'+
                        '<div class="timeline-start-dot"></div>'+
                        '<div class="timeline-inner">'+
                        '</div>'+
                        '</div>');
                    _self.config.layout.html(template);
                    _class.render_floor_month(data.posts||[]);
                },
                render_floor_month:function(data){
                    $.each(data,function(item){
                        console.log(item);
                    })
                },
                render_article:function(data){

                }
            },args=arguments;
            if($.isArray(fNames)){
                $.each(fNames,function(item){
                    _class[item]&&_class[item].apply(_self,_self.plugin.toArray(args,1));
                });
            }else{
                _class[fNames]&&_class[fNames].apply(_self,_self.plugin.toArray(args,1));
            }
            return _self;
        },
        controls:function(){},
        plugin:(function(_self){
            return {
                toArray:function(subArray,sliceIndex){
                    return Array.prototype.slice.call(subArray,sliceIndex||0);
                }
            };
        })(this)
    };
    $(function(){
        new timeline();
    })
})(Zepto);