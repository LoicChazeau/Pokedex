<template>
	<div id="app" class="bg">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dangerr container">
			<div class="row ml-2 mt-2 mb-2">
			<img src="@/assets/logo.png" alt="" width="20%" class="mb-1">
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
					<div v-if="!$auth.loading">
						<!-- show login when not authenticated -->
						<a v-if="!$auth.isAuthenticated" @click="login" class="ml-5 mr-5 text-white"><strong>Sign in</strong></a>
						<!-- show logout when authenticated -->
						<a v-if="$auth.isAuthenticated" @click="logout" class="ml-5 mr-5 text-white"><strong>Log out</strong></a>
					</div>
					<!-- <router-link to="/login" class="ml-5 text-white">Login</router-link>
					<router-link to="/register" class="mr-5 ml-4 text-white">Register</router-link> -->
				</form>
			</div>
			</div>
		</nav>
		<router-view />
	</div>
</template>

<script>
	export default {
		name: "App",
		methods: {
			// Log the user in
			login() {
				this.$auth.loginWithRedirect();
			},
			// Log the user out
			logout() {
				this.$auth.logout({
					returnTo: window.location.origin
				});
			}
		}
	};
</script>

<style>
	.bgp {
		background: #424242 url(https://assets.pokemon.com/static2/_ui/img/chrome/container_bg.png);
	}
	.bg-dangerr {
		background-color: #b44844 !important; 
	}
	.bg-blue {
		background-color: rgba(39, 67, 161, 0.884) !important;
	}
</style>
