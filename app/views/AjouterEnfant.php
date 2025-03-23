<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Ajouter-enfant</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<p class="lead">
								Ajouter un enfant
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
								<form  method="POST">
										<div class="mb-3">
											<label for="nom_complet_enfant" class="form-label">Nom complet de l'enfant</label>
											<input id="nom_complet_enfant" class="form-control form-control-lg" type="text" name="nom_complet_enfant" placeholder="Entrez le nom complet de l'enfant" required />
										</div>
										
										<div class="mb-3">
											<label for="adresseMaison" class="form-label">Adresse de la maison</label>
											<input id="adresseMaison" class="form-control form-control-lg" type="text" name="adresseMaison" placeholder="Entrez l'adresse de la maison" required />
										</div>
										<div class="mb-3">
											<label for="idEcole" class="form-label">Nom École</label>
											<input id="idEcole" class="form-control form-control-lg" type="text" name="nomEcole" placeholder="Entrez le nom de  l'école" required />
										</div>
										<div class="mb-3">
											<label for="addEcole" class="form-label">Addresse École</label>
											<input id="addEcole" class="form-control form-control-lg" type="text" name="addEcole" placeholder="Entrez l'addresse de l'école" required />
										</div>
										<!-- Parent ID can be passed as a hidden field if needed -->
										<input type="hidden" name="idParent" value="1" /> 
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Ajouter enfant</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>
