/**
 * @author Daniel White
 * @copyright Daniel White 2014
 * @license MIT <https://github.com/lightswitch05/filterable/blob/master/MIT-LICENSE>
 * @link http://lightswitch05.github.io/filterable
 * @module filterable
 * @version 0.3.0 **/
!function(a){"use strict";a.fn.filterableutils={isNull:function(a){return void 0===a||null===a?!0:!1},notNull:function(a){return!this.isNull(a)}}}(jQuery),function(a){"use strict";var b=function(b,c){this.$cell=a(b),this.options=a.extend({},a.fn.filterableCell.defaults,c),this.match=null,this.init()};b.prototype={constructor:b,value:function(){return this.$cell.text()},setMatch:function(a){a?(this.$cell.addClass("filterable-match"),this.$cell.removeClass("filterable-mismatch")):(this.$cell.addClass("filterable-mismatch"),this.$cell.removeClass("filterable-match"))},isMatch:function(a){if("function"==typeof this.options.isMatch)this.match=this.options.isMatch(this.$cell,a);else{a=a.replace(/[\-\[\]\/\{\}\(\)\+\?\.\\\^\$\|]/g,"\\$&"),a=a.replace(/\*/,".*"),a=".*"+a+".*";var b=this.options.ignoreCase?"i":"",c=new RegExp(a,b);this.match=c.test(this.value())===!0}return this.setMatch(this.match),this.match},init:function(){this.$cell.addClass("filterable-cell"),a.proxy(function(){this.$element.triggerHandler("init",this)},this)},destroy:function(){this.$cell.removeClass("filterable-cell filterable-match filterable-mismatch"),this.$cell.removeData("fitlerableCell")}},a.fn.filterableCell=function(c){var d=arguments,e="filterableCell";return this.each(function(){var f=a(this),g=f.data(e),h="object"==typeof c&&c;g||f.data(e,g=new b(this,h)),"string"==typeof c&&g[c].apply(g,Array.prototype.slice.call(d,1))})},a.fn.filterableCell.defaults={isMatch:null}}(jQuery),function(a){"use strict";var b=function(b,c){this.$row=a(b),this.cells=[],this.options=a.extend({},a.fn.filterableRow.defaults,c),this.init()};b.prototype={constructor:b,cell:function(a){return this.cells[a]},setMatch:function(a){a?(this.$row.addClass("filterable-match"),this.$row.removeClass("filterable-mismatch")):(this.$row.addClass("filterable-mismatch"),this.$row.removeClass("filterable-match"))},hasMismatch:function(){var b=!1;return a.each(this.cells,a.proxy(function(c,d){return a.fn.filterableutils.notNull(d)&&d.match===!1?void(b=!0):void 0},this)),b},filter:function(a,b){this.cells[b].isMatch(a),this.setMatch(!this.hasMismatch())},ignoredColumn:function(b){return a.fn.filterableutils.notNull(this.options.onlyColumns)?-1===a.inArray(b,this.options.onlyColumns):-1!==a.inArray(b,this.options.ignoreColumns)},init:function(){this.$row.addClass("filterable-row");var b;this.$row.children("td").each(a.proxy(function(c,d){this.ignoredColumn(c)?b=null:(a(d).filterableCell(this.options),b=a(d).data("filterableCell")),this.cells.push(b)},this)),a.proxy(function(){this.$row.triggerHandler("init",this)},this)},destroy:function(){this.$row.removeClass("filterable-row filterable-match filterable-mismatch"),this.$row.removeData("fitlerableRow")}},a.fn.filterableRow=function(c){var d=arguments,e="filterableRow";return this.each(function(){var f=a(this),g=f.data(e),h="object"==typeof c&&c;g||f.data(e,g=new b(this,h)),"string"==typeof c&&g[c].apply(g,Array.prototype.slice.call(d,1))})},a.fn.filterableRow.defaults={}}(jQuery),function(a){"use strict";var b=function(b,c){this.$element=a(b),this.rows=null,this.options=a.extend({},a.fn.filterable.defaults,c),this.init()};b.prototype={constructor:b,ignoredColumn:function(b){return a.fn.filterableutils.notNull(this.options.onlyColumns)?-1===a.inArray(b,this.options.onlyColumns):-1!==a.inArray(b,this.options.ignoreColumns)},initRows:function(){this.rows=[],this.$element.children("tbody,*").children("tr").each(a.proxy(function(b,c){0!==b&&(a(c).filterableRow(this.options),this.rows.push(a(c).data("filterableRow")))},this))},typeaheadValues:function(b){var c={};return a.fn.filterableutils.isNull(this.rows)&&this.initRows(),a.each(this.rows,a.proxy(function(a,d){c[d.cell(b).value()]=""},this)),a.map(c,function(a,b){return b})},filter:function(b,c){"function"==typeof this.options.beforeFilter&&this.options.beforeFilter(c,b),a.fn.filterableutils.isNull(this.rows)&&this.initRows(),a.each(this.rows,a.proxy(function(a,d){d.filter(b,c)},this)),"function"==typeof this.options.afterFilter&&this.options.afterFilter(c,b)},initEditable:function(b,c){var d=this;a(b).editable(a.extend({send:"never",type:"typeahead",emptytext:"",value:"",title:"Enter filter for "+a(b).text(),display:function(){},source:d.typeaheadValues(c)},this.options.editableOptions)),a(b).on("save.editable",a.proxy(function(d,e){""===e.newValue?a(b).removeClass("filterable-active"):a(b).addClass("filterable-active"),this.filter(e.newValue,c)},this))},init:function(){this.$element.addClass("filterable"),this.$element.find("tr:first").first().children("td,th").each(a.proxy(function(b,c){if(!this.ignoredColumn(b)){var d;a.fn.filterableutils.notNull(this.options.editableSelector)?d=a(c).find(this.options.editableSelector):(d=a(c).wrapInner("<div />").children().first(),a(d).data(a(c).data())),this.initEditable(d,b);var e=String(a(d).editable("getValue",!0));""!==e&&this.filter(e,b)}},this)),a.proxy(function(){this.$element.triggerHandler("init",this)},this)},destroy:function(){this.$element.removeClass("filterable"),this.$element.removeData("fitlerable")}},a.fn.filterable=function(c){var d=arguments,e="filterable";return this.each(function(){var f=a(this),g=f.data(e),h="object"==typeof c&&c;g||f.data(e,g=new b(this,h)),"string"==typeof c&&g[c].apply(g,Array.prototype.slice.call(d,1))})},a.fn.filterable.defaults={ignoreColumns:[],onlyColumns:null,ignoreCase:!0,editableOptions:null,editableSelector:null,beforeFilter:null,afterFilter:null}}(jQuery);