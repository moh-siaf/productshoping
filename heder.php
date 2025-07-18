<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="x.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
            
            /* background-color: #F0F0F0; */
           
            
         
  background: linear-gradient(to right, 
    #B2EAFD,  /* درجة فاتحة جدًا من الأزرق السماوي */
    #D9F4FF,  /* درجة باهتة للأزرق السماوي */
    #F1F0F0   /* الأبيض الهادئ */
  );
  color: #333; /* لون نص داكن ليتناسب مع الخلفية */






             /* background: linear-gradient(to right, #F0F0F0, #00f2fe);  */
        }
        .container-fluid {
            max-width: 1200px;
            width: 100%;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 15px 30px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .navbar-brand, .nav-link {
            font-size: 1.5rem;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            color: #333;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #4facfe;
            transform: translateY(-3px);
        }
        .btn-outline-success {
            border-radius: 30px;
            padding: 12px 25px;
            font-size: 1.1rem;
            font-weight: bold;
            border: 2px solid #4facfe;
            color: #4facfe;
            transition: all 0.3s ease-in-out;
        }
        .btn-outline-success:hover {
            background-color: #4facfe;
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            border-radius: 25px;
            padding: 12px;
            font-size: 1.1rem;
        }
        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="mian.php">الصفحه الرئيسيه</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="PRODUCT.php">المنتجات</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="SERVICES.php">الخدمات</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="SERVICES.php">   تواصل    </a>
              </li>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="About.php">المصمم</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">البحث</button>
              
            </form>
            
          </div>
        </div>
        <h2> <a href="subscription.php" class="btn btn-primary me-2">اشتراك</a></h2>
       
      </nav>
    </header>
</body>
</html>
