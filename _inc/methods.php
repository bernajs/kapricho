<?php
 function producto(){
   return '<div id="make-3D-space">
    <div id="product-card">
        <div id="product-front">
        	<div class="shadow"></div>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
            <div class="image_overlay"></div>
            <div id="view_details">View details</div>
            <div class="stats">
                <div class="stats-container">
                    <span class="product_price">$39</span>
                    <span class="product_name">Adidas Originals</span>
                    <p>Mens running shirt</p>

                    <div class="product-options">
                    <strong>SIZES</strong>
                    <span>XS, S, M, L, XL, XXL</span>
                    <strong>COLORS</strong>
                    <div class="colors">
                        <div class="c-blue"><span></span></div>
                        <div class="c-red"><span></span></div>
                        <div class="c-white"><span></span></div>
                        <div class="c-green"><span></span></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div id="product-back">
	        <div class="shadow"></div>
            <div id="carousel">
                <ul>
                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large.png" alt="" /></li>
                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large2.png" alt="" /></li>
                    <li><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt-large3.png" alt="" /></li>
                </ul>
                <div class="arrows-perspective">
                    <div class="carouselPrev">
                        <div class="y"></div>
	                    <div class="x"></div>
                    </div>
                    <div class="carouselNext">
                        <div class="y"></div>
	                    <div class="x"></div>
                    </div>
                </div>
            </div>
            <div id="flip-back">
            	<div id="cy"></div>
                <div id="cx"></div>
            </div>
        </div>
    </div>
</div>';
 }
 ?>
