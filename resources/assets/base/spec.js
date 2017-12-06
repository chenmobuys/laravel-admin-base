/**
 * 判断对象是否存在 class
 * @param ele
 * @param cls
 * @returns
 */
function has_class(ele,cls) {
    return ele.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
}

/**
 * 添加class
 * @param ele
 * @param cls
 * @returns
 */
function add_class(ele,cls) {
    if (!this.has_class(ele,cls)) ele.className += " "+cls;
}

/**
 * 移除class
 * @param ele
 * @param cls
 * @returns
 */
function remove_class(ele,cls) {
    if (has_class(ele,cls)) {
        var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
        ele.className=ele.className.replace(reg,' ');
    }
}

//点击规格按钮
function createDeleteInput(obj)
{
    if(has_class(obj,'btn-primary'))
    {
        remove_class(obj, 'btn-primary');
        add_class(obj, 'btn-default');
    }
    else
    {
        remove_class(obj, 'btn-default');
        add_class(obj, 'btn-primary');
    }

    ajaxGetSpecInputArr();
}

//异步获取规格文本框：步骤1
function ajaxGetSpecInputArr(goods_id = 0)
{
    //用户选择的规格数组
    var spec_arr = {};
    //选中了哪些属性
    $(".btn-spec").each(function(){
        if($(this).hasClass('btn-primary'))
        {
            var attr_id = $(this).data('attr_id');
            var attr_value_id = $(this).data('attr_value_id');
            if(!spec_arr.hasOwnProperty(attr_id))
                spec_arr[attr_id] = [];
            spec_arr[attr_id].push(attr_value_id);
            console.log(spec_arr);
        }
    });
    ajaxGetSpecInput(spec_arr,goods_id)
}

//异步获取规格文本框：步骤2
function ajaxGetSpecInput(spec_arr,goods_id)
{
    $.post("/admin/goods/goods_attribute/attr_spec_input",{"spec_arr":spec_arr,goods_id:goods_id,_method:'POST',_token:LA.token},function(data){
        console.log(data)
        $("#spec_input_tab").html('')
        $("#spec_input_tab").append(data);
        hbdyg();  // 合并单元格
    })
}

// 合并单元格
function hbdyg() {
    var tab = document.getElementById("spec_input_table"); //要合并的tableID
    var maxCol = 3, val, count, start;  //maxCol：合并单元格作用到多少列
    if (tab != null) {
        for (var col = maxCol - 1; col >= 0; col--) {
            count = 1;
            val = "";
            for (var i = 0; i < tab.rows.length; i++) {
                if (val == tab.rows[i].cells[col].innerHTML) {
                    count++;
                } else {
                    if (count > 1) { //合并
                        start = i - count;
                        tab.rows[start].cells[col].rowSpan = count;
                        for (var j = start + 1; j < i; j++) {
                            tab.rows[j].cells[col].style.display = "none";
                        }
                        count = 1;
                    }
                    val = tab.rows[i].cells[col].innerHTML;
                }
            }
            if (count > 1) { //合并，最后几行相同的情况下
                start = i - count;
                tab.rows[start].cells[col].rowSpan = count;
                for (var j = start + 1; j < i; j++) {
                    tab.rows[j].cells[col].style.display = "none";
                }
            }
        }
    }
}