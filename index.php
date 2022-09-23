<!DOCTYPE html>
<html lang="en">
<head><title>Cancer Mitr</title>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<script src="https://unpkg.com/vue"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="searchfilter.css">
</head>
<body>

<?php
	// $pdo = new PDO("mysql:host=localhost;dbname=cancermitr", 'root', '');
	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<div id="app" class="container-fluid mt-5">
	<mycomponent></mycomponent>
</div>

<script>
const app = Vue.createApp({
	data() {
		return {}
	}
})
</script>
<script src="component.js"></script>
<script src="upload.js"></script>
<script> const mountedApp = app.mount('#app') </script>
</body>
</html>