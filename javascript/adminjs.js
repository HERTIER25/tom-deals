var loginForm= document.querySelector('.login_form') ;

 btnlogin=loginForm.querySelector('.submit-btn');
 var password_container=document.querySelector('.incorrect-password');
 password_error=password_container.querySelector('.password-error');
 loginForm.onsubmit=(e)=>{
     e.preventDefault();
 }

btnlogin.onclick=()=>{
     let xhr=new XMLHttpRequest()//creating xml object
     xhr.open("POST",'../Admin-pannel/admin_get_login.php',true);
     xhr.onload=()=>{
         if(xhr.readyState===XMLHttpRequest.DONE && xhr.status===200){
             let dataResponse=xhr.response;
            if ( dataResponse==="success")
            {
             location.href="../Admin-pannel/admin-home.php";
            }
            else
            {
                password_error.innerHTML=dataResponse;
            }
         }
     }
     //i can send Form data through ajax to php
     let formData=new FormData(loginForm);
     xhr.send(formData);
 }
$(document).ready(function(){
    $('#action_menu_btn').click(function(){
        $('.action_menu').toggle();
    });
});
