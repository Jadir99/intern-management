
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
<!-- boot-strap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="menu.css" />
    <title>Menu</title>
  </head>
  <body> 
    
    <div class="menu-bar">
      <a href="/gestion des stagiares/index.php"><h1 class="logo">Home</h1></a>
      <ul>
        <?php if (!isset($_SESSION['username'])){ ?>

            <li><a href="/gestion des stagiares/login.php"><i class="bi bi-house-door"></i> login</a></li>
            <li><a href="/gestion des stagiares/register.php"><i class="bi bi-person-circle"></i> register</a></li>
        <?php } else { ?>
        </li> 
        <li><a href="/gestion des stagiares/crud stagiares"><i class="bi bi-person-fill"></i> interns</a></li>
        <li><a href="/gestion des stagiares/crud Departement"><i class="bi bi-house-door"></i> Departments</a></li>
        <li><a href="/gestion des stagiares/crud stage"><i class="bi bi-person-workspace"></i> internships</a></li>
        <li><a href="/gestion des stagiares/logout.php"><i class="bi bi-box-arrow-right"></i> logout</a></li>
        <?php } ?>
      </ul>
    </div>

    
    
  </body>
</html>