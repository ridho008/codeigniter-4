<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/mystyle.css">
</head>
<body>

<!-- Navbar -->
<?= $this->include('layout/navbar'); ?>
<!-- End Navbar -->

<!-- Content -->
<?= $this->renderSection('content'); ?>
<!-- End Content -->


<script src="/assets/js/bootstrap.min.js"></script>
<script>
	function priviewImg() {
		const sampul = document.querySelector('#sampul');
		const sampulLabel = document.querySelector('.custom-file-label');
		const imgPriview = document.querySelector('.img-priview');

		sampulLabel.textContent = sampul.files[0].name;

		const fileSampul = new FileReader();
		fileSampul.readAsDataURL(sampul.files[0]);

		fileSampul.onload = function(e) {
			imgPriview.src = e.target.result;
		}
	}
</script>
</body>
</html>