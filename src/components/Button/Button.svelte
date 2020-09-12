<script lang="ts">

  export let buttonAction: ((event: MouseEvent) => void);
  export let size: string = 'med';
  export let type: string = 'button';
  export let theme: string = 'primary';
  export let disabled: boolean = false;
  export let buttonText: string = '';
  export let className: string = '';
</script>

<button
  on:click={buttonAction}
  class="btn {theme === 'primary' ? 'primary' : 'secondary'}
  {size === 'med' ? 'btn-m' : 'btn-s'}
  {className}"
  {disabled}
  {type}
>
  {#if buttonText}
    {buttonText}
  {:else}
    <slot />
  {/if}
</button>

<style lang="scss" global>
  @import '../../assets/styles/colors.scss';
  @import '../../assets/styles/variables.scss';

  button.btn {
    letter-spacing: 0;
    text-align: center;
    line-height: 18px;
    text-transform: uppercase;
    border: 1px solid transparent;
    border-radius: 24px;
    transition: 0.3s ease all;

    &:focus {
      outline: none;
    }

    &:hover {
      cursor: pointer;
      transform: translateY(-2px);
    }

    &:disabled {
      cursor: default;
    }

    &.primary {
      background-color: $color-grey-900;
      color: $color-white;

      &:hover {
        background-color: $color-900-hover;
        box-shadow: 0 7px 20px 0 rgba(0, 0, 0, 0.22);
      }

      &:disabled {
        background-color: $color-grey-300;
        box-shadow: none;
        margin-top: 0;
      }
    }

    &.secondary {
      background-color: $color-white;

      &:hover {
        background-color: $color-white;
        box-shadow: 0 7px 20px 0 rgba(0, 0, 0, 0.1);
      }

      &:disabled {
        color: $color-grey-300;
        box-shadow: none;
        margin-top: 0;
      }
    }

    &.btn-m {
      font-size: 14px;
      padding: $base-gutter-width * 2 $base-gutter-width * 3;
    }

    &.btn-s {
      font-size: 12px;
      padding: $base-gutter-width $base-gutter-width * 2;
    }
  }
</style>
