<?php
require_once('include/function.php');
protected_area();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $img = upload_images($_FILES);
  foreach($img as $value){
    $data['photo'] = $value;
  }

}
//   $data['name'] = $_POST['name'];
//   $data['description'] = $_POST['description'];
//   $data['photo'] = $img['src'];
//   $data['parent_id'] = 0;
//   if (insertData('categories',$data)) {
//     alert('success','Created Category successfully.');
//     header('Location:admin-categories.php');
//   } else {
//     alert('error', 'Failed to create category, please try again.');
//   }
//   die();
// }

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
      <h1 class="h3 text-light mb-0">Products Add</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">
    <?php require_once('include/account-sidebar.php') ?>
    <!-- Content  -->
    <section class="col-lg-8">
      <!-- Toolbar-->
      <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
        <div class="d-flex align-items-center">
          <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sort orders:</label>
          <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sort orders:</label>
          <select class="form-select" id="order-sort">
            <option>All</option>
            <option>Delivered</option>
            <option>In Progress</option>
            <option>Delayed</option>
            <option>Canceled</option>
          </select>
        </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i class="ci-sign-out me-2"></i>Sign out</a>
      </div>
      <section class="col-12">
        <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
          <!-- Title-->
          <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
            <h2 class="h3 py-2 me-2 text-center text-sm-start">Add New Products</h2>
            <div class="py-2">
              <select class="form-select me-2" id="unp-category">
                <option>Select category</option>
                <option>Photos</option>
                <option>Graphics</option>
                <option>UI Design</option>
                <option>Web Themes</option>
                <option>Fonts</option>
                <option>Add-Ons</option>
              </select>
            </div>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 pb-2">
              <?php echo text_input(['input' => 'name', 'label' => 'Product name']) ?>
            </div>
            <div class="row">
            <div class="mb-3 pb-2 col-md-6">
            <?php echo text_input(['input' => 'buying_price', 'label' => 'Buying Price']) ?>
            </div>
            <div class="mb-3 pb-2 col-md-6">
              <?php echo text_input(['input' => 'selling_price', 'label' => 'Selling Price']) ?>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="file-drop-area mb-3">
                  <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Photo 1 Upload</span>
                  <input class="file-drop-input" type="file" name="photo_1" accept=".jpg,.jpeg,.png">
                  <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                  <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="file-drop-area mb-3">
                  <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Photo 2 Upload</span>
                  <input class="file-drop-input" type="file" name="photo_2" accept=".jpg,.jpeg,.png">
                  <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                  <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="file-drop-area mb-3">
                  <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Photo 3 Upload</span>
                  <input class="file-drop-input" type="file" name="photo_3" accept=".jpg,.jpeg,.png">
                  <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                  <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="file-drop-area mb-3">
                  <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Photo 4 Upload</span>
                  <input class="file-drop-input" type="file" name="photo_4" accept=".jpg,.jpeg,.png">
                  <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                  <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="file-drop-area mb-3">
                  <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Photo 5 Upload</span>
                  <input class="file-drop-input" type="file" name="photo_5" accept=".jpg,.jpeg,.png">
                  <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                  <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="file-drop-area mb-3">
                  <div class="file-drop-icon ci-cloud-upload"></div><span class="file-drop-message">Photo 6 Upload</span>
                  <input class="file-drop-input" type="file" name="photo_6" accept=".jpg,.jpeg,.png">
                  <button class="file-drop-btn btn btn-primary btn-sm mb-2" type="button">Or select file</button>
                  <div class="form-text">1000 x 800px ideal size for hi-res displays</div>
                </div>
              </div>
            </div>
        </div>
                  <div class="mb-3 py-2">
                    <label class="form-label" for="unp-product-description">Category description</label>
                    <textarea class="form-control" name="description" rows="6"  id="unp-product-description"></textarea>
                  </div>
        <button class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Upload Product</button>
        </form>
  </div>
  </section>
  </section>
</div>
</div>

<?php include 'include/footer.php' ?>