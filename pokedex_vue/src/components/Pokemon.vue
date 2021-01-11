<template>
	<div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dangerr container">
			<div class="row ml-2 mt-2 mb-2">
				<img src="@/assets/logo.png" alt="logo pokedex" width="20%" class="mb-1" />
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
						<li class="nav-item" id="home">
							<a class="nav-link ml-5" href="http://localhost:8080/">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item" id="profil">
							<a class="nav-link ml-4" href="/profil">Profil <span class="sr-only">(current)</span></a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0 mr-5">
						<div class="text-white ml-4" v-if="$auth.isAuthenticated">
							<strong>Welcome {{ $auth.user.nickname }}</strong>
						</div>
						<div v-if="!$auth.loading">
							<a v-if="!$auth.isAuthenticated" @click="login" class="ml-5 mr-5 text-white"><strong>Sign in</strong></a>
							<a v-if="$auth.isAuthenticated" @click="logout" class="ml-5 mr-5 text-white"><strong>Log out</strong></a>
						</div>
					</form>
				</div>
			</div>
		</nav>
	</div>
</template>

<script>
	export default {
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
			},
			search() {}
		}
	};
</script>
