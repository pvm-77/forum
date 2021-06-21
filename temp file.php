<?php
session_start();



echo'<nav class="navbar navbar-expand-lg navbar-dark  mynav">
    <div class="container-fluid">
        <a class="navbar-brand" href="/myforum"> <img src="img/bloglogo.jpg" alt="logo" class="rounded-circle" style="width:40px;">CSblogger</a>
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link "  href="/myforum/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">java</a></li>
                        <li><a class="dropdown-item" href="#">python</a></li>
                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" >Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="team.php" >our team</a>
                </li>
            </ul>';

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    ?>
  echo'   <form class="d-flex">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
  <p class="text-light my-0 mx-3">welcome ' .$_SESSION['userid'].'</p>
  <a href="includes/_profile.php" class="btn btn-success mx-2" ><i class="fas fa-user"></i>profile</a>
  <a href="includes/_logout.php" class="btn btn-success mx-2" ><i class="fas fa-user-astronaut"></i>leave</a>
  </form>';
  <?php
}
else{
    ?>
  echo'
  <form class="d-flex">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
<a class="btn btn-success mx-2" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>

<a class="btn btn-warning mx-2" href="signup.php"><i class="fa fa-user-plus"></i> Signup</a>';
<?php
}
?>
echo'</div>
    </div>
    </nav>
    <div class="container-fluid">
	';



