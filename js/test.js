$(document).ready(function(){
    var baseurl="api.php?";
    var urlGet=baseurl+'id=33';
    $.getJSON(urlGet,function(data){
        $.each(data,function(i,d){
        })
    })
})