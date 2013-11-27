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
                    var template=$('<div class="timeline-column-month"></div>');
                    $.each(data,function(key,val){
                        var temp=$('<h3 class="timeline-month">'+
                            '<a class="timeline-jump" href="#"></a>'+
                            '<span></span>'+
                            '</h3>'+
                            '<div class="timeline-month-inner">'+
                            '</div>');
                        temp.find('span').html(key);
                        _class.render_article(val,temp.eq(1));
                        template.append(temp);
                    });
                    _self.config.layout.find('.timeline-inner').append(template);
                    _self.controls('galleys_timeline',template);
                },
                render_article:function(data,floor){
                    var box=floor;
                    $.isArray(data)&&$.each(data,function(key,val){
                        var class_name=(key+1)%2===0?val.class+' r-column':val.class,
                            template='<article class="timeline-post '+class_name+'">'+
                            '<div class="post-inner">'+
                            '<span class="post-icon"></span>'+
                            '<time class="post-date">'+
                            '<span>'+val.date+'</span>'+
                            '</time>'+
                            '<h1 class="post-title">'+
                            '<a href="'+val.link+'">'+val.title+'</a>'+
                            '</h1>'+
                            '<div class="post-content">'+val.content+
                            '<p class="post-meta">'+
                            '<span class="post-author">'+
                            '<a href="javascript:void(0);" title="由'+val.author+'发布" rel="author">'+val.author+'</a>'+
                            '<em>·</em>'+
                            '</span>'+
                            '<span class="post-category">'+_class.render_category(val.category)+
                            '</span>'+
                            '<span class="post-comment">'+
                            '<a href="'+(val.link+'#respond')+'" title="《'+val.title+'》上的评论" rel="comment"> '+val.commentNum+' Comment</a>'+
                            '</span>'+
                            '</p>'+
                            '</div>'+
                            '<div class="post-dot"></div>'+
                            '<div class="post-arrow"></div>'+
                            '</div>'+
                            '</article>';
                        template=$(template);
                        box.append(template);
                    })
                },
                render_category:function(data){
                    var temp='';
                    $.isArray(data)&& $.each(data,function(key,val){
                        for(var item in val){
                            temp+='<a href="'+val[item]+'" title="查看'+item+'中的全部文章" rel="category">'+item+'</a>'
                        }
                        temp+='<em>·</em>';
                    });
                    return temp;
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
        controls:function(fNames){
            var _self=this,_class={
                galleys_timeline:function(floor){
                    var posts=floor.find('.timeline-post'),l_column=[],r_column=[],l_h,r_h;
                    $.each(posts,function(key,val){
                        var top,left,value=$(val);
                        if(value.hasClass('r-column')){
                            top=_self.plugin.offsetTop(r_column);
                            left=525;
                            value.css({top:top,left:left});
                            r_column.push(value);
                        }else{
                            top=_self.plugin.offsetTop(l_column);
                            value.css({top:top,left:0});
                            l_column.push(value);
                        }
                    });
                    l_h=_self.plugin.offsetTop(l_column);
                    r_h=_self.plugin.offsetTop(r_column);
                    posts.parent().css({height:l_h>r_h?l_h:r_h});
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
        plugin:(function(_self){
            return {
                toArray:function(subArray,sliceIndex){
                    return Array.prototype.slice.call(subArray,sliceIndex||0);
                },
                offsetTop:function(list){
                    var top=0;
                    $.isArray(list)&& $.each(list,function(key,val){
                        top+=$(val).height()+20;
                    });
                    return top;
                }
            };
        })(this)
    };
    $(function(){
        console.log(new timeline());
    })
})(Zepto);