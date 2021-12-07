<?php 
class Blog{
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    public function getBlogList(){

        $sql = "SELECT * FROM blog";
        $query = $this->con->prepare($sql);
        $query->execute();
        //ERROR HANDLING
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $html = "";
        foreach($results as $blog){

            $blogId = $blog['blog_id'];
            $heading = $blog['blog_heading'];
            $content = $blog['blog_content'];

            $html = $html . "<li>
                                <a href ='blogDetails.php?id=$blogId'>
                                    <h2>$heading</h2>
                                    <p>$content</p>
                                </a>
                            </li>";
        }
        return $html;
    }

    public function getBlogDetails($id){
        $sql = "SELECT * FROM blog WHERE blog_id=:id";
        $query = $this->con->prepare($sql);
        $query->bindParam('id' , $id);
        $query->execute();
        //ERROR HANDLING
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
           
        $heading = $results[0]['blog_heading'];
        $content = $results[0]['blog_content'];
        $time = $results[0]['blog_date'];
        $html = "";
        $html = $html . "<li>
                            $heading
                            $content
                            $time
                        </li>";
        return $html; 
    } 
}

?>