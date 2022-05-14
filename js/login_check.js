 
 

 


 window.addEventListener("load",function(){
   
   var btn = document.getElementById('btn_login');
  



   btn.addEventListener("click",function(){
       
      var email=document.getElementById("login-email").value;
      var password=document.getElementById("login-password").value;
      var errorMsg=document.getElementById("login_show");

      function myscript(){
         errorMsg.style.display="none";
       
         btn.disabled=false;
   
   
      }

     if(!email){

        
         errorMsg.style.display="block";
         errorMsg.innerHTML="Please Enter email";
         btn.disabled=true;
         document.getElementById("login-email").addEventListener("keypress",myscript);
}else if(!password){
  
         errorMsg.style.display="block";
         errorMsg.innerHTML="Please Enter password";
         btn.disabled=true;
         document.getElementById("login-password").addEventListener("keypress",myscript);
        
}
// else{
//    let formData = new FormData(document.forms.form_login);
//    formData.append(email, password);

 
//  var  xhttp=new XMLHttpRequest();
       
//        xhttp.onreadystatechange= function()
//        {
         
//            if(xhttp.readyState===xhttp.DONE)
//            {
//                if(xhttp.status===200)
//                {
                 
                    
//                   var response=JSON.parse(xhttp.response);
//                   alert(response.message);
                
//                   // window.location.href="index.php";
                    
//                  }

//            }
       
//         }

//        xhttp.open("POST","api/login_submit.php",false);
      
//        xhttp.send(formData);
//     }

    });
 







});

