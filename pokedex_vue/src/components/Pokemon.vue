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
						<li class="nav-item">
							<a class="nav-link ml-3" href="http://localhost:8080/">Pokemon <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="/trade">Trade <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="/myteam">My Team <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="/profil">Profil <span class="sr-only">(current)</span></a>
						</li>
					</ul>
					<form class="form-inline">
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
		<div class="container bg-blue bgp mb-5">
			{{ pokemons.pokemons }}
		</div>
	</div>
</template>

<script>
	export default {
		data: function() {
			return {
				pokemons: "",
				pokemon: "",
			};
		},
		mounted: function() {
			var requestOptions = {
				method: "GET",
				redirect: "follow"
			};

			fetch("http://127.0.0.1:8000/api/pokemons", requestOptions)
				.then((response) => response.text())
				.then((result) => console.log((this.pokemons = JSON.parse(result))))
				.catch((error) => console.log("error", error));
		},
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
