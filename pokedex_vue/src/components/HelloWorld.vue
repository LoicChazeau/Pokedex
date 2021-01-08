<style src="@/assets/style.css"></style>
<template>
	<div>
		<div class="bgp bg-blue container">
			<div class="row ml-3">
				<div v-for="(pokemon, count) in pokemons.pokemons" :key="count" class="">
					<div class="col-3 mt-5 ml-4">
						<div class="card" style="width: 13rem;">
							<img :src="require('../assets/img/' + pokemon.id + '.png')" alt="" class="card-img-top bg-l rounded" />
							<div class="card-body">
								<h6 v-if="pokemon.id < 10" class="card-title text-secondary">No.00{{ pokemon.id }}</h6>
								<h6 v-if="pokemon.id >= 10 && pokemon.id < 100" class="card-title text-secondary">No.0{{ pokemon.id }}</h6>
								<h6 v-if="pokemon.id >= 100" class="card-title text-secondary">No.{{ pokemon.id }}</h6>
								<h5 class="">
									<strong>{{ pokemon.name }}</strong>
								</h5>
								<div class="row d-flex mt-3">
									<img :src="require('../assets/class/' + pokemon.types.type1 + '.png')" alt="" width="40%" class="ml-3 mr-2" />
									<img v-if="pokemon.types.type2" :src="require('../assets/class/' + pokemon.types.type2 + '.png')" alt="" width="40%" />
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
				pokemon: ""
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
