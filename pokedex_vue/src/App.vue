<template>
	<div id="app" class="bgp">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dangerr container">
			<h1 class="navbar-brand ml-5 mr-2 text-primary mt-2 font-weight-bold">POKEDEX</h1>
			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link ml-5" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link ml-4" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link ml-4" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
					<button class="btn btn-outline-dark my-2 my-sm-0 mr-5" type="submit">Search</button>
					<router-link to="/login" class="ml-5 text-white">Login</router-link>
					<router-link to="/register" class="mr-5 ml-4 text-white">Register</router-link>
				</form>
			</div>
		</nav>
		<router-view />
	</div>
</template>

<style>
	.bgp {
		background: #424242 url(https://assets.pokemon.com/static2/_ui/img/chrome/container_bg.png);
	}
	.bg-dangerr {
		background-color: #a83f3b !important;
	}
</style>
