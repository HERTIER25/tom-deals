
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form action="#" class="mb-2 add_form">
    <div class="alert alert-success"><h4 class=" text-center">Add new admin</h4></div>

    <div class="form-group">
        <label for="email" >Email address:</label>
        <input type="email" class="form-control " id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <div class="alerts">

    </div>

    <button type="submit" class="btn btn-success btt" name="add">
       <i class="fas fa-plus "> AddNew</i></button>

</form>
</body>
<script src="./javascript/message.js" ></script>
</html>