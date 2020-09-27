<script lang="ts">
  import { onMount, setContext } from "svelte";
  //import {
  //  key as userContextKey,
  //  initialValue as userContextInitialValue
  //} from "./userContext";
  import Login from './components/Login/Login.svelte';
  import Home from './components/Home.svelte';

  onMount(() => {
    //setContext(userContextKey, userContextInitialValue);
  });

  export let loged = false;
  const submit = ({ email, password }) =>
    new Promise((resolve, reject) => {
      setTimeout(() => {
        
		console.log(email);
		console.log(password);
		console.log(loged);
		loged = true;
		console.log(loged);
        resolve();
      }, 5000);
  });
</script>

<main>

	{#if loged == true}
		<Home/>
	{:else}
		<section>
		<Login {submit}/>
		</section>
	{/if}
</main>