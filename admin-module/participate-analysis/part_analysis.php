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
  <title>EAA | Event Manager</title> 
 <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <html xmlns="http://www.w3.org/1999/xhtml">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  
 <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--<style type="text/css">
  body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
</style>-->
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
        <h1 class="home-slide-content" align='center'> Participent<strong> Analysis</strong>  </h1>
   </div>
              <!--<div id="event_table">
            <table calss="table table-bordered">
            <tr>
            <th width="70%">Event Manager</th>
            <th width="30%"> <button type="button" name="add_event" id="event" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Event</button></th>
            </tr>
              </table>
              </div>-->
             
  <div class="container" style="width:800px;">  
   <!-- <div class="table-responsive">
    <div align="right">
     <button type="button" name="add_event" id="event" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Event</button>
    </div> -->

    <br />
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Participates</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>

    
    <div id="event_table">

     
     <table  class="table table-responsive table-bordered table-hover ">
      <thead >
        <tr class="filters" bgcolor="">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="USN" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Event" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Contact" disabled></th>
                        <th>View</th>
                       
                    </tr>

       </tr>
      </thead>
      <?php
      require_once 'dbconfig.php';
      $query = "SELECT * FROM register";
      $stmt = $DBcon->prepare( $query );
      $stmt->execute();
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
        extract($row);
        ?>
    <tbody>
          <tr>
       <td align='center'><?php echo $row["id"]; ?></td>
       <td align='center'><?php echo $row["name"]; ?></td>
       <td align='center'><?php echo $row["usn"]; ?></td>
       <td align='center'><?php echo $row["event"]; ?></td>
       <td align='center'><?php echo $row["ph_no"]; ?></td>
       <td align='center'>
       <input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-primary btn-xs view_data" />
        
        <!-- <i class="glyphicon glyphicon-trash"></i>-->
     
       </td>
      </tr>
      </tbody>

      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
          </div>
    </div>


<!---Adding new Event
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Register Event </h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Event Name</label>
     <input type="text" name="name" id="name" class="form-control" />
     <br />
     <label>Department</label>
     <input type="text" name="dept" id="dept" class="form-control"/>
     <br /> 
     <label>Entry Fees</label>
     <input type="text" name="fee" id="fee" class="form-control" />
     <br />  
     <label>Total participent</label>
     <input type="text" name="part" id="part" class="form-control" />
     <br />
     <label>Description</label>
     <input type="text" name="des" id="des" class="form-control" />
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
     
          <label>Event Prize</label>
     <input type="text" name="prize" id="Prize" class="form-control" />
     <br />

   </div>
   <div class="modal-footer">
    <input type="submit" name="insert" id="insert" value="Save" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
   </form>
  </div>
 </div>
</div> -->



<!--Display participent Data-->
<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Participent Details</h4>
   </div>
   <!--modal detail body-->
   <div class="modal-body" id="part_detail">
    
   </div>

   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<!-- Modal - Update User details 
<div id="update_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Register Event </h4>
   </div>
   <div class="modal-body">
    <form method="post" id="update_form">
     <label>Event Name</label>
     <input   type="text" name="update_name" id="update_name" class="form-control" />
     <br />
     <label>Department</label>
     <input type="text" name="update_dept" id="update_dept" class="form-control"/>
     <br /> 
     <label>Entry Fees</label>
     <input type="text" name="update_fee" id="update_fee" class="form-control" />
     <br />  
     <label>Total participent</label>
     <input type="text" name="update_part" id="update_part" class="form-control" />
     <br />
     <label>Description</label>
     <input type="text" name="update_des" id="update_des" class="form-control" />
     <br />
     <label>Event Prize</label>
     <input type="text" name="update_prize" id="update_prize" class="form-control" />
     <br />

   </div>
   <div class="modal-footer">
    <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <input type="hidden" id="hidden_user_id">
   </div>
   </form>
  </div>
 </div>
</div> -->


<script src="js/jquery-1.12-0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.min.js"></script>




<!--INSERT EVENT-->
<script> 
/*
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Event name is required");  
  }  
  else if($('#dept').val() == '')  
  {  
   alert("Department is required");  
  }  
  else if($('#fees').val() == '')
  {  
   alert("Please enter registration fee");  
  }
   else if($('#part').val() == '')
  {  
   alert("Enter total participent");  
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
     $('#event_table').html(data);  
    }  
   });  
  }  
 });
*/

 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{id:id},
   success:function(data){
    $('#part_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
//});  
 </script>
<!--End of insertion-->

 
<!--Update Event
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
                          $('#event_table').html(data);  
                     }  
                });  
           
      });  
});
 

// Fetching the event data to update
 $(document).on('click', '.update_data', function(){
  //$('#dataModal').modal();
  var eve_name = $(this).attr("id");
  $.ajax({
   url:"readEvent.php",
   method:"POST",
   data:{eve_name:eve_name},

   success:function (data, status) 
      {
            // PARSE json data
              var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_name").val(user.name);
            $("#update_dept").val(user.dept);
            $("#update_fee").val(user.fee);
            $("#update_part").val(user.no_part);
            $("#update_des").val(user.des);
            $("#update_prize").val(user.prize);
            
           $("#update_data_Modal").modal("show");
        }

  }); 
  });
 
  </script>-->
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