const search = document.getElementsByClassName("search")[0];
const form_search = document.getElementsByClassName("form-search")[0]; 
const closebtn = document.querySelector(".close");

search.onclick = function(e){
    console.log(form_search);
    if(form_search.style.display = "none"){
        form_search.style.display = "block";
    }    
}

closebtn.onclick = function(){
    form_search.style.display = "none";
}

var arr = document.querySelectorAll(".tab .btn");
var content = document.querySelectorAll(".tab-item");
arr.forEach((btn, index)=>{
    btn.onclick = function(){
        const item_btn = document.querySelector(".tab .btn.active");
        const item_content = document.querySelector(".tab-item.checked");
        if(!content[index].classList.contains("checked")){
            item_btn.classList.remove("active");
            item_content.classList.remove("checked");
            btn.classList.add("active");
            content[index].classList.add("checked");
        }
    }
})

// $(window).scroll(function() {
//     $(".slideanim").each(function(){
//       var pos = $(this).offset().top;

//       var winTop = $(window).scrollTop();
//         if (pos < winTop + 600) {
//           $(this).addClass("slide");
//         }
//     });
//   });

const toTop = document.getElementById("to-top");
window.onscroll = function(){
    if(document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
        toTop.style.opacity = "1";
    }else{
        toTop.style.opacity= "0";
    }
}

$("#to-top").click(function() {
    $('html, body').animate({scrollTop: 0}, 400);
    return false;
})