
  <!-- ======= Breadcrumbs ======= -->

  <main id="main">
  <div class="container-xl">
        <div class="row mx-5">
            
            <div class="col-lg-6">
                <a href=""><img class="img-fluid" src="<?php echo $product->img;?>" alt=""></a>
            </div>
            <div class="col-lg-6">
                <h3><?php echo $product->name;?></h3>
                <h5><?php echo $product->category;?></h5>
                <h5 class="mt-3 mb-5"><?php echo $product->price;?>đ</h5>
                
                
                <div class="row">
                    <form action="index.php?page=main&controller=cart&action=addHidden" method="post">
                    <div class="input-group input-group-lg rounded-pill">
                        <span class="input-group-text fw-semibold" id="inputGroup-sizing-lg">Select Quantity</span>
                        <input type="hidden" name="product_id" value="<?php echo $product->id;?>">
                        <input name="num" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"  value="1">
                    </div>
                        <button type="submit" class="d-block w-100 btn btn-dark rounded-pill fw-semibold py-3 my-3" id="addCart">Add to cart</button>
                    </form>
                </div>
                

                <p class="decription lh-lg fw-semibold"><?php echo $product->description;?></p>
                <ul>
                    <li>Colour Shown: <?php echo $product->color; ?></li>
                    <li>Style: <?php echo $product->style; ?></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="d-inline-flex gap-1">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Reviews(2)
                    </a>
                    
                  </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Well. I love that. Very pay for it
                    </div>
                    <div class="card card-body">
                        Just like other things
                    </div>
                  </div>
            </div>
        </div>
    </div>
    
  </main><!-- End #main -->
