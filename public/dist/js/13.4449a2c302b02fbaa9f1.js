webpackJsonp([13],{Dz2l:function(e,t){},MI9C:function(e,t,i){"use strict";var o,l,n,a;Object.defineProperty(t,"__esModule",{value:!0}),o=i("UgCr"),l={props:{info:{},categories:{}},data:function(){return{loading:!1,isMobile:this.$store.state.app.isMobile,visible:!0,form:{id:this.info.id,category_id:this.info.category_id},formRules:{category_id:[{required:!0,message:"请选择商品分类",trigger:"blur"}]}}},watch:{visible:function(e){e||this.$emit("close",!1)}},methods:{handleSubmit:function(){var e=this;this.$refs.form.validate(function(t){t&&(e.loading=!0,Object(o.a)(e.form.id,e.form.category_id).then(function(){e.loading=!1,e.$notify({title:"提示",message:"修改商品分类成功",type:"success",duration:3e3}),e.$emit("close",{category:e.categories.find(function(t){return t.id===e.form.category_id})})}).catch(function(){e.loading=!1}))})},handleClose:function(){var e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.visible=!1,this.$emit("close",e)}}},n={render:function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("el-dialog",{attrs:{title:"修改商品分类",visible:e.visible},on:{"update:visible":function(t){e.visible=t}}},[i("el-form",{ref:"form",attrs:{model:e.form,"label-position":e.isMobile?"top":"","label-width":"90px",rules:e.formRules}},[i("el-form-item",{class:e.isMobile?"item-container":"",style:e.isMobile?"margin-top: -32px":"",attrs:{label:"分类",prop:"category_id"}},[i("el-select",{staticStyle:{display:"block"},attrs:{"no-data-text":"请先添加分类"},model:{value:e.form.category_id,callback:function(t){e.$set(e.form,"category_id",t)},expression:"form.category_id"}},e._l(e.categories,function(e){return i("el-option",{key:e.id,attrs:{value:e.id,label:e.name}})}))],1)],1),e._v(" "),i("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[i("el-button",{nativeOn:{click:function(t){e.handleClose(!1)}}},[e._v("取消")]),e._v(" "),i("el-button",{attrs:{type:"primary",loading:e.loading},nativeOn:{click:function(t){e.handleSubmit(t)}}},[e._v("确认修改\n    ")])],1)],1)},staticRenderFns:[]},a=i("VU/8")(l,n,!1,function(e){i("Dz2l")},null,null),t.default=a.exports}});