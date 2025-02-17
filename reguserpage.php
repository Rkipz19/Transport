<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Urban Links Transport</title>
<link rel = "icon" type = "image/x-icon" href = "images/favicon.ico" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel = "stylesheet" href = "css/style.css">
</head>
<body>
<div class = "container d-flex justify-content-center align-items-center min-vh-100">
    <div class = "border rounded-5 p-3 bg-dark.bg-gradient shadow box-area">
        <form method = "POST">
          <div class = "mb-3">
            <h1 style = "text-align:center">Order placement <i class="bi bi-truck-flatbed"></i></h1>
          </div>
          <div class="mb-3">
            <label for="farmername" class="form-label">Farmer name</label>
            <input type="text" class="form-control" id="farmername" name = "fname" aria-describedby="" value = "<?php echo $_SESSION['firstname'] ?>">
          </div>
          <div class="mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phonenumber" name = "Phonenumber" placeholder = "+254">
          </div>
          <div class="mb-3">
            <label for="producttype" class="form-label">Product Type</label>
            <select class="form-select" name = "producttype" id ="producttype">
              <option selected>Kindly Select A Product for Transport</option>
              <option value="Perishable">Perishable Goods(Fruits, Vegetables, Dairy)</option>
              <option value="Farm Inputs">Farm inputs(Herbicides, Pesticides, Fertilizers)</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="weight" class="form-label">Weight(in tonnes)</label>
            <input type="number" class="form-control" id="weight" name = "weight" placeholder = "Measure of product in tonnes">
          </div>
          <div class="mb-3">
            <label for="plocation" class="form-label">Pickup Location</label>
            <input type="text" class="form-control" id="plocation" name = "plocation" placeholder = "Area of collection">
          </div>
          <div class="mb-3">
            <label for="dlocation" class="form-label">Delivery location</label>
            <input type="text" class="form-control" id="dlocation" name = "dlocation" placeholder = "Destination">
          </div>
          <div class="mb-3">
            <label for="distance" class="form-label">Distance(in km)</label>
            <input type="text" class="form-control" id="distance" name = "distance" placeholder = "Distance covered in kilometers">
          </div>
          <div class = "d-grid col-6 mx-auto">
            <button type="submit" class="btn btn-primary">Place Order <i class="bi bi-truck"></i></button>
          </div>
        </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>