var client= document.querySelector('.typing-areas');
var send_message_btns=document.querySelector('.send_btns');
var message_fild=document.querySelector('.type-msgs');
var message_body=document.querySelector('.msg_card_bodys');


client .onsubmit=(e)=>{
  e.preventDefault();
}

send_message_btns.onclick=()=>{
    let xhr=new XMLHttpRequest() //creating xml object
    xhr.open("POST",'../Admin-pannel/admin_insert.php',true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                console.log(data);
               message_fild.value="";
            }
        }
    }
    //i can send Form data through ajax to php
    let formDatas=new FormData(client);
    xhr.send(formDatas);

}
//
setInterval(()=>{
    let xhr=new XMLHttpRequest() //creating xml object
    xhr.open("POST",'../Admin-pannel/get_message_admin.php',true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                message_body.innerHTML=data;
            }
        }
    }
    //i can send Form data through ajax to php
    let formData=new FormData(client);
    xhr.send(formData);
},100);
