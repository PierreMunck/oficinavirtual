<script lang="ts">
	export let name: string;
	import Login from './components/Login/Login.svelte';
</script>

<main>
	<h1>Iniciar session</h1>

	<Login/>
</main>

<style>
	main {
		text-align: center;
		padding: 1em;
		max-width: 240px;
		margin: 0 auto;
	}

	h1 {
		color: #0026ff;
		text-transform: uppercase;
		font-size: 4em;
		font-weight: 300;
	}

	@media (min-width: 640px) {
		main {
			max-width: none;
		}
	}
</style>