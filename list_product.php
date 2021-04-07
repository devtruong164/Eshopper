
<?php 
    require_once("entities/product.class.php");
    $prods = Product::list_product();
    include_once("header.php");
    require_once("entities/category.class.php");
?>
<?php 
    if(!isset($_GET["cateid"])){
        $prods = Product::list_product();
    }
    else{
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateid($cateid);
    }
    $cates = Category::list_category();
?>
   <div class="container text-center">
    <div class="col-sm-3">
        <h3>Danh Mục Sản Phẩm</h3>
        <ul class="list-group">
            <?php
            foreach($cates as $item){
                echo "<li class='list-group-item'><a href=list_product.php?cateid=".$item["CateID"].">".$item["CategoryName"]."</a></li>";
            }
            ?>
        </ul>
    </div>
    <div class="col-sm-9">
    <h3>Sản Phẩm</h3>
    <div class="row">
        <?php 
        foreach ($prods as $item) {
            ?>
            <div class="col-sm-4">
                <a href="product_detail.php?id=<?php echo $item["ProductID"];?>">
                    <img href="" src="<?php echo "".$item["Picture"];?>" alt="Image" class="img-responsive" style="width: 100%;">            
                </a>
                <p class="text-danger"><?php echo $item["ProductName"]?></p>
                <p class="text-info"><?php echo $item["Price"]?></p>
                <p>
                    <button type="button" class="btn btn-primary" onclick="location.href='shopping_cart.php?id=<?php echo $item['ProductID']?>'">Buy</button>
                </p>
            </div>
        <?php }?>
    </div>
    </div>
</div>

        <!-- <div class="col-lg-9 col-md-12">
                <div class="row">
                <div class="col-lg-4 ftco-animate">
                    <div class="blog-entry">
                      <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                      </a>
                      <div class="d-flex">
                        <div class="meta pt-3 text-right pr-2"></div>
                       <div class="text d-block">
                        <h3 class="heading"><a href="#">Gói Khám Sức Khỏe Cơ Bản</a></h3>
                        <h4><p>490.000 VNĐ</p></h4>
                       <button class="btn-phieuthongtin">Chi tiết</button>
                      </div>
                    </div>
                </div>
            </div>
         </div>
        </div> -->
       