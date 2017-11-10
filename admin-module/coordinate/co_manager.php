<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html>  
 <head>  
  <title>EAA | Coordinator Manager</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <html xmlns="http://www.w3.org/1999/xhtml">
 
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
 <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
<style type="text/css">
  .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}

.jumbotron { 
    background-color: #f4511e; /* Orange */
    color: #ffffff;
}

</style>
 </head>  


 <body>  
  
  <div id="header-wrapper" class="header-slider">
  <header class="clearfix">
  <div class="jumbotron text-center">
    <div class="logo" align='center' >
      <img src="img/logo3.png" alt="" width="15%" />
    </div>
  <h1 class="home-slide-content" align='center'>
              Event<strong> Activity</strong>  analysis
            </h1>
              
             
   
   <h3 align="center">Coordinator Manager</h3> </div> 
   <div class="container" style="width:1000px;"> 
      <div class="table-responsive">
   

     
       </div>

    <br />
        <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Participates</h3>
                <div class="pull-right"><button type="button" name="add_event" id="event" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning btn-xs">Add Coordinator</button>
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>


    <div id="co_table">
     <table  class="table table-responsive table-bordered table-hover">
     	<thead>
      <tr class="filters">
 			<th><input type="text" class="form-control" placeholder="Name" disabled style="width: x"></th>
            <th><input type="text" class="form-control" placeholder="USN" disabled></th>
            <th><input type="text" class="form-control" placeholder="Contact No" disabled></th>
            <th><input type="text" class="form-control" placeholder="Event" disabled></th>
       <th >Options</th>
      </tr></thead>
      <?php
      require_once 'dbconfig.php';
      $query = "SELECT * FROM coordinator";
      $stmt = $DBcon->prepare( $query );
      $stmt->execute();
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
        extract($row);
        ?>
   <tbody>
      <tr>
       <td ><?php echo $row["name"]; ?></td>
       <td ><?php echo $row["usn"]; ?></td>
       <td ><?php echo $row["contact"]; ?></td>
       <td ><?php echo $row["event"]; ?></td>
       
       <td align='center'>
       <input type="button" name="view" value="view" id="<?php echo $row["name"]; ?>" class="btn btn-primary btn-xs view_data" />
        
       <input type="button" name="update" value="Update" id="<?php echo $row["name"]; ?>" class="btn btn-success btn-xs update_data" />
       <a class="delete_product" data-id="<?php echo $name; ?>" href="javascript:void(0)">
        <input type="button" name="delete" value="Delete" id="<?php echo $row["name"]; ?>" class="btn btn-danger btn-xs delete_data " /></a>
      <!-- <i class="glyphicon glyphicon-trash"></i>-->
     
       </td>
      </tr></tbody>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
  </div></div>


<!---Adding new co-->
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Register Coordinator </h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Coordinator Name</label>
     <input type="text" name="name" id="name" class="form-control" required placeholder="Name" />
     <br />
     <label>USN</label>
     <input type="text" name="usn" id="usn" class="form-control" required placeholder="usn" title="Valid USN e.g: 1RV16MCA70 / 1rv16mca77" />
     <br /> 
     <label>Contact No</label>
     <input type="text" name="contact" id="contact" class="form-control" required placeholder="Contact Numbers"/>
     <br />  
     <label>Email Id</label>
     <input type="text" name="email" id="email" class="form-control" required placeholder="Email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
     <br />
     <label>Department</label>
     <input type="text" name="dept" id="dept" class="form-control" required placeholder="Department" />
     <br />


                  <div class="form-group">
                <label>Category</label>
                <select class="form-control select2"  name="cat" id="cat" style="width: 100%;">
                  <option value="">--SELECT--</option>
                  <option value="Technical">Techinical</option>
                   <option value="Photography">Photography</option>
                   <option value="Entertainment">Entertainment</option>
                   <option value="Management">Management</option>
                   <option value="Games">Gaming</option>
                </select>
              </div>

      <label>Event</label>
     <input type="text" name="event" id="event" class="form-control" />
     <br />
     
         
   </div>
   <div class="modal-footer">
    <input type="submit" name="insert" id="insert" value="Save" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
   </form>
  </div>
 </div>
</div>



<!--Display Event Data-->
<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Coordinator Details</h4>
   </div>
   <!--modal detail body-->
   <div class="modal-body" id="co_detail">
    
   </div>

   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>



<!-- Modal - Update User details-->
<div id="update_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Register Event </h4>
   </div>
   <div class="modal-body">
    <form method="post" id="update_form" action="update.php">
     <label>Coordinator Name</label>
     <input type="text" name="update_name" id="update_name" class="form-control" />
     <br />
     <label>USN</label>
     <input type="text" name="update_usn" id="update_usn" class="form-control" title="Valid USN e.g: 1RV16MCA70 / 1rv16mca77" required />
     <br /> 
     <label>Contact No</label>
     <input type="text" name="update_contact" id="update_contact" class="form-control" required placeholder="Contact Numbers"/>
     <br />  
     <label>Email Id</label>
     <input type="text" name="update_email" id="update_email" class="form-control" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" />
     <br />
     <label>Department</label>
     <input type="text" name="update_dept" id="update_dept" class="form-control" required placeholder="Department" />
     <br />
     <label>Event</label>
     <input type="text" name="update_event" id="update_event" class="form-control" />
     <br />

   </div>
   <div class="modal-footer">
    <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
   </div>
   </form>
  </div>
 </div>
</div>

<script src="js/jquery-1.12-0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.min.js"></script>




<!--INSERT EVENT-->
<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Event name is required");  
  }  
  else if($('#usn').val() == '')  
  {  
   alert("USN is required");  
  }  
  else if($('#contact').val() == '')
  {  
   alert("Contact is required");  
  }
   else if($('#email').val() == '')
  {  
   alert("Email is required");  
  }
     else if($('#dept').val() == '')
  {  
   alert("Department is required");  
  }

   
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#co_table').html(data);  
    }  
   });  
  }  
 });


 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var co_name = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{co_name:co_name},
   success:function(data){
    $('#co_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>
<!--End of insertion-->

 
<!--Update Event-->
 <script>  
$(document).ready(function(){
 $('#update_form').on("submit", function(event){  
           event.preventDefault();  
  

                $.ajax({  
                     url:"update.php",  
                     method:"POST",  
                     data:$('#update_form').serialize(),  
                     beforeSend:function(){  
                          $('#update').val("Updating");  
                     },  
                     success:function(data){  
                          $('#update_form')[0].reset();  
                          $('#update_data_Modal').modal('hide');  
                          $('#co_table').html(data);  
                     }  
                });  
           
      });  
});
 

// Fetching the event data to update
 $(document).on('click', '.update_data', function(){
  //$('#dataModal').modal();
  var co_name = $(this).attr("id");
  $.ajax({
   url:"readEvent.php",
   method:"POST",
   data:{co_name:co_name},

   success:function (data, status) 
      {
            // PARSE json data
              var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_name").val(user.name);
            $("#update_usn").val(user.usn);
            $("#update_contact").val(user.contact);
            $("#update_email").val(user.email);
            $("#update_dept").val(user.dept);
            $("#update_event").val(user.event);
            
           $("#update_data_Modal").modal("show");
        }

  }); 
  });
 
  </script>
  <!--End of update event-->
 


<!--Delete Event-->
<script>
  $(document).ready(function(){
    
    $('.delete_product').click(function(e){
      
      e.preventDefault();
      
      var pid = $(this).attr('data-id');
      var parent = $(this).parent("td").parent("tr");
      
      bootbox.dialog({
        message: "Are you sure you want to Delete ?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
        buttons: {
        success: {
          label: "No",
          className: "btn-success",
          callback: function() {
           $('.bootbox').modal('hide');
          }
        },
        danger: {
          label: "Delete!",
          className: "btn-danger",
          callback: function() {
            
         
            $.post('delete.php', { 'delete':pid })
            .done(function(response){
              bootbox.alert(response);
              parent.fadeOut('slow');
            })
            .fail(function(){
              bootbox.alert('Something Went Wrog ....');
            })
                        
          }
        }
        }
      });
      
      
    });
    
  });
</script>
<!--End of delete event-->



 <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75591362-1', 'auto');
    ga('send', 'pageview');

</script>

			<script type="text/javascript">
			  $(document).ready(function(){
			    $('.filterable .btn-filter').click(function(){
			        var $panel = $(this).parents('.filterable'),
			        $filters = $panel.find('.filters input'),
			        $tbody = $panel.find('.table tbody');
			        if ($filters.prop('disabled') == true) {
			            $filters.prop('disabled', false);
			            $filters.first().focus();
			        } else {
			            $filters.val('').prop('disabled', true);
			            $tbody.find('.no-result').remove();
			            $tbody.find('tr').show();
			        }
			    });

			    $('.filterable .filters input').keyup(function(e){
			        /* Ignore tab key */
			        var code = e.keyCode || e.which;
			        if (code == '9') return;
			        /* Useful DOM data and selectors */
			        var $input = $(this),
			        inputContent = $input.val().toLowerCase(),
			        $panel = $input.parents('.filterable'),
			        column = $panel.find('.filters th').index($input.parents('th')),
			        $table = $panel.find('.table'),
			        $rows = $table.find('tbody tr');
			        /* Dirtiest filter function ever ;) */
			        var $filteredRows = $rows.filter(function(){
			            var value = $(this).find('td').eq(column).text().toLowerCase();
			            return value.indexOf(inputContent) === -1;
			        });
			        /* Clean previous no-result if exist */
			        $table.find('tbody .no-result').remove();
			        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
			        $rows.show();
			        $filteredRows.hide();
			        /* Prepend no-result row if all rows are filtered */
			        if ($filteredRows.length === $rows.length) {
			            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
			        }
			    });
			});
			</script>

 </body>  
</html>  