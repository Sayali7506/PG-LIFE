
 window.addEventListener("load",function(){
   
    var btn = document.getElementById('btn_signup');
   
 
 
 
    btn.addEventListener("click",function(){
      var name=document.getElementById("signup-name").value;
       var email=document.getElementById("signup-email").value;
       var phone=document.getElementById("signup-phone").value;
       var password=document.getElementById("signup-password").value;
       var college_name=document.getElementById("signup-college").value;
      var errorMsg=document.getElementById("signup_show");
      var gender=getGender();
      function getGender(){
         var gender_value;
         if(document.getElementById("male").checked){
            gender_value="male";
            myscript();

         }
        else if(document.getElementById("female").checked){

         gender_value="female";
         myscript();
        }
        else{

         gender_value=null;

        }


      

            return gender_value;
         }
 
       function myscript(){

          errorMsg.style.display="none";
        
          btn.disabled=false;
    
    
       }
       if(!name){
         errorMsg.style.display="block";
         errorMsg.innerHTML="Please Enter Full Name";
         btn.disabled=true;
         document.getElementById("signup-name").addEventListener("keypress",myscript);

       }else if(!email){
 
         
          errorMsg.style.display="block";
          errorMsg.innerHTML="Please Enter email";
          btn.disabled=true;
          document.getElementById("signup-email").addEventListener("keypress",myscript);
      }
      else if(!phone){
         errorMsg.style.display="block";
          errorMsg.innerHTML="Please Enter Phone";
          btn.disabled=true;
          document.getElementById("signup-phone").addEventListener("keypress",myscript);

      }      
      else if(!password){
   
          errorMsg.style.display="block";
          errorMsg.innerHTML="Please Enter password";
          btn.disabled=true;
          document.getElementById("signup-password").addEventListener("keypress",myscript);
         
   }else if(!college_name){
      errorMsg.style.display="block";
          errorMsg.innerHTML="Please Enter College Name";
          btn.disabled=true;
          document.getElementById("signup-college").addEventListener("keypress",myscript);

   }else if(!gender){

      errorMsg.style.display="block";
          errorMsg.innerHTML="Please Enter gender";
          btn.disabled=true;
          getGender();
         
        


   }//else{
      
       
 
    
     
     
   //   var  xhttp=new XMLHttpRequest();
        
   //      xhttp.onreadystatechange= function()
   //      {
          
   //          if(xhttp.readyState===xhttp.DONE)
   //          {
   //              if(xhttp.status===200)
   //              {
                    
                     
   //                   var response = JSON.parse(xhttp.responseText);
   //                   if (response.success) {
   //                    errorMsg.innerHTML=response.message;
                      
   //                   } else 
   //                   {
   //                    errorMsg.innerHTML=response.message;
   //                   }
   //                }
 
   //          }
        
   //       }
   //      xhttp.open("POST","api/login_submit.php");
   //      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //      xhttp.send("x="+obj);
   //     }
 
    });
  
 
 
 
 
 
 
 
 });