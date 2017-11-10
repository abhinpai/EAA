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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <html xmlns="http://www.w3.org/1999/xhtml">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
 <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/css/bootstrap.css"/>
<style type="text/css">
	#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 8px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 5px; /* Add some space below the input */
    width: 85.5%;
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
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
              
              <!--<div id="event_table">
            <table calss="table table-bordered">
            <tr>
            <th width="70%">Event Manager</th>
            <th width="30%"> <button type="button" name="add_event" id="event" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Event</button></th>
            </tr>
              </table>
              </div>-->
             
 
   <h3 align="center">Event Manager</h3>  </div>
     <div class="container" style="width:700px;"> 
   <div class="table-responsive">
    <div align="right">
     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for event names.." pattern="[a-z][A-Z]{0,10}">
     <button type="button" name="add_event" id="event" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add Event</button>
    

    </div>

    <br />
    <div id="event_table">
     <table  class="table table-bordered table-striped" id="myTable">
      <tr class="header">
       <th width="20%">Event Name</th>
       <th width="20%">Department</th>  
       <th width="20%">Category</th> 
       <th width="30%">Option</th>
      </tr>
      <?php
      require_once 'dbconfig.php';
      $query = "SELECT * FROM event_details";
      $stmt = $DBcon->prepare( $query );
      $stmt->execute();
      while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
        extract($row);
        ?>
   
      <tr>
       <td align='center'><?php echo $row["name"]; ?></td>
       <td align='center'><?php echo $row["dept"]; ?></td>
       <td align='center'><?php echo $row["cat"]; ?></td>
       <td align='center'>
       <input type="button" name="view" value="view" id="<?php echo $row["name"]; ?>" class="btn btn-primary btn-xs view_data" />
        
       <input type="button" name="update" value="Update" id="<?php echo $row["name"]; ?>" class="btn btn-success btn-xs update_data" />
       <a class="delete_product" data-id="<?php echo $name; ?>" href="javascript:void(0)">
        <input type="button" name="delete" value="Delete" id="<?php echo $row["name"]; ?>" class="btn btn-danger btn-xs delete_data " />
      <!-- <i class="glyphicon glyphicon-trash"></i>-->
     
       </td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>


<!---Adding new Event-->
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Register Event </h4>
   </div>
   <div class="modal-body"> 
    <form method="post" id="insert_form" >
     <label>Event Name</label>
     <input type="text" name="name" id="name" class="form-control" required placeholder="Event name" pattern="[a-z]{1,15}"
     title="Event name must contain only alphabet e.g: Innowiz"/>
     <br />
     <label>Department</label>
     <input type="text" name="dept" id="dept" class="form-control" required placeholder="Department" pattern="[a-z]{2,10}"
     title="Department name must be alphabet e.g: MCA"/>
     <br /> 

     <label>Entry Fees  </label>
     <div class="input-group">
      <div class="input-group-addon">₹</div>
     <input type="text" name="fee" id="fee" class="form-control" required placeholder="Fees" pattern="[0-9]{2,5}" 
     title="Only number e.g: ₹5000"/>
      
     </div><br /> 
     <label>Total participent</label>
     <input type="text" name="part" id="part" class="form-control" required placeholder="participant" pattern="[0-9]{1,20}"
     title="Please enter in form of total number participants"/>
     <br />
     <label>Description</label>
     <input type="text" name="des" id="des" class="form-control" required placeholder="Description" />
     <br />


                  <div class="form-group">
                <label>Category</label>
                <select class="form-control select2"  name="cat" id="cat" style="width: 100%; required">
                  <option value="">--SELECT--</option>
                  <option value="Technical">Techinical</option>
                   <option value="Photography">Photography</option>
                   <option value="Entertainment">Entertainment</option>
                   <option value="Management">Management</option>
                   <option value="Games">Gaming</option>
                </select>
              </div>
     
          <label>Event Prize </label>
               <div class="input-group">
      <div class="input-group-addon">₹</div>
     <input type="text" name="prize" id="Prize" class="form-control" required placeholder="₹ Amount" pattern="[0-9]{1,20}" 
     title="Only number e.g: 5000"/>
     </div>
     <br />

   </div>
   <div class="modal-footer">
    <input type="submit" name="insert" id="insert" value="Save Event" class="btn btn-primary btn-lg btn-block"/>
    <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Close</button>
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
    <h4 class="modal-title">Event Details</h4>
   </div>
   <!--modal detail body-->
   <div class="modal-body" id="eve_detail">
    
   </div>

   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<!-- Modal - Update User details -->
<div id="update_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Register Event </h4>
   </div>
   <div class="modal-body">
    <form method="post" id="update_form" action="update.php">
     <label>Event Name</label>
     <input   type="text" name="update_name" id="update_name" class="form-control" />
     <br />
     <label>Department</label>
     <input type="text" name="update_dept" id="update_dept" class="form-control" pattern="[a-z]{2,10}"  title="Department name must be alphabet e.g: MCA"/>
     <br /> 
     <label>Entry Fees </label>
          <div class="input-group">
      <div class="input-group-addon">₹</div>
     <input type="text" name="update_fee" id="update_fee" class="form-control" pattern="[0-9]{2,5}"  title="Only number e.g: ₹5000"/>
     </div>
     <br />  
     <label>Total participent</label>
     <input type="text" name="update_part" id="update_part" class="form-control" pattern="[0-9]{1,20}" title="Please enter in form of total number participants"/>
     <br />
     <label>Description</label>
     <input type="text" name="update_des" id="update_des" class="form-control" />
     <br />
     <label>Event Prize</label>
          <div class="input-group">
      <div class="input-group-addon">₹</div>
     <input type="text" name="update_prize" id="update_prize" class="form-control" pattern="[0-9]{1,20}"  title="Only number e.g: ₹5000" />
     </div>
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


 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var eve_name = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{eve_name:eve_name},
   success:function(data){
    $('#eve_detail').html(data);
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


<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>


 </body>  
</html>  