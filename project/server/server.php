<?php 
session_start();
include('db.php');

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = md5($password);
    $sql = "SELECT * FROM users WHERE UserName = '$username' AND password = '$password'";
    $result = $db->query($sql);    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['userid'] = $row["UserID"];
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            exit ('1'); 
        }
    } else {
        exit('username or password doesnt exist in db!'); 
    }
}
 
if(isset($_POST['registr'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE UserName = '$username'";
    $result=$db->query($sql);
    if($result->num_rows > 0){
        exit('user name already exist in db!');
    }else{
        //https://www.w3schools.com/php/php_mysql_insert.asp     
        $sql = "INSERT INTO users (UserName, Password)
        VALUES ('$username', '$password')";
  
        if ($db->query($sql) === TRUE) {
            exit ('1');
        } else {
            exit("Error: " . $sql . "<br>" . $db->error);
        }        
    }        	 
}

// add new note
if(isset($_POST['newnote'])){
    $note = mysqli_real_escape_string($db, $_POST['note']);
    $userid = $_SESSION['userid'];
    $sql = "INSERT INTO notes (UserID, Note)
    VALUES ('$userid', '$note')";

    // execute query
    if ($db->query($sql) === TRUE) {
        exit ('new note added');
    } else {
        exit("Error: " . $sql . "<br>" . $db->error);
    }                 	 
}

// get notes 
if(isset($_POST['getnotes'])){
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];

$sql = ("SELECT * FROM notes WHERE UserID = '$userid'");
    // execute query
    if ($result=mysqli_query($db,$sql))
    {
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>                                  
                  <tr>
                    <td><div><?php echo $row["Note"] ?></div></td>  
                    <td><input type="button"   class="btn del" onclick="eraseNote(<?php echo $row["NoteID"]?>)" value="Delete" ></td>
                    </tr>                           
                <?php           
            }
            exit();
        } else {
            exit('no notes in db!');
        }        
    }    
}

// erase note
if(isset($_POST['eraseNote'])){
    $noteID = mysqli_real_escape_string($db, $_POST['noteID']);

    // sql to delete a record
    $sql = "DELETE FROM notes WHERE NoteID=$noteID";
    
    // execute query
    if ($db->query($sql) === TRUE) {
        exit ("Note deleted successfully!");   
    } else {
        exit ("Error deleting record: " . $conn->error);      
    }      
}

?>

