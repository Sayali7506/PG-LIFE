
 window.addEventListener("load",function(){
   
    var btn = document.getElementById('btn_signup');
    var text="Welcome To PG-LIFE";
    var count=0;
     typewriter();
     
     
      setTimeout(typewriter,5000);
  
   
    
    
    function typewriter(){
     
      document.getElementById('welcome-heading').innerHTML+=text.charAt(count);
      count++;
      if(count<text.length){
         setTimeout(typewriter,200);
      }else{
         document.getElementById("welcome-heading").style.textShadow = "5px 5px 10px #a7146ff7,5px 2px 10px #4838e7";
      }
     
      
 
 
   }
   
   
   
 
 
 
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
            document.getElementById("female").disabled=true;

         }
        else if(document.getElementById("female").checked){
         document.getElementById("male").disabled=true;

         gender_value="female";
         myscript();
        }
        else{

        
         errorMsg.style.display="block";
          errorMsg.innerHTML="Please Enter gender";
          btn.disabled=true;

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

   }

      
        
         
        


   
  });
  });
 