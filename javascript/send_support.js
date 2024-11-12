  var send_form=document.querySelector('.support_form');
  send_btn=send_form.querySelector('.sendbtn');
  var send_text=document.querySelector('.send_text');
  var  alert_message= send_form.querySelector('#alert_m');
  send_form.onsubmit=(e)=>
  {
    e.preventDefault();
  }

  send_btn.onclick=()=>
  {
      let xhr=new XMLHttpRequest() //creating xml object
      xhr.open("POST",'../pages/send_support.php',true);
      xhr.onload=()=>{
          if(xhr.readyState===XMLHttpRequest.DONE){
              if(xhr.status===200){
               let data=xhr.response;
               console.log(data);
                   if (data==='success')
                   {
                       alert_message.style.color = "white";
                       alert_message.style.backgroundColor= "red";
                       alert_message.innerHTML ="Your Message has been sent.";
                       send_text.value="";
                   }
                   else
                   {
                       alert_message.style.color = "white";
                       alert_message.style.backgroundColor= "red";
                       alert_message.innerHTML ="message not sent";
                       send_text.value="";
                   }
              }
          }
      }
      //i can send Form data through ajax to php
      let formDataa=new FormData(send_form);
      xhr.send(formDataa);
  }

