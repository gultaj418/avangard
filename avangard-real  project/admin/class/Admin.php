
<?php 
class Admin{
    private $con;
    private $errorArray= array();

    public function __construct($con){
        $this->con = $con;
        $this->errorArray = array();

    }

    public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
    }



    public function login($email, $password){
        $sql = "SELECT * FROM adminLogin WHERE BINARY  email= :email AND BINARY password=:password ";
        $query = $this->con->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        //ERROR HANDLING
        if ($query->rowCount() == 1){
            return true;
        }else{
            array_push($this->errorArray, "Your email or password is incorrect");
            return false;
        }
    }

    public function getBlogsLists(){
        $sql ="SELECT * FROM blog";
        $query = $this->con->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $html = "";
        foreach($results as $blog){
           
            $title = $blog['a_title'];
            $content = $blog['a_content'];
            $blogId = $blog['id'];


        $html = $html . "<li>
                            <h3>$title</h3>
                            <p>$content</p>
                            <a href='editBlog.php?id=$blogId'<button>Edit</button></a>
                            <button onclick='deleteRow(this," . $blogId . ", null)'>Delete</button>
                        </li>";
    }
        return $html;

    }

    public function getProductsLists(){
        $sql = "SELECT * FROM products";
        $query = $this->con->prepare($sql);
        $query->execute();
        //ERROR HANDLING
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $html = "";
        foreach($results as $product){
            $productId = $product['product_id'];
            $name = $product['product_name'];
            $picture = $product['product_image'];

            $html = $html . "<li>
                                <h3>$name</h3>
                                <img src='../assets/img/$picture'></img> 
                                <a href='editProduct.php?id=$productId'<button>Edit</button></a>
                                <button onclick='deleteRow(this,null," . $productId . ")'>Delete</button>
                            </li>";
        }
        return $html;
    }         


        public function getMediaLinksList(){
        $sql="SELECT * FROM medialinks";
        $query=$this->con->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);


        $html = "";
        foreach($results as $mediaLinks){
            $socialMediaId = $mediaLinks['id'];
            $socialMediaName = $mediaLinks['socialMediaName'];
            $socialMediaLinks = $mediaLinks['socialMediaLink'];

            $html = $html . "<li>
                                <p>$socialMediaName</p> 
                                <a href='editSocialMedia.php?id=$socialMediaId'<button>Edit</button></a>
                                <button onclick='deleteMediaLink(this," . $socialMediaId . ")'>Delete</button>
                            </li>";
        }
        return $html;

    }

}

?>


