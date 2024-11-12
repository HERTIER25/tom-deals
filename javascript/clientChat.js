var clientForm= document.querySelector('.typing-area');
var send_message_btn=document.querySelector('.send_btn');
var message_fild=document.querySelector('.type_msg');
var message_body=document.querySelector('.msg_card_body');
clientForm .onsubmit=(e)=>{
    e.preventDefault();
 }
 send_message_btn .onclick=()=>{
        let xhr=new XMLHttpRequest() //creating xml object
        xhr.open("POST",'../pages/message_insert.php',true);
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
        let formData=new FormData(clientForm);
        xhr.send(formData);
    }

setInterval(()=>{
    let xhr=new XMLHttpRequest() //creating xml object
    xhr.open("POST",'../pages/get_chart.php',true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data=xhr.response;
                message_body.innerHTML=data;
            }
        }
    }
    //i can send Form data through ajax to php
    let formData=new FormData(clientForm);
    xhr.send(formData);
},100);

