<?php



class User
{

private $conn;

public function __construct($host,$user,$password,$database)
{
    $this->conn=new mysqli($host,$user,$password,$database);
     if ($this->conn->connect_error)
     {
        die("Connection failed: " . $this->conn->connect_error);
     }
}


// Create User 
public function create(?string $name, ?string $email, ?string $phone, ?string $password)
{

    $sql = "INSERT INTO users (name, email, phone, password) values (?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('ssss', $name, $email, $phone, $password);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Read Date

public function read($id)
{
    $sql="SELECT * FROM users WHERE id = ?  ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result=$stmt->get_result();
    return $result->fetch_assoc();
}


public function Update($name,$email,$phone,$password)
{
    $sql="UPDATE users SET name=?, email=?, phone=?, password=?  ";
    $stmt=$this->conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $password);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
// delete user
public function delete($id)
{
    $sql="DELETE FROM users WHERE id = ? ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

}

//get all users
public function getAll()
{
    $sql="SELECT * FROM users  ";
    $result = $this->conn->query($sql);
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
}

public function __destruct() {
    $this->conn->close();
}


}
?>