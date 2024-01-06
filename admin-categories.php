<?php
 require_once('include/function.php');
 protected_area();

 $categories = selectData('categories','1 ORDER BY id DESC');
 require_once('include/header.php') ?>

<!-- Page Title-->
<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders history</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Products Categories</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
     <?php require_once('include/account-sidebar.php') ?>
        <!-- Content  -->
        <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
              <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <!-- Title-->
                <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">
                  <h2 class="h3 py-2 me-2 text-center text-sm-start">Your products<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2">5</span></h2>
                  <div class="py-2">
                    <div class="d-flex flex-nowrap align-items-center pb-3">
                      <label class="form-label fw-normal text-nowrap mb-0 me-2" for="sorting">Sort by:</label>
                      <select class="form-select form-select-sm me-2" id="sorting">
                        <option>Date Created</option>
                        <option>Product Name</option>
                        <option>Price</option>
                        <option>Your Rating</option>
                        <option>Updates</option>
                      </select>
                      <button class="btn btn-outline-secondary btn-sm px-2" type="button"><i class="ci-arrow-up"></i></button>
                    </div>
                  </div>
                </div>
                <!-- Product-->
                <?php foreach($categories as $category){ ?>
                <div class="d-block d-sm-flex align-items-center py-4 border-bottom"><a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto" href="marketplace-single.html" style="width: 12.5rem;"><img class="rounded-3" src="img/marketplace/products/th08.jpg" alt="Product"></a>
                  <div class="text-center text-sm-start">
                    <h3 class="h6 product-title mb-2"><a href="marketplace-single.html">Flat-line E-Commerce Icons (AI)</a></h3>
                    <div class="d-inline-block text-accent">$18.<small>00</small></div>
                    <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Sales: <span class="fw-medium">26</span></div>
                    <div class="d-inline-block text-muted fs-ms border-start ms-2 ps-2">Earnings: <span class="fw-medium">$327.<small>60</small></span></div>
                    <div class="d-flex justify-content-center justify-content-sm-start pt-3">
                      <button class="btn bg-faded-accent btn-icon me-2" type="button" data-bs-toggle="tooltip" title="Download"><i class="ci-download text-accent"></i></button>
                      <button class="btn bg-faded-info btn-icon me-2" type="button" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit text-info"></i></button>
                      <button class="btn bg-faded-danger btn-icon" type="button" data-bs-toggle="tooltip" title="Delete"><i class="ci-trash text-danger"></i></button>
                    </div>
                  </div>
                </div>
          <?php  } ?>
              </div>
            </section>
    </div>
</div>

<?php include 'include/footer.php' ?>