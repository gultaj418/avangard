function deleteRow(button,blogId,productId){
// console.log(button);
// console.log(button.parentElement.nodeName); 
console.log(blogId);
console.log(productId);
let data = {};
if(blogId == null){
    data = {
        'productId':productId
    } 
} else if(productId == null){
    data = {
        'blogId':blogId
    }
}
$.ajax({
    url: "delete.php", 
    method:"POST",

    data:data,

    success:function(data){
        console.log(data);
        alert(data);

        $(button).parent().remove();
        // console.log($(button).parent());
        // console.log($(button));
        // console.log(button);
        // console.log(button.parentElement.nodeName);

    }
})

}

function deleteMediaLink(button,socialMediaId){

    $.ajax({
        url: "delete.php", 
        method:"POST",
    
        data:{
            socialMediaId:socialMediaId
        },
    
        success:function(data){
            console.log(data);
            alert(data);
    
            $(button).parent().remove();
            // console.log($(button).parent());
            // console.log($(button));
            // console.log(button);
            // console.log(button.parentElement.nodeName);
    
        }
    })
    

}
