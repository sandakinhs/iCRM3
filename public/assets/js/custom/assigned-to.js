
     $(document).ready(function(){
       
         var value = $("#group_id").val();
         var token =$("#_token").val();

         //alert(root_url+'other/assignedto');

         $.ajax({
            type: 'post',
            url: root_url+ 'other/assignedto',
            data:{"_token": token,"user_group": value},

            success: function () {
                // alert('form was submitted');
                $("#assignedto").load( root_url+"other/assignedto");
                evt.preventDefault();
            },
             error: function(xhr, textStatus, error){
                 alert(error);
             }
          });
    });


function load_assignedto(){

    var value = $("#group_id").val();
    var token =$("#_token").val();



         $.ajax({
            type: 'post',
            url: root_url+ 'other/assignedto',
             data:{"_token": token,"user_group": value},

            success: function () {
              // alert('form was submitted');
                $("#assignedto").load(root_url+"other/assignedto");
                evt.preventDefault();
            },
             error: function(xhr, textStatus, error){
                 alert(error);
             }
          });

}    