<?php 

    include "components/header.php"
?>

     
    <div class="small container">
        <div class="row row-2">
            <h2>All Products

            </h2>
             <select>
                 <option>Default Sorting</option>
                 <option>Sort by Price</option>
                 <option>Sort by Popularity</option>
                 <option>Sort by Sale</option>
             </select>
        </div>

        <div class="row">
        <?php 
                $sql1 = "SELECT * FROM Product ORDER BY ProductId DESC";
                $result = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class="col-4">
                    <a href="product-detail.php?pid=<?php echo $row["ProductId"];?>">
                        <img src="upload/<?php echo $row["Image"]; ?>"><!--product img-->
                        <h4><?php echo $row["Title"]; ?></h4><!--product title-->
                        <div class="rating"><!--add stars for rating of product from font awesome 4-->
                            <i class="fa fa-star" aria-hidden="true"></i><!--add 4 black start and one transparent star to show 4 out of 5 rating-->
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                        <p>$<?php echo $row["Price"]; ?>.00</p><!--product price-->
                    </a>
                </div>
            <?php
                    }
                }
            ?>
       </div>
       
`       <!--add page buttons in small container section-->
       <div class="page-btn">
           <span>1</span><!--no of pages-->
           <span>2</span>
           <span>3</span>
           <span>4</span>
           <span>&#8594;</span><!--and arrow in the end-->

       </div>
    </div>
 
    <?php
        include "components/footer.php"
    ?>