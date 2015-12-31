function AlertIt(url) {

    // var answer = confirm ("Confirm Delete.")
    // if (answer)
    // window.location=url;

  confirm(function(e,btn){ //event + button clicked
    // e.preventDefault();
      window.location=url;
    });
   }


$(document).ready(function()//When the dom is ready 
{
  var contact_no1 = $("#contact_no").val();
  document.getElementById("submit").disabled = false;

$("#contact_no").change(function() 
{ //if theres a change in the username textbox


var contact_no = $("#contact_no").val();//Get the value in the username textbox

if((contact_no==contact_no1)&&(contact_no!='')){
  $("#availability_status").html('<a class="glyphicon glyphicon-ok" style="color:green"></a> <font color="Green">No Change </font>  ');
  document.getElementById("submit").disabled = false;
}else{

if(contact_no.length > 0){

$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "ajax_check_number.php",  //file name
    data: "contact_no="+ contact_no, //data
    success: function(server_response){  
   
 
  if(server_response == 0)//if ajax_check_username.php return value "0"
  { 
    // alert(server_response);
  $("#availability_status").html('<a class="glyphicon glyphicon-ok" style="color:green"></a> <font color="Green"> Available </font>  ');
  document.getElementById("submit").disabled = false;
  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == 1)//if it returns "1"
  {  
   $("#availability_status").html('<a class="glyphicon glyphicon-remove" style="color:red"></a> <font color="red">Not Available </font>');
   document.getElementById("submit").disabled = true;
  }  
    
} 
   
  }); 

}else{

$("#availability_status").html('<img src="images/not_available.png" align="absmiddle"> <font color="red">Please Enter</font>');
   document.getElementById("submit").disabled = true;

}

}


return false;
});

});

  
  function pop_up(url,windowName) {

       newwindow=window.open(url,windowName,'height=400,width=400');
       if (window.focus) {newwindow.focus()}
      
     }



   function copy_address_to_delivery(){
    
          
     document.getElementById('contact_shipping_address_number').value = document.getElementById('contact_address_number').value;
     document.getElementById('contact_shipping_address_street').value = document.getElementById('contact_address_street').value;
     document.getElementById('contact_shipping_address_city').value = document.getElementById('contact_address_city').value;
     document.getElementById('contact_shipping_address_district').value = document.getElementById('contact_address_district').value;


   }

   function copy_address_to_work(){

       document.getElementById('contact_work_address_number').value = document.getElementById('contact_address_number').value;
       document.getElementById('contact_work_address_street').value = document.getElementById('contact_address_street').value;
       document.getElementById('contact_work_address_city').value = document.getElementById('contact_address_city').value;
       document.getElementById('contact_work_address_district').value = document.getElementById('contact_address_district').value;

   }

   function copy_address_to_contact_fromwork(){

      document.getElementById('contact_address_number').value=document.getElementById('contact_work_address_number').value;
      document.getElementById('contact_address_street').value=document.getElementById('contact_work_address_street').value;
      document.getElementById('contact_address_city').value=document.getElementById('contact_work_address_city').value;
      document.getElementById('contact_address_district').value=document.getElementById('contact_work_address_district').value;

   }

   function copy_address_to_delivery_fromwork(){
  
     document.getElementById('contact_shipping_address_number').value=document.getElementById('contact_work_address_number').value;
     document.getElementById('contact_shipping_address_street').value=document.getElementById('contact_work_address_street').value;
     document.getElementById('contact_shipping_address_city').value=document.getElementById('contact_work_address_city').value;
     document.getElementById('contact_shipping_address_district').value=document.getElementById('contact_work_address_district').value;


   }