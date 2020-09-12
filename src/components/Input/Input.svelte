<script lang="ts">
  /**
   * By default, Nano ID uses hardware random bytes generation
   * for security and low collision probability.
   * If you are not so concerned with security
   * and more concerned with performance,
   * you can use the faster non-secure generator.
   */
  import { nanoid } from 'nanoid/non-secure';

  export let value: string = '';
  export let label: string = '';
  export let type: string = 'text';
  export let error: string = '';
  export let hidePassword: boolean = true;

  /**
   * Note: IDs will be more predictable and prone to collision attacks.
   * but we don't care since we are generating only html ids for input texts,
   * and we can have at the very most 4 inputs in our pages, example: the register form.
   * so no big deal.
   */
  let id = nanoid(10);

  const toggleHidePassword = () => {
    hidePassword = !hidePassword;
  };
</script>

<div class="field">
  <label for={id}>{label}</label>
  {#if 'email' === type}
    <input type="email" class={error ? 'error' : ''} {id} bind:value />
  {:else if 'password' === type}
    <div class="password-group">
      {#if hidePassword}
        <input type="password" class={error ? 'error' : ''} {id} bind:value />
      {:else}
        <input type="text" class={error ? 'error' : ''} {id} bind:value />
      {/if}

      {#if value}
        <i class={`filled_eye${!hidePassword ? '-off' : ''}`} on:click={toggleHidePassword} />
      {/if}
    </div>
  {:else}
    <input type="text" class={error ? 'error' : ''} {id} bind:value />
  {/if}
  {#if error}
    <small>{error}</small>
  {/if}
</div>

<style type="scss">
  @import '../../assets/styles/variables.scss';
  @import '../../assets/styles/colors.scss';
  @import '../../assets/styles/fonts.scss';

  .field {
    color: $color-grey-900;
    font-family: $font-normal;
    margin-bottom: 22px;

    label {
      display: block;
      font-size: 16px;
      font-family: $font-medium;
      letter-spacing: 0;
      line-height: 21px;
      text-align: left;
      margin-bottom: $base-gutter-width;
    }

    input {
      box-sizing: border-box;
      width: 100%;
      height: 46px;
      font-size: 16px;
      line-height: 21px;
      text-align: left;
      padding: 0 $base-gutter-width * 2;
      border: 1px solid $color-grey-50;
      background-color: $color-grey-50;
      border-radius: 3px;
      font-family: $font-medium;

      &:hover {
        background-color: $color-grey-200;
      }

      &:focus {
        background-color: $color-grey-200;
        border: 1px solid $color-black;
        outline: none;
      }

      &.error {
        background-color: $color-error;
      }
    }

    small {
      display: block;
      font-size: 14px;
      color: #000000;
      font-weight: 300;
      text-align: left;
      margin-top: $base-gutter-width;
    }

    div.password-group {
      position: relative;

      input {
        padding-right: $base-gutter-width * 5;
      }

      i {
        position: absolute;
        right: $base-gutter-width;
        top: 12px;
        height: 24px;
        width: 24px;
        cursor: pointer;

        &.filled-eye {
          background-image: url('./icons/filled_eye.svg');
        }

        &.filled-eye-off {
          background-image: url('./icons/filled_eye-off.svg');
        }
      }
    }
  }
</style>
