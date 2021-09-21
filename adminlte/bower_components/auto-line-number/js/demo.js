$(function() {
    /**
     * 添加textarea 标签自动添加行号
     */
    $("textarea").setTextareaCount({
        width: "20px",
        bgColor: bgColor != undefined? bgColor: "#999",
        color: "#FFF",
        display: "inline-block"
    });
})