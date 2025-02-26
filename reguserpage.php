<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
    Urban link transport
  </title>
<link rel = "icon" type = "image/x-icon" href = "images/favicon.ico" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel = "stylesheet" href = "css/style.css">
<link rel = "stylesheet" href = "css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid overflow-hidden">
  <div class="row g-0 vh-100 overflow-y-auto">
        <div class="col-2 col-sm-3 col-xl-2 d-flex fixed-top" id="sidebar">
            <div class="d-flex flex-column flex-grow-1 align-items-center align-items-sm-start bg-dark px-2 px-sm-3 py-2 text-white vh-100 overflow-auto">
                <a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5">U<span class="d-none d-sm-inline">rban Link Transport</span></span>
                </a>
                <ul class="nav nav-pills flex-column flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="userpage.php" class="nav-link">
                            <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="order.php" class="nav-link">
                            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Order</span>
                        </a>
                    </li>
                </ul>
                <div class="dropup py-sm-4 py-1 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['firstname'] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark px-0 px-sm-2 text-center text-sm-start" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item px-1" href="userprofile.php"><i class="fs-6 bi-binoculars"></i><span class="d-none d-sm-inline ps-1">Profile</span></a></li>
                        <li><a class="dropdown-item px-1" href="userlogout.php"><i class="fs-6 bi-bookmark"></i><span class="d-none d-sm-inline ps-1">Sign out</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src = "js/script.js"></script>
<script src = "js/main.js"></script>
</body>
</html>