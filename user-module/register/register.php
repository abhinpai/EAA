<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet">
	<title>EAA | Register</title>
</head>
<body>


	<?php
if(isset($_GET['param1'])&& isset($_GET['cat']))
{
  $event = $_GET['param1'];
  $cat = $_GET['cat']; 
}
?>

<div class="container">  
  <form id="contact" onSubmit="return checkStatus(this);" action="process.php" method="post">
    <h3><strong>EVENT ACTIVITY ANALYSIS</strong></h3>
    <h4>Fill the contact form to participate in an event</h4>
    <input type="hidden" name="event" value='<?php echo "$event"; ?>'> 
    <input type="hidden" name="cat" value='<?php echo "$cat"; ?>'> 
    <fieldset>
      <input placeholder="Student name"  pattern="[A-Za-z\\s]*" 
      onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
      type="text" tabindex="1" name="name" style="text-transform:uppercase ;" required autofocus>
    </fieldset>
        <fieldset>
      <input placeholder="USN" type="text" tabindex="2" pattern=".{10}" maxlength="10" name="usn" style="text-transform:uppercase ;" required >
    </fieldset>
    <fieldset>
      <input placeholder="EMAIL ADDRESS"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" tabindex="3" name="email" required>
    </fieldset>
    <fieldset>
      <input onkeypress="return (event.charCode > 47 && event.charCode < 58)"
      placeholder="CONTACT NUMBER " type="tel" tabindex="4" name="contact" maxLength=10 
       required>
    </fieldset>
    <fieldset>
      <input onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
      placeholder="College Name"  type="text" name="college" tabindex="5" style="text-transform:uppercase ;" required>
    </fieldset>
    <fieldset>

      <input onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
      placeholder="Department" type="text"  tabindex="6" name="dept" style="text-transform:uppercase ;" required></input>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
   
  </form>
</div>


<script>
    function checkStatus(f){
        var email=$("#email").val();
        var usn=$("#usn").val();
        var contact=$("#contact").val();

        $.ajax({
            type:'get',
            url:'insert.php',
            data:{email: email, usn: usn, contact:contact},
            dataType: 'json',
            success:function(data){
                if(data.status == "success"){
                    f.submit();
                }else{
                    alert(data.msg);
                }
            }
        });
        return false;
    }
</script>
</body>
</html>