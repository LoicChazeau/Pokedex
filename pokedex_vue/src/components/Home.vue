<style src="@/assets/style.css"></style>
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
						<li class="nav-item active">
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
						<input v-model="research" class="form-control mr-3" type="search" id="search" placeholder="Search pokemons" aria-label="Search" />
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
			<div class="row ml-3">
				<div v-for="(pokemon, count) in search(research)" :key="count" class="mt-5">
					<div class="col-3 mb-3 ml-4">
						<div class="card" style="width: 13rem;">
							<a :href="'http://localhost:8080/pokemon/' + pokemon.id" class="button">
								<img :src="require('../assets/img/' + pokemon.id + '.png')" alt="image du pokemon" class="card-img-top bg-l rounded" />
							</a>
							<div class="card-body">
								<h6 v-if="pokemon.id < 10" class="card-title text-secondary">No.00{{ pokemon.id }}</h6>
								<h6 v-if="pokemon.id >= 10 && pokemon.id < 100" class="card-title text-secondary">No.0{{ pokemon.id }}</h6>
								<h6 v-if="pokemon.id >= 100" class="card-title text-secondary">No.{{ pokemon.id }}</h6>
								<h5 class="">
									<strong>{{ pokemon.name }}</strong>
								</h5>
								<div class="row d-flex mt-3">
									<img
										:src="require('../assets/class/' + pokemon.types.type1 + '.png')"
										alt="type numero 1 du pokemon"
										width="40%"
										class="ml-3 mr-2"
									/>
									<img
										v-if="pokemon.types.type2"
										:src="require('../assets/class/' + pokemon.types.type2 + '.png')"
										alt="type numero 2 du pokemon"
										width="40%"
									/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "HelloWorld",
		data: function() {
			return {
				pokemons: "",
				pokemon: "",
				research: ""
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
			},
			search(research) {
				var array = "";
				array = this.pokemons.pokemons;

				var return_array = array.filter((element) => element.name.toLowerCase().search(research.toLowerCase()) !== -1);
				return return_array;
			}
		}
	};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
	.bg-blue {
		background-color: rgba(27, 52, 133, 0.884) !important;
	}
</style>
