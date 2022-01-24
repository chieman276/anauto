<?php
class User
{
   public $username;
   public $email;
   public $password;

   // public function save() {

   // }
}
$errors = [];
//
$show_alert = (isset($_REQUEST['show_alert'])) ? $_REQUEST['show_alert'] : 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
   /* 
   Array
(
    [username] => admin
    [email] => admin@gmail.com
    [password] => 123456
)
   */
   $username  =  $_REQUEST['username'];
   $email     =  $_REQUEST['email'];
   $password  =  $_REQUEST['password'];

   if ($username == '') {
      $errors['username'] = 'Username is required field !';
   }

   if ($email == '') {
      $errors['email'] = 'Email is required field !';
   }

   if ($password == '') {
      $errors['password'] = 'Password is required field !';
   }

    //
   if (count($errors) == 0) {
      $objUser = new User($username, $password, $email, 3);

      $objUser->username = $username;
      $objUser->id = time();
      $objUser->email = $email;
      $objUser->password = $password;

      $json_users = file_get_contents('user.json');
      if ($json_users) {
         $users = json_decode($json_users);
      } else {
         $users = [];
      }
      //push to users array
      $users[] = $objUser;
      //convert to json string 
      $users = json_encode($users);
      file_put_contents('user.json', $users);

      //redirect to login page
      header("Location: register.php?show_alert=1");
   }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center">Register</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="Username" name="username">
                        <small class="form-text text-danger">
                            <?php echo (isset($errors['username'])) ? $errors['username'] : ""; ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                        <small class="form-text text-danger">
                            <?php echo (isset($errors['email'])) ? $errors['email'] : ""; ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password">
                        <small class="form-text text-danger">
                            <?php echo (isset($errors['password'])) ? $errors['password'] : ""; ?>
                        </small>
                    </div>
                    <?php if ($show_alert) : ?>
                        <div class="alert alert-success" role="alert">
                            Đăng ký thành công, Vui lòng nhấn vào <a href="login.php"> đây</a>
                            để tới trang đăng nhập
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>