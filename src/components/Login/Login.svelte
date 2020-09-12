<script>
  import Input from '../Input/Input.svelte';
  import Button from '../Button/Button.svelte';

  const handleSubmit = async () => {
    
  }
</script>

<div class="login">
  <h2 class="login-title">binevenido a tu oficina virtual</h2>

  <form on:submit|preventDefault={handleSubmit}>
    <Input
      type="email"
      label="email"
      error=""
    />

    <Input
      type="password"
      label="password"
      error=""
    />

    <Button type="submit" className="login-submit">
      submit
    </Button>
  </form>
</div>
