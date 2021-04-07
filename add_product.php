
<?php 
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");

    if(isset($_POST["btnsubmit"])){
        //Lay gia tri tu form collection
        $productName = $_POST["txtName"];
        
        $cateID = $_POST["txtCateID"];

        $price = $_POST["txtprice"];

        $quantitty = $_POST["txtquantity"];

        $description = $_POST["txtdesc"];

        $picture = $_FILES["txtpic"];

        //khoi tao doi tuong product
        $newProduct = new Product($productName, $cateID, $price, $quantitty, $description, $picture);

        //luu xuong CSDL
        $result = $newProduct -> save();
        
        if(!$result)
        {
            header("Location: add_product.php?failure");
        }
        else{
            header("Location: add_product.php?inserted");
        }
    }
?>
<?php 
    include_once("header.php");
?>
<?php 
    if(isset($_GET["INSERTED"])){
        echo"<h2>Them san pham thanh cong</h2>";
    }
?>

<!--form san pham-->
<Section class="section-card">
 <div class="card-form">
     <div class="card-formm">
        <form  method="post" enctype="multipart/form-data">
            <!-- Ten San Pham -->
            <a href="add_product.php">
                <h2 class="header">ADD_PRODUCT</h2>
            </a>
            <div class="row">
                <div class="lbltitle">
                    <label for="">Ten San Pham</label>
                </div>
                    <div class="lblinput">
                    <input class="input-add" type="text" name ="txtName" value="<?php echo isset ($_POST["txtName"]) ? $_POST["txtName"]:"";?>">
                    
                    </div>
                </div>
            <!-- Mo ta san pham -->
            <div class="row">
                <div class="lbltitle">
                    <label for="">Mo Ta San Pham</label></div>
                    <div class="lblinput">
                    <textarea class="input-add" name="txtdesc" col="21" rows ="10" value="<?php echo isset ($_POST["txtdesc"]) ? $_POST["txtdesc"]:""; ?>"></textarea>
                
                </div>
            </div>
            <!-- so luong san pham -->
            <div class="row">
                <div class="lbltitle">
                    <label for="">So luong san pham</label></div>
                    <div class="lblinput">
                    <input class="input-add" type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"]:""; ?>" >
                    </div>
            </div>
            <!-- gia san pham -->
            <div class="row">
                <div class="lbltitle">
                    <label for="">Gia san pham</label></div>
                    <div class="lblinput">
                    <input class="input-add" type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"]:""; ?>" >
                </div>
            </div>
            <!-- Loai San Pham -->
            <div class="row">
                <div class="lbltitle">
                    <label for="">Loai San Pham</label> </div>
                    <div class="lblinput">
                    <select name="txtCateID" class="input-select" id="">
                        <option value=""selected>---Chon Loai----</option>
                        <?php
                                $cates = Category::list_category();
                                foreach($cates as $item){
                                    echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
                                }
                        ?>
                    </select>
                    </div>
                </div>
            

            <!-- hinh anh -->
            <div class="row">
                <div class="lbltitle">
                    <label for="">Hinh Anh</label> </div>
                <div class="lblinput">
                    <input class="input-img" type="file" name="txtpic" id="txtpic" accept=".PNG,.JPG,.GIF">
                    </div>
                </div>      
            <!-- button submit -->
            <div class="row">
                <div class="lblinput">
                    <input class="submit" type="submit" name ="btnsubmit" value="Them san pham"/>
                </div>
            </div>
        </form>
    </div>
</div>
</Section>