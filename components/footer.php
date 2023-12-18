<!-------footer------->
<div class="footer" >
        <div class="container"><!-- it will follow same styling as of header-->
            <div class="row">
                
                <!--it contains 4 columns col1 contains text and col2 contain image col3 contains useful links and col4 contains social media links-->
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and Ios mobile phone.</p>
                   
                   <!---add images of play store and appstore in 1st column-->
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>   
                
                </div>

                <div class="footer-col-2">
                    <img src="images/logo-white.png">
                    <p>Our purpose is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.</p>
                </div>

                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                    
                </div>

                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                    
                </div>
            </div>
            <!--add horizontal line and copyright text along with clickable link-->
            <hr>
            <a href="" class="copyright">Copyright 2020</a>
        </div>
    </div>         

    <!-----------------JS----------------------->
    <script>
        //declare variable MenuItems which take ul having id "MenuItems"
        
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";//by default, we have set menu or dropdown menu height to 0px, means it is close by default
        
        function menutoggle()//this is the function which we have called above in nav which works on small devices and users click on it
        {
            if (MenuItems.style.maxHeight =="0px")//when user click on it and if it is closed or its height is 0px, then it will open or it should have heigt of 200px upon clicking
            {
                MenuItems.style.maxHeight = "200px"
            }
            else//if user not clicked or it has already opened, then it will upon clicking again closed
            {
                MenuItems.style.maxHeight = "0px" 
            }
        
        }
    </script>    

<!----------JS for Single product detail-->
<!--we can write all script in above script, but we have write anothe script tag for simplicity-->
    <script>
        var ProductImg = document.getElementById("product-img");//larger image
        var SmallImg = document.getElementsByClassName("small-img");//it returns list of 4 images having index 0,1,2,3 as we have 4 images with class name "small0-img" 

        SmallImg[0].onclick = function()//when user click on first image or images at 0 index, it will display as ProdcutImg.src replace with clicked or SmallImg[0], so we get smallimg[0] in bigger form, similarly when click on smallimg[1], it will display in bigger picture and so on 
        {
            ProductImg.src = SmallImg[0].src;   
        }

        SmallImg[1].onclick = function()
        {
            ProductImg.src = SmallImg[1].src;   
        }

        SmallImg[2].onclick = function()
        {
            ProductImg.src = SmallImg[2].src;   
        }

        SmallImg[3].onclick = function()
        {
            ProductImg.src = SmallImg[3].src;   
        }
    </script>
    
    </body>

</html>