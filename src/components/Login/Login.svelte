<script>
  import Textfield from '@smui/textfield'
  import Button, {Label} from '@smui/button';

  let email = "";
  let password = "";
  let isLoading = false;
  let isSuccess = false;
  export let submit;
  let errors = {};

  const handleSubmit = () => {
    errors = {};
    if (email.length === 0) {
      errors.email = "Field should not be empty";
    }
    if (password.length === 0) {
      errors.password = "Field should not be empty";
      
    }
    if (Object.keys(errors).length === 0) {
      isLoading = true;
      submit({ email, password })
        .then(() => {
          isSuccess = true;
          isLoading = false;
        })
        .catch(err => {
          errors.server = err;
          isLoading = false;
        });
    }
  };
</script>

<h1>Iniciar session</h1>

<form on:submit|preventDefault={handleSubmit}>
  <h1>👤</h1>

  <div>
  <Textfield 
    class="shaped-outlined"
    variant="outlined"
    type="email" 
    bind:value={email}
    label="Email" 
    input$autocomplete="email"
    input$aria-controls="helper-text-shaped-outlined-a" input$aria-describedby="helper-text-shaped-outlined-a"
  />
  </div>

  <div>
    <Textfield 
      class="shaped-outlined"
      variant="outlined"
      type="password" 
      bind:value={password}
      label="Password" 
    />
  </div>

  <div>
  <Button type="submit">
    <Label>{#if isLoading}Logging in...{:else}Log in 🔒{/if}</Label>
  </Button>
  </div>

  {#if Object.keys(errors).length > 0}
    <ul class="errors">
      {#each Object.keys(errors) as field}
        <li>{field}: {errors[field]}</li>
      {/each}
    </ul>
  {/if}
</form>
