<?php
class User
{
   public $email;
   public $password;

   // public function save() {

   // }
}
  session_start();
  $json_users = file_get_contents('user.json');
  if( $json_users){
      $users = json_decode($json_users);
  }else{
      $users = [];
  }

  $errors = [];
  $alert = "";

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
   /*
        Array
      (
          [email] => add@gmail.com
          [password] => 12345
      ) 
   */
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];




        if ($email == '') {
            $errors['email'] = 'Email is required field !';
        }
        if ($email == '') {
            $errors['password'] = 'Password is required field !';
        }

        if (count($errors) == 0) {
            $objUser = new User($email,$password,2);

 
        $objUser->id = time();
        $objUser->email = $email;
        $objUser->password = $password;
        

        $can_do = false ;
        foreach ($users as $user) {
          // echo $user->email. ' _ ' . $email. '<br>';
          // echo $user->password. ' _ ' . $password. '<br>';
          // echo '<hr>';
          if ($user->email == $email && $user->password == $password){
            //xu ly đăng nhập
            $_SESSION['user'] = $user;
            $can_do = true;
            break;
          } else {
            //chuyển hướng
             header("Location: index.php");
          }
        }
        if ($can_do == false){
          $alert = 'Login failed';
        }
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
                <h3 class="text-center">Login</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="POST">

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


                    <a class="btn btn-success" href="index.php">Login </a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>