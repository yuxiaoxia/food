this["MyApp"] = this["MyApp"] || {};
this["MyApp"]["templates"] = this["MyApp"]["templates"] || {};
this["MyApp"]["templates"]["App"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "    <div class=\"goods-list\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">\r\n        <div class=\"goods-img\">\r\n            <img src=\""
    + alias3(((helper = (helper = helpers.imgSrc || (depth0 != null ? depth0.imgSrc : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"imgSrc","hash":{},"data":data}) : helper)))
    + "\" alt=\"\"/>\r\n        </div>\r\n        <div class=\"goods-desc\">\r\n            <div class=\"goods-title\">\r\n                "
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"name","hash":{},"data":data}) : helper)))
    + "\r\n            </div>\r\n            <div class=\"goods-intro\">\r\n                "
    + alias3(((helper = (helper = helpers.intro || (depth0 != null ? depth0.intro : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"intro","hash":{},"data":data}) : helper)))
    + "\r\n            </div>\r\n            <div class=\"goods-sold\">\r\n                已售："
    + alias3(((helper = (helper = helpers.sold || (depth0 != null ? depth0.sold : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"sold","hash":{},"data":data}) : helper)))
    + "份/月\r\n            </div>\r\n        </div>\r\n        <div class=\"goods-price\" data-money=\"\">\r\n            <div class=\"new-price\">\r\n                <span>￥<span class=\"price\">"
    + alias3(((helper = (helper = helpers.newPrice || (depth0 != null ? depth0.newPrice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"newPrice","hash":{},"data":data}) : helper)))
    + "</span></span></div>\r\n            <div class=\"old-price\">\r\n                <span>原价"
    + alias3(((helper = (helper = helpers.oldPrice || (depth0 != null ? depth0.oldPrice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"oldPrice","hash":{},"data":data}) : helper)))
    + " 元</span>\r\n            </div>\r\n            <a href=\"javascript:;\" class=\"cut-goods select-btn hide\">-</a>\r\n            <span class=\"goods-num hide\">0</span>\r\n            <a href=\"javascript:;\" class=\"add-goods select-btn\">+</a>\r\n            <input type=\"hidden\" name=\"name\" value=\"\">\r\n        </div>\r\n    </div>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return "\r\n"
    + ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
this["MyApp"]["templates"]["buynow"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "<div class=\"selected-list\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\" data-money=\""
    + alias3(((helper = (helper = helpers.money || (depth0 != null ? depth0.money : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"money","hash":{},"data":data}) : helper)))
    + "\" data-num=\""
    + alias3(((helper = (helper = helpers.num || (depth0 != null ? depth0.num : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"num","hash":{},"data":data}) : helper)))
    + "\" data-price=\""
    + alias3(((helper = (helper = helpers.price || (depth0 != null ? depth0.price : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"price","hash":{},"data":data}) : helper)))
    + "\" data-name=\""
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"name","hash":{},"data":data}) : helper)))
    + "\">\r\n  <div class=\"goodsName\"><span>"
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"name","hash":{},"data":data}) : helper)))
    + "</span>\r\n     &nbsp;&nbsp;&nbsp;\r\n    <span> X <span class=\"num\">"
    + alias3(((helper = (helper = helpers.num || (depth0 != null ? depth0.num : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"num","hash":{},"data":data}) : helper)))
    + "</span></span>\r\n    <span class=\"price\"> "
    + alias3(((helper = (helper = helpers.price || (depth0 != null ? depth0.price : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"price","hash":{},"data":data}) : helper)))
    + "</span></div>\r\n  <div class=\"remark\">备注：\r\n    <input type=\"text\" placeholder=\"是否加辣、葱花等\" />\r\n  </div>\r\n  <div class=\"edit\" style=\"display: none\">\r\n    <a href=\"javascript:;\" class=\"delect\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\"></a>\r\n    <div class=\"edit-num\">\r\n      <a href=\"javascript:;\" class=\"cut-num\">-</a>\r\n      <a href=\"javascript:;\" class=\"add-num\">+</a>\r\n    </div>\r\n  </div>\r\n</div>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
this["MyApp"]["templates"]["detail"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "<div class=\"back-warp\">\r\n    <a href=\"goodsList.html\" class=\"back\"></a>\r\n</div>\r\n<div class=\"detail-img\">\r\n      <img src=\""
    + alias3(((helper = (helper = helpers.bimg || (depth0 != null ? depth0.bimg : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"bimg","hash":{},"data":data}) : helper)))
    + "\" alt=\"\" width=\"100%\" height=\"400px\"/>\r\n</div>\r\n\r\n<section class=\"goods-introduce\">\r\n    <h4>价格："
    + alias3(((helper = (helper = helpers.newprice || (depth0 != null ? depth0.newprice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"newprice","hash":{},"data":data}) : helper)))
    + " /份</h4>\r\n    <h1>菜谱简介</h1>\r\n    <p>名称："
    + alias3(((helper = (helper = helpers.Cname || (depth0 != null ? depth0.Cname : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"Cname","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>简介：</p>\r\n    <p class=\"jianjie\" style=\"margin-top:0\">"
    + alias3(((helper = (helper = helpers.desc || (depth0 != null ? depth0.desc : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"desc","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>标题："
    + alias3(((helper = (helper = helpers.title || (depth0 != null ? depth0.title : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"title","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>主料："
    + alias3(((helper = (helper = helpers.zhuliao || (depth0 != null ? depth0.zhuliao : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"zhuliao","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>烹饪时间："
    + alias3(((helper = (helper = helpers.prtime || (depth0 != null ? depth0.prtime : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"prtime","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>口味："
    + alias3(((helper = (helper = helpers.kouwei || (depth0 != null ? depth0.kouwei : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"kouwei","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>功效："
    + alias3(((helper = (helper = helpers.gongxiao || (depth0 != null ? depth0.gongxiao : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"gongxiao","hash":{},"data":data}) : helper)))
    + "</p>\r\n</section>\r\n<div clsss=\"goods-selected\" style=\"position: fixed;width: 40%;height: 10%;bottom:53%;right:-10%; z-index:9999;color:#333\">\r\n  <a href=\"javascript:;\" class=\"cut-goods select-btn btn-hide\">-</a>\r\n  <a href=\"javascript:;\" class=\"add-goods select-btn\">+</a>\r\n  <input type=\"hidden\" name=\"name\" value=\"\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\" data-price=\""
    + alias3(((helper = (helper = helpers.newprice || (depth0 != null ? depth0.newprice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"newprice","hash":{},"data":data}) : helper)))
    + "\" data-name=\""
    + alias3(((helper = (helper = helpers.Cname || (depth0 != null ? depth0.Cname : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"Cname","hash":{},"data":data}) : helper)))
    + "\" id=\"save\"/>\r\n</div>\r\n<section class=\"account\">\r\n    <div>\r\n        <i></i>\r\n        <div class=\"goods-total-num\">0</div>\r\n    </div>\r\n    <div>\r\n        总计：<span id=\"totalmoney\"> 0 </span>元\r\n    </div>\r\n    <input type=\"hidden\" name=\"food\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\" value=\"foods-id="
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">\r\n    <div class=\"goBuy\">确认</div>\r\n</section>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
this["MyApp"]["templates"]["header"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "    <div class=\"goods-list\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">\r\n        <div class=\"goods-img\">\r\n            <img src=\""
    + alias3(((helper = (helper = helpers.imgSrc || (depth0 != null ? depth0.imgSrc : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"imgSrc","hash":{},"data":data}) : helper)))
    + "\" alt=\"\"/>\r\n        </div>\r\n        <div class=\"goods-desc\">\r\n            <div class=\"goods-title\">\r\n                "
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"name","hash":{},"data":data}) : helper)))
    + "\r\n            </div>\r\n            <div class=\"goods-intro\">\r\n                "
    + alias3(((helper = (helper = helpers.intro || (depth0 != null ? depth0.intro : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"intro","hash":{},"data":data}) : helper)))
    + "\r\n            </div>\r\n            <div class=\"goods-sold\">\r\n                已售："
    + alias3(((helper = (helper = helpers.sold || (depth0 != null ? depth0.sold : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"sold","hash":{},"data":data}) : helper)))
    + "份/月\r\n            </div>\r\n        </div>\r\n        <div class=\"goods-price\" data-money=\"\">\r\n            <div class=\"new-price\">\r\n                <span>￥<span class=\"price\">"
    + alias3(((helper = (helper = helpers.newPrice || (depth0 != null ? depth0.newPrice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"newPrice","hash":{},"data":data}) : helper)))
    + "</span></span></div>\r\n            <div class=\"old-price\">\r\n                <span>原价"
    + alias3(((helper = (helper = helpers.oldPrice || (depth0 != null ? depth0.oldPrice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"oldPrice","hash":{},"data":data}) : helper)))
    + " 元</span>\r\n            </div>\r\n            <a href=\"javascript:;\" class=\"cut-goods select-btn hide\">-</a>\r\n            <span class=\"goods-num hide\">0</span>\r\n            <a href=\"javascript:;\" class=\"add-goods select-btn\">+</a>\r\n            <input type=\"hidden\" name=\"name\" value=\"\">\r\n        </div>\r\n    </div>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return "This is the app header!\r\n"
    + ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
this["MyApp"]["templates"]["list"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "\r\n    <div class=\"goods-list\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\" data-status=\""
    + alias3(((helper = (helper = helpers.cstatus || (depth0 != null ? depth0.cstatus : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"cstatus","hash":{},"data":data}) : helper)))
    + "\">\r\n        <div class=\"foods-disabled\" style=\"display:none;\">\r\n            已售完\r\n        </div>\r\n        <div class=\"goods-img\">\r\n            <img src=\""
    + alias3(((helper = (helper = helpers.simg || (depth0 != null ? depth0.simg : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"simg","hash":{},"data":data}) : helper)))
    + "\" alt=\"\"/>\r\n        </div>\r\n        <div class=\"goods-desc\">\r\n            <div class=\"goods-title\">\r\n                "
    + alias3(((helper = (helper = helpers.Cname || (depth0 != null ? depth0.Cname : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"Cname","hash":{},"data":data}) : helper)))
    + "\r\n            </div>\r\n            <div class=\"goods-intro\">\r\n                "
    + alias3(((helper = (helper = helpers.title || (depth0 != null ? depth0.title : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"title","hash":{},"data":data}) : helper)))
    + "\r\n            </div>\r\n            <div class=\"goods-sold\">\r\n                已售："
    + alias3(((helper = (helper = helpers.sold || (depth0 != null ? depth0.sold : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"sold","hash":{},"data":data}) : helper)))
    + " 份\r\n            </div>\r\n        </div>\r\n        <div class=\"goods-price\" data-money=\"\">\r\n            <div class=\"new-price\">\r\n                <span>￥<span class=\"price\">"
    + alias3(((helper = (helper = helpers.newprice || (depth0 != null ? depth0.newprice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"newprice","hash":{},"data":data}) : helper)))
    + "</span></span>\r\n            </div>\r\n            <div class=\"old-price\">\r\n                <span>原价"
    + alias3(((helper = (helper = helpers.oldprice || (depth0 != null ? depth0.oldprice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"oldprice","hash":{},"data":data}) : helper)))
    + " 元</span>\r\n            </div>\r\n            <!-- <a href=\"javascript:;\" class=\"cut-goods select-btn hide\">-</a>\r\n            <span class=\"goods-num hide\" data-price=\""
    + alias3(((helper = (helper = helpers.newprice || (depth0 != null ? depth0.newprice : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"newprice","hash":{},"data":data}) : helper)))
    + "\" data-total=\"0\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">0</span> -->\r\n            <a href=\"javascript:;\" class=\"add-goods select-btn\">+</a>\r\n            <!-- <input type=\"hidden\" name=\"name\" value=\"\"> -->\r\n        </div>\r\n    </div>\r\n\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
this["MyApp"]["templates"]["order"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "<div class=\"selected-list\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\" data-money=\""
    + alias3(((helper = (helper = helpers.money || (depth0 != null ? depth0.money : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"money","hash":{},"data":data}) : helper)))
    + "\" data-num=\""
    + alias3(((helper = (helper = helpers.num || (depth0 != null ? depth0.num : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"num","hash":{},"data":data}) : helper)))
    + "\" data-price=\""
    + alias3(((helper = (helper = helpers.price || (depth0 != null ? depth0.price : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"price","hash":{},"data":data}) : helper)))
    + "\" data-name=\""
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"name","hash":{},"data":data}) : helper)))
    + "\">\r\n  <span>"
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"name","hash":{},"data":data}) : helper)))
    + "</span> &nbsp;&nbsp;&nbsp;<span> X "
    + alias3(((helper = (helper = helpers.num || (depth0 != null ? depth0.num : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"num","hash":{},"data":data}) : helper)))
    + "</span> <span> ￥"
    + alias3(((helper = (helper = helpers.price || (depth0 != null ? depth0.price : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"price","hash":{},"data":data}) : helper)))
    + "</span>\r\n</div>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
this["MyApp"]["templates"]["rest"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "<section class=\"rest\">\r\n    <p>餐厅名称："
    + alias3(((helper = (helper = helpers.name || (depth0 != null ? depth0.name : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"name","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>餐厅注册时间："
    + alias3(((helper = (helper = helpers.time || (depth0 != null ? depth0.time : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"time","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>餐厅创始人："
    + alias3(((helper = (helper = helpers.founders || (depth0 != null ? depth0.founders : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"founders","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>餐厅类型："
    + alias3(((helper = (helper = helpers.type || (depth0 != null ? depth0.type : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"type","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>餐厅简介："
    + alias3(((helper = (helper = helpers.brief || (depth0 != null ? depth0.brief : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"brief","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>特色服务："
    + alias3(((helper = (helper = helpers.feature || (depth0 != null ? depth0.feature : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"feature","hash":{},"data":data}) : helper)))
    + "</p>\r\n    <p>图片展示：</p>\r\n</section>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "");
},"useData":true});
this["MyApp"]["templates"]["seat"] = Handlebars.template({"1":function(depth0,helpers,partials,data) {
    var helper, alias1=helpers.helperMissing, alias2="function", alias3=this.escapeExpression;

  return "    <li class=\"seat-select seat\" data-id=\""
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "\">\r\n      <div class=\"seat-desc\">\r\n        <div>座位id:"
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "</div>\r\n        <div>可容"
    + alias3(((helper = (helper = helpers.seatnum || (depth0 != null ? depth0.seatnum : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"seatnum","hash":{},"data":data}) : helper)))
    + "人</div>\r\n      </div>\r\n      <div class=\"seat-status\">"
    + alias3(((helper = (helper = helpers.status || (depth0 != null ? depth0.status : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"status","hash":{},"data":data}) : helper)))
    + "</div>\r\n      <input type=\"hidden\" name=\"name\" value=\"座位id号为"
    + alias3(((helper = (helper = helpers.id || (depth0 != null ? depth0.id : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"id","hash":{},"data":data}) : helper)))
    + "/共"
    + alias3(((helper = (helper = helpers.seatnum || (depth0 != null ? depth0.seatnum : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"seatnum","hash":{},"data":data}) : helper)))
    + "位/包间费："
    + alias3(((helper = (helper = helpers.bjf || (depth0 != null ? depth0.bjf : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"bjf","hash":{},"data":data}) : helper)))
    + "</br>"
    + alias3(((helper = (helper = helpers.desc || (depth0 != null ? depth0.desc : depth0)) != null ? helper : alias1),(typeof helper === alias2 ? helper.call(depth0,{"name":"desc","hash":{},"data":data}) : helper)))
    + "\">\r\n    </li>\r\n";
},"compiler":[6,">= 2.0.0-beta.1"],"main":function(depth0,helpers,partials,data) {
    var stack1;

  return "<ul class=\"seat-con\">\r\n"
    + ((stack1 = helpers.each.call(depth0,depth0,{"name":"each","hash":{},"fn":this.program(1, data, 0),"inverse":this.noop,"data":data})) != null ? stack1 : "")
    + "</ul>\r\n";
},"useData":true});