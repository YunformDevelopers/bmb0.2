<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>


<script type="text/javascript" src="../js/jQuery.js"></script>
<script >
function FixTable(TableID, FixColumnNumber, width, height) {
    /// <summary>
    ///     锁定表头和列
    ///     <para> sorex.cnblogs.com </para>
    /// </summary>
    /// <param name="TableID" type="String">
    ///     要锁定的Table的ID
    /// </param>
    /// <param name="FixColumnNumber" type="Number">
    ///     要锁定列的个数
    /// </param>
    /// <param name="width" type="Number">
    ///     显示的宽度
    /// </param>
    /// <param name="height" type="Number">
    ///     显示的高度
    /// </param>
    if ($("#" + TableID + "_tableLayout").length != 0) {
        $("#" + TableID + "_tableLayout").before($("#" + TableID));
        $("#" + TableID + "_tableLayout").empty();
    }
    else {
        $("#" + TableID).after("<div id='" + TableID + "_tableLayout' style='overflow:hidden;height:" + height + "px; width:" + width + "px;'></div>");
    }
 
    $('<div id="' + TableID + '_tableFix"></div>'
    + '<div id="' + TableID + '_tableHead"></div>'
    + '<div id="' + TableID + '_tableColumn"></div>'
    + '<div id="' + TableID + '_tableData"></div>').appendTo("#" + TableID + "_tableLayout");
 
 
    var oldtable = $("#" + TableID);
 
    var tableFixClone = oldtable.clone(true);
    tableFixClone.attr("id", TableID + "_tableFixClone");
    $("#" + TableID + "_tableFix").append(tableFixClone);
    var tableHeadClone = oldtable.clone(true);
    tableHeadClone.attr("id", TableID + "_tableHeadClone");
    $("#" + TableID + "_tableHead").append(tableHeadClone);
    var tableColumnClone = oldtable.clone(true);
    tableColumnClone.attr("id", TableID + "_tableColumnClone");
    $("#" + TableID + "_tableColumn").append(tableColumnClone);
    $("#" + TableID + "_tableData").append(oldtable);
 
    $("#" + TableID + "_tableLayout table").each(function () {
        $(this).css("margin", "0");
    });
 
 
    var HeadHeight = $("#" + TableID + "_tableHead thead").height();
    HeadHeight += 2;
    $("#" + TableID + "_tableHead").css("height", HeadHeight);
    $("#" + TableID + "_tableFix").css("height", HeadHeight);
 
 
    var ColumnsWidth = 0;
    var ColumnsNumber = 0;
    $("#" + TableID + "_tableColumn tr:last td:lt(" + FixColumnNumber + ")").each(function () {
        ColumnsWidth += $(this).outerWidth(true);
        ColumnsNumber++;
    });
    ColumnsWidth += 2;
    if ($.browser.msie) {
        switch ($.browser.version) {
            case "7.0":
                if (ColumnsNumber >= 3) ColumnsWidth--;
                break;
            case "8.0":
                if (ColumnsNumber >= 2) ColumnsWidth--;
                break;
        }
    }
    $("#" + TableID + "_tableColumn").css("width", ColumnsWidth);
    $("#" + TableID + "_tableFix").css("width", ColumnsWidth);
 
 
    $("#" + TableID + "_tableData").scroll(function () {
        $("#" + TableID + "_tableHead").scrollLeft($("#" + TableID + "_tableData").scrollLeft());
        $("#" + TableID + "_tableColumn").scrollTop($("#" + TableID + "_tableData").scrollTop());
    });
 
    $("#" + TableID + "_tableFix").css({ "overflow": "hidden", "position": "relative", "z-index": "50", "background-color": "Silver" });
    $("#" + TableID + "_tableHead").css({ "overflow": "hidden", "width": width - 17, "position": "relative", "z-index": "45", "background-color": "Silver" });
    $("#" + TableID + "_tableColumn").css({ "overflow": "hidden", "height": height - 17, "position": "relative", "z-index": "40", "background-color": "Silver" });
    $("#" + TableID + "_tableData").css({ "overflow": "scroll", "width": width, "height": height, "position": "relative", "z-index": "35" });
 
    if ($("#" + TableID + "_tableHead").width() > $("#" + TableID + "_tableFix table").width()) {
        $("#" + TableID + "_tableHead").css("width", $("#" + TableID + "_tableFix table").width());
        $("#" + TableID + "_tableData").css("width", $("#" + TableID + "_tableFix table").width() + 17);
    }
    if ($("#" + TableID + "_tableColumn").height() > $("#" + TableID + "_tableColumn table").height()) {
        $("#" + TableID + "_tableColumn").css("height", $("#" + TableID + "_tableColumn table").height());
        $("#" + TableID + "_tableData").css("height", $("#" + TableID + "_tableColumn table").height() + 17);
    }
 
    $("#" + TableID + "_tableFix").offset($("#" + TableID + "_tableLayout").offset());
    $("#" + TableID + "_tableHead").offset($("#" + TableID + "_tableLayout").offset());
    $("#" + TableID + "_tableColumn").offset($("#" + TableID + "_tableLayout").offset());
    $("#" + TableID + "_tableData").offset($("#" + TableID + "_tableLayout").offset());
}


</script>

</head>

<body>

<table id="manage-table"  style="border:solid 1px #000;">
			<script type="text/javascript">
            $(document).ready(function () {
                        FixTable("manage-table", 2, 500, 500);
                    });
            
                        
            </script>

                <tr id="th">
                    <th>&nbsp;</th>
                    <th>填写时间</th>
                    <th>Q1:姓名</th>
                    <th>Q2:学号</th>
                    <th>Q3:班级</th>
                    <th>Q4:请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</th>
                    <th>Q5:请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</th>
                    <th>Q6:请问你的梦想是什么呢？你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</th>
                </tr>
                <tr>
                    <td>24</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                    <td>你是怎么走到这个舞台上的？能和我们说说吗？我培养过一个冠军。欢迎你加入阿妹family！</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>5.28/09:00</td>
                    <td>卢智雄</td>
                    <td>3120103599</td>
                    <td>科创1201</td>
                </tr>
    
            </table>

</body>
<a href="http://www.cnblogs.com/sorex/archive/2011/06/30/2093499.html" style="position:fixed; left:600px; top:200px;"></a>

</html>