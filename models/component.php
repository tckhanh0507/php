<?php
function component($productname,$productprice,$productimg,$procduct_id){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0 product_list\">
            <form action=\"../views/product.php\" method = \"post\">
                <div class=\"card shadow\">
                    <div>
                        <img src=\"$productimg\" alt =\"Image1\" class = \"img-fluid card-img-top\">
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$productname</h5>
                        <h6>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>   
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"far fa-star\"></i>

                        </h6>
                        <p class=\"card-text\">
                            Some quick example text to build on the card.
                        </p>
                        <h5>
                            <small><s class=\"text-secondary\">$1500</s></small>
                        <span class=\"price\">$productprice</span>
                        
                        </h5>
                        <h5>
                          <form method=\"get\">                  
                          <input type=\"number\" value=\"1\" class=\" mx-auto my-auto form-control p-3 px-3 w-25 d-inline\"name=\"quantity\"min=\"1\" max=\"20\">
                           </form> 

                        </h5>
                           <button type=\"submit\" class=\"px-4 py-2\" style=\"background: #ef6d9f;color: white;outline: none;border: none\"name =\"add\">Add to Card<i class=\"fas fa-shopping-cart\"></i></button>
                        <input type=\"hidden\" name =\"product_id\" value =\"$procduct_id\">
                    </div>
                </div>
            </form>
        </div>
    ";
    echo $element;
}
function cartElement($productimg,$productname,$productprice,$product_id,$quantity){
    $element="
    <form action=\"../views/cart.php?action=remove&id=$product_id\" method =\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3\">
                                <img src=\"$productimg\" alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller:dailytuition</small>
                                <h5 class=\"pt-2\">$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2 \" name=\"remove\">Remove</button>

                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    
                                    <input type=\"text\" value=\"$quantity\" class=\" mx-auto my-auto form-control w-25 h-50 p-3 px-3 d-inline\"name=\"quantity\">
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    ";
    echo $element;
}

