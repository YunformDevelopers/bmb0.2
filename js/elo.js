function FixTable(TableID, FixColumnNumber, width, height) {
    var table_layout = $('#' + TableID + "_tableLayout");
    var raw_table = $("#" + TableID);
    initTableLayout(table_layout, raw_table, TableID, height, width);
    // Refresh the selector
    table_layout = $(table_layout.selector);
    injectDivs(TableID, table_layout);
    var table_fix = $('#' + TableID + '_tableFix');
    var table_col = $('#' + TableID + '_tableColumn');
    var table_head = $('#' + TableID + '_tableHead');
    var table_data = $('#' + TableID + '_tableData');
    cloneRawTable(raw_table, TableID, table_fix, table_head, table_col, table_data);
    setTableMargin(table_layout);
    setRowHeight(table_head, table_fix);
    setColWidth(TableID, FixColumnNumber, table_col, table_fix);
    setScrollBehavior(table_data, table_head, table_col);
    fitCSS(table_fix, table_head, table_col, table_data, width, height);
    adjustHeadWidth(table_fix, table_head, table_data);
    adjustColHeight(table_col, table_data);
    adjustOffset(table_layout, table_fix, table_head, table_col, table_data);
}

function setTableMargin(table_layout) {
    table_layout.find('table').each(function () {
        $(this).css("margin", "0");
    });
}

function injectDivs(TableID, table_layout) {
    $('<div id="' + TableID + '_tableFix"></div>'
        + '<div id="' + TableID + '_tableHead"></div>'
        + '<div id="' + TableID + '_tableColumn"></div>'
        + '<div id="' + TableID + '_tableData"></div>').appendTo(table_layout);
}

function setScrollBehavior(table_data, table_head, table_col) {
    table_data.scroll(function () {
        table_head.scrollLeft(table_data.scrollLeft());
        table_col.scrollTop(table_data.scrollTop());
    });
}

function setColWidth(TableID, FixColumnNumber, table_col, table_fix) {
    var ColumnsWidth = 0;
    var ColumnsNumber = 0;
    $("#" + TableID + "_tableColumn tr:last td:lt(" + FixColumnNumber + ")").each(function () {
        ColumnsWidth += $(this).outerWidth(true);
        ColumnsNumber++;
    });
    ColumnsWidth += 2;
//  TODO Write new IE-supporting code here
//            if ($.browser.msie) {
//                switch ($.browser.version) {
//                    case "7.0":
//                        if (ColumnsNumber >= 3) ColumnsWidth--;
//                        break;
//                    case "8.0":
//                        if (ColumnsNumber >= 2) ColumnsWidth--;
//                        break;
//                }
//            }
//  TODO Change ColumnsWidth to fit your table.
    table_col.css("width", ColumnsWidth);
    table_fix.css("width", ColumnsWidth);
}

function setRowHeight(table_head, table_fix) {
//  FIXME This FUCKING selector used "thead", but it's "th" in HTML
    var HeadHeight = table_head.find("th").height();
    HeadHeight += 2;
//  TODO Change HeadHeight to fit your table.
    table_head.css("height", HeadHeight);
    table_fix.css("height", HeadHeight);
}

function initTableLayout(table_layout, raw_table, TableID, height, width) {
    if (table_layout.length != 0) {
        table_layout.before(raw_table);
        table_layout.empty();
    }
    else {
        raw_table.after("<div " +
            "id='" + TableID + "_tableLayout' " +
            "style='overflow:hidden;" +
            "height:" + height + "px;" +
            "width:" + width + "px;'></div>");
    }
}

function cloneRawTable(raw_table, TableID, table_fix, table_head, table_col, table_data) {
    var tableFixClone = raw_table.clone(true);
    tableFixClone.attr("id", TableID + "_tableFixClone");
    table_fix.append(tableFixClone);
    var tableHeadClone = raw_table.clone(true);
    tableHeadClone.attr("id", TableID + "_tableHeadClone");
    table_head.append(tableHeadClone);
    var tableColumnClone = raw_table.clone(true);
    tableColumnClone.attr("id", TableID + "_tableColumnClone");
    table_col.append(tableColumnClone);
    table_data.append(raw_table);
}

function adjustColHeight(table_col, table_data) {
    var table_col_table = table_col.find('table');
    if (table_col.height() > table_col_table.height()) {
        table_col.css("height", table_col_table.height());
        table_data.css("height", table_col_table.height() + 17);
    }
}

function adjustHeadWidth(table_fix, table_head, table_data) {
    var table_fix_table = table_fix.find('table');
    if (table_head.width() > table_fix_table.width()) {
        table_head.css("width", table_fix_table.width());
        table_data.css("width", table_fix_table.width() + 17);
    }
}

function adjustOffset(table_layout, table_fix, table_head, table_col, table_data) {
    var layout_offset = table_layout.offset();
    table_fix.offset(layout_offset);
    table_head.offset(layout_offset);
    table_col.offset(layout_offset);
    table_data.offset(layout_offset);
}

function fitCSS(table_fix, table_head, table_col, table_data, width, height) {
    var table_fix_css = { "overflow": "hidden",
        "position": "relative",
        "z-index": "50",
        "background-color": "Silver" };
    var table_head_css = { "overflow": "hidden",
        "width": width - 17,
        "position": "relative",
        "z-index": "45",
        "background-color": "Silver" };
    var table_col_css = { "overflow": "hidden",
        "height": height - 17,
        "position": "relative",
        "z-index": "40",
        "background-color": "Silver" };
    var table_data_css = { "overflow": "scroll",
        "width": width,
        "height": height,
        "position": "relative",
        "z-index": "35" };

    table_fix.css(table_fix_css);
    table_head.css(table_head_css);
    table_col.css(table_col_css);
    table_data.css(table_data_css);
}
