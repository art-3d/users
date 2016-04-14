<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?= $title_for_layout ?></title>
	<?= $css_for_layout ?>
</head>
<body>
	<div class="container">

	    <!-- Navbar -->	    
	    <nav class="navbar navbar-default">
	        <div class="container-fluid">
	          <div class="navbar-header">
	            <a class="navbar-brand" href="/">Название Сайта</a>
	          </div>
	          <div id="navbar" class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
	              <li><a href="/users/index">Пользователи</a></li>
	              <li><a href="/users/add">Добавить</a></li>
	            </ul>
	          </div><!--/.nav-collapse -->
	        </div><!--/.container-fluid -->
	      </nav>	

		<!-- content -->
		<?= $content_for_layout ?>
  </div>

    <footer class="footer text-center">
      <div class="container">
        <p class="text-muted">2016 Copyright</p>
      </div>
    </footer>

	<!-- javascript -->
	<?= $js_for_layout ?>
</body>
</html>