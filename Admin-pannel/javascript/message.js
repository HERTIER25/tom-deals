var add_form=document.querySelector('.add_form');
add_button =add_form.querySelector('.btt');
alerts =add_form.querySelector('.alerts');

add_form.onsubmit=(e)=>
{
  e.preventDefault();
}
add_button.onclick=()=>
{
    let xhr=new XMLHttpRequest() //creating xml object
    xhr.open("POST",'../Admin-pannel/add_insert.php',true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                console.log(data);
                alerts.innerHTML=data;

               // message_fild.value="";
            }
        }
    }
    //i can send Form data through ajax to php
    let formDataa=new FormData(add_form);
    xhr.send(formDataa);
}
