<?php 
class Product{
    private $con;

    public function __construct($con){
        $this->con = $con;

    }
    
    public function getProductList(){
      
            $sql="SELECT * FROM products";
            $query=$this->con->prepare($sql);
            $query->execute();
            
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
            $html = "";
            foreach($results as $product){
                $productId = $product['product_id'];
                $picture = $product['product_image'];
                $name = $product['product_name'];
                $power = $product['product_power'];
                $description = $product['product_content'];

                // $html = $html . "<a href='productDetails.php?id=$productId'>
                //                 <li>
                //                     <h3>$name</h3>
                //                     </a>
                //                      <img src='imgs/$picture'></img> 
                                     
                //                 </li>";
                $html = $html . "<div class='productInfo'>
                                    <div class='productImageWrapper'>
                                        <img src='assets/img/$picture' alt=''>
                                    </div>
                                    <hr class='productHr'>
                                    <h3>$name</h3>
                                    <p class='powerDescription'>$power</p>
                                    <hr class='productHr'>
                                    <p>$description</p>
                                    <hr class='productHr'>
                                    <a href='productDetails.php?id=$productId'>Daha etrafli <img id='productRightArrow' src='assets/img/right-arrow.svg' alt=''></a>
                                </div>";
            }
            return $html;
        } 

        public function getProductDetails($id){
            $sql="SELECT * FROM products WHERE product_id=:id";
            $query=$this->con->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                
                
            return $results;

                
            }

            public function getProductListForIndexPage(){
                $sql="SELECT * FROM products LIMIT 3";
                $query=$this->con->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
                $html = "";
                    foreach($results as $product){
                        $productId = $product['product_id'];
                        $picture = $product['product_image'];
                        $name = $product['product_name'];
                        $power = $product['product_power'];
                        $description = $product['product_content'];

                    $html = $html . "<div class='productInfo'>
                                    <div class='productImageWrapper'>
                                        <img src='assets/img/$picture' alt=''>
                                    </div>
                                    <hr class='productHr'>
                                    <h3>$name</h3>
                                    <p class='powerDescription'>$power</p>
                                    <hr class='productHr'>
                                    <p>$description</p>
                                    <hr class='productHr'>
                                    <a href='productDetails.php?id=$productId'> Daha ətraflı <img id='productRightArrow' src='assets/img/right-arrow.svg' alt=''></a>
                                </div>";
            }
            return $html;
            }


        public function buildProductDetailHtmlFromInfoArray($array){
            $productName = $array[0]['product_name'];
            $productPicture = $array[0]['product_image'];
            $productContent = $array[0]['productDetails_content'];
            
            // $productCategory = $array[0]['product_category'];
            // $productPrices = $array[0]['product_prices'];
            $productPower = $array[0]['product_power'];

            $html = "";         
            $html = $html . "<div class='productDetailsInfo'>
                                <h1>$productName</h1>
                                <h2>$productPower</h2>
                                <p>$productContent</p>
                            </div>
                            <div class='productDetailsImage'>
                                <img src='assets/img/$productPicture' alt=''>
                            </div>
                            ";
            return $html;
        }
        

        public function getProductNameFromInfoArray($array){
            $name = $array[0]['product_name'];
            return $name;
        }

        public function getSpecsImageFromDb($array){
            $specProductImage = $array[0]['product_specs_img'];
            $html = "";
            $html = $html . "<img src='assets/productSpecification/$specProductImage'>";
            return $html;

        }

        public function getKatalogFromDb($array){
            $productKatalog = $array[0]['product_katalog'];
            $html = "";
            $html = $html . "<a class='productDetailsBtnSecond' href='assets/katalogs/$productKatalog' download='Katalog_PDF'>Kataloqu yükləyin</a>";
            return $html;

        }

    


    
        
    

}




?>