
$(document).ready(function()   
{

if(   document.getElementById("calllog_view").checked==true){
      document.getElementById("calllog_add").disabled = false;
      document.getElementById("calllog_edit").disabled = false;
      document.getElementById("calllog_delete").disabled = false;}

if(   document.getElementById("contact_view").checked==true){
      document.getElementById("contact_add").disabled = false;
      document.getElementById("contact_edit").disabled = false;
      document.getElementById("contact_delete").disabled = false; }  

if(   document.getElementById("account_view").checked==true){
      document.getElementById("account_add").disabled = false;
      document.getElementById("account_edit").disabled = false;
      document.getElementById("account_delete").disabled = false;} 

if(   document.getElementById("sales_view").checked==true){
      document.getElementById("sales_add").disabled = false;
      document.getElementById("sales_edit").disabled = false;
      document.getElementById("sales_delete").disabled = false;}

if(   document.getElementById("ticket_view").checked==true){
      document.getElementById("ticket_add").disabled = false;
      document.getElementById("ticket_edit").disabled = false;
      document.getElementById("ticket_delete").disabled = false;}   

// if(   document.getElementById("user_view").checked==true){
//       document.getElementById("user_add").disabled = false;
//       document.getElementById("user_edit").disabled = false;
//       document.getElementById("user_delete").disabled = false;  } 

// if(  document.getElementById("group_view").checked==true){
//       document.getElementById("group_add").disabled = false;
//       document.getElementById("group_edit").disabled = false;
//       document.getElementById("group_delete").disabled = false;  }               


$("#calllog_view").change(function() 
{
  if( document.getElementById("calllog_view").checked==true){
      document.getElementById("calllog_add").disabled = false;
      document.getElementById("calllog_edit").disabled = false;
      document.getElementById("calllog_delete").disabled = false;

}else{
     document.getElementById("calllog_add").disabled = true;
     document.getElementById("calllog_edit").disabled = true;
     document.getElementById("calllog_delete").disabled = true;
}
}); 

$("#contact_view").change(function() 
{
  if( document.getElementById("contact_view").checked==true){
      document.getElementById("contact_add").disabled = false;
      document.getElementById("contact_edit").disabled = false;
      document.getElementById("contact_delete").disabled = false;

}else{
     document.getElementById("contact_add").disabled = true;
     document.getElementById("contact_edit").disabled = true;
     document.getElementById("contact_delete").disabled = true;
}
}); 

$("#account_view").change(function() 
{
  if( document.getElementById("account_view").checked==true){
      document.getElementById("account_add").disabled = false;
      document.getElementById("account_edit").disabled = false;
      document.getElementById("account_delete").disabled = false;

}else{
     document.getElementById("account_add").disabled = true;
     document.getElementById("account_edit").disabled = true;
     document.getElementById("account_delete").disabled = true;
}
});

$("#sales_view").change(function() 
{
  if( document.getElementById("sales_view").checked==true){
      document.getElementById("sales_add").disabled = false;
      document.getElementById("sales_edit").disabled = false;
      document.getElementById("sales_delete").disabled = false;

}else{
     document.getElementById("sales_add").disabled = true;
     document.getElementById("sales_edit").disabled = true;
     document.getElementById("sales_delete").disabled = true;
}
});

$("#ticket_view").change(function() 
{
  if( document.getElementById("ticket_view").checked==true){
      document.getElementById("ticket_add").disabled = false;
      document.getElementById("ticket_edit").disabled = false;
      document.getElementById("ticket_delete").disabled = false;

}else{
     document.getElementById("ticket_add").disabled = true;
     document.getElementById("ticket_edit").disabled = true;
     document.getElementById("ticket_delete").disabled = true;
}
});

// $("#user_view").change(function() 
// {
//   if( document.getElementById("user_view").checked==true){
//       document.getElementById("user_add").disabled = false;
//       document.getElementById("user_edit").disabled = false;
//       document.getElementById("user_delete").disabled = false;

// }else{
//      document.getElementById("user_add").disabled = true;
//      document.getElementById("user_edit").disabled = true;
//      document.getElementById("user_delete").disabled = true;
// }
// });

// $("#group_view").change(function() 
// {
//   if( document.getElementById("group_view").checked==true){
//       document.getElementById("group_add").disabled = false;
//       document.getElementById("group_edit").disabled = false;
//       document.getElementById("group_delete").disabled = false;

// }else{
//      document.getElementById("group_add").disabled = true;
//      document.getElementById("group_edit").disabled = true;
//      document.getElementById("group_delete").disabled = true;
// }
// });




});