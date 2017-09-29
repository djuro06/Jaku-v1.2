<?php 

include_once 'includes/config.php'; 
include_once 'includes/redirect_non_admin.php';

$stmt = $pdo->prepare('SELECT * FROM users INNER JOIN wallet ON users.user_id=wallet.user_id');
$stmt->execute();
$userData = $stmt->fetchAll();

if(isset($_POST["user_id"], $_POST["action"]) && $_POST["action"]=="changeActivated"){
    $stmt = $pdo->prepare('UPDATE users SET activated=NOT(activated) WHERE user_id=?');
    $stmt->execute([$_POST["user_id"]]);

    echo "ok";
    return;
}
else if(isset($_POST["user_id"], $_POST["action"]) && $_POST["action"]=="changeAdmin"){
    $stmt = $pdo->prepare('UPDATE users SET role=NOT(role) WHERE user_id=?');
    $stmt->execute([$_POST["user_id"]]);

    echo "ok";
    return;
}
else if(isset($_POST["user_id"], $_POST["balance"])){
    $balance = intval($_POST["balance"]);

    if($balance < 0){
        $balance = 0;
    }

    $stmt = $pdo->prepare('UPDATE wallet SET balance=? WHERE user_id=?');
    $stmt->execute([$balance, $_POST["user_id"]]);

    header("location: manage_users.php");
    return;
}
else if(isset($_POST["username"])){
    if($_POST["username"] == ""){
        $stmt = $pdo->prepare('SELECT * FROM users INNER JOIN wallet ON users.user_id=wallet.user_id');
        $stmt->execute();
        $userData = $stmt->fetchAll();
    }else{
        $stmt = $pdo->prepare('SELECT * FROM users INNER JOIN wallet ON users.user_id=wallet.user_id WHERE username=?');
        $stmt->execute([$_POST["username"]]);
        $userData = $stmt->fetchAll();
    }
    
}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<?php include_once 'template/head.php';  ?>
  </head>

  <body>

    <?php include_once 'template/menu.php';  ?>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter username or leave blank to see all users" name="username" id="user"/>
            </div>
            <input type="submit" class="btn btn-primary" value="Search" /><br><br>
        </form>
        <br><br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th></th>
                    <th>Admin</th>
                    <th></th>
                    <th>Balance</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($userData); $i++){ ?>
                    <tr>
                        <td><?php echo $userData[$i]["username"]; ?></td>
                        <td><?php echo $userData[$i]["activated"]; ?></td>
                        
                        <td><button data-userid="<?php echo $userData[$i]['user_id']; ?>" class="btn btn-info" onclick="changeActivatedStatus(this.getAttribute('data-userid'))">Change status</button></td>
                        <td><?php echo $userData[$i]["role"]; ?></td>
                        <td><button data-userid="<?php echo $userData[$i]['user_id']; ?>" class="btn btn-info" onclick="changeAdminStatus(this.getAttribute('data-userid'))">Change admin status</button></td>
                        <td><?php echo $userData[$i]["balance"]; ?>
                        <td>
                            <form method="post">
                                <div class="form-group">
                                    <input type="number" name="balance" >
                                    <input type="hidden" name="user_id" value="<?php echo $userData[$i]['user_id'] ?>">
                                    <button type="submit" class="btn btn-success">Change balance</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        
        
	</div>
	<?php include_once 'template/scripts.php'; ?>

  </body>
</html>

<script>
function changeActiveStatus(id){
    $.ajax({
        url: "manage_users.php",
        type: "post", //send it through get method
        data: { 
            user_id: id,
            action: "changeActivated"
        },
        success: function(response) {
            location.reload()

        },
        error: function(xhr) {
            alert("Something went wrong.");
        }
    });
}

function changeAdminStatus(id){
    $.ajax({
        url: "manage_users.php",
        type: "post", //send it through get method
        data: { 
            user_id: id,
            action: "changeAdmin"
        },
        success: function(response) {
            location.reload()

        },
        error: function(xhr) {
            alert("Something went wrong.");
        }
    });
}
</script>