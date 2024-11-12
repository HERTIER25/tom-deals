

//DROPING TOP MAIN NAVIGATION BAR
var topDrop=document.getElementsByClassName('fa-bars-top')[0]
var navNavLeft=document.getElementsByClassName('nav-navLeft')[0]

topDrop.addEventListener('click', () => {
    navNavLeft.classList.toggle('active')
})



//DROPIN SIDE NAVIGATION BAR
    var SideDrop=document.getElementsByClassName('fa-bars-side')[0]
    var SideNav=document.getElementsByClassName('side-nav')[0]
 var contains=document.querySelector('.container');
  rowss=contains.querySelector('.rows');
var mainbody=document.querySelector('.main-body');
var nav2=document.querySelector('.nav-2');
var bodycontainer =document.querySelector('.body-container');



    
    SideDrop.addEventListener('click', () => {
        SideNav.classList.toggle('active')
    })

var search_form=document.querySelector('.search_form');
search_form.onsubmit=(e)=>
{
  e.preventDefault();
}
search_btn=search_form.querySelector('.sbtn');
search_fields=search_form.querySelector('.search_field');
search_btn.onclick=()=>
{
    let xhr=new XMLHttpRequest() //creating xml object
    xhr.open("POST",'../pages/search_page.php',true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
           let data=xhr.response;
                rowss.innerHTML=data;
                search_fields.value="";
           mainbody.style.display='none';
           nav2.style.display='none';
           bodycontainer.append(rowss);
            }
        }
    }
    //i can send Form data through ajax to php
    let formData=new FormData(search_form);
    xhr.send(formData);
}





