import Vue from "vue";
import VueRouter from "vue-router";
import Pokemon from "@/components/Pokemon";
import Home from "@/components/Home";
import Profil from "@/components/Profil";

Vue.use(VueRouter);

const routes = [
	{
		path: "/",
		name: "Home",
		component: Home
	},
	{
		path: "/pokemon/:id",
		name: "Pokemon",
		component: Pokemon
	},
	{
		path: "/profil",
		name: "Profil",
		component: Profil
	}
];

const router = new VueRouter({
	mode: "history",
	base: process.env.BASE_URL,
	routes
});

export default router;
