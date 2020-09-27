<div class="grid-container">
  <slot />
</div>

<style lang="scss">

  @import '../../theme/breakpoint.scss';

  .grid-container {
    display: grid;
    justify-content: center;
    grid-template-columns: repeat(4, minmax(60px, 1fr));
    grid-auto-rows: minmax(min-content, max-content);
    grid-column-gap: $base-gutter-width * 2;
    grid-row-gap: $base-gutter-width * 2;
    margin: 0 $base-gutter-width * 2;
    height: 100%;

    @include breakpoint(s) {
      grid-auto-rows: max-content;
    }
  }

  @include breakpoint(m) {
    .grid-container {
      grid-template-columns: repeat(12, minmax(46px, 1fr));
    }
  }

  @include breakpoint(l) {
    .grid-container {
      grid-template-columns: repeat(12, minmax(64px, 1fr));
      margin: 0 $base-gutter-width * 5;
    }
  }

  @include breakpoint(xl) {
    .grid-container {
      grid-template-columns: repeat(12, minmax(80px, 1fr));
      margin: 0 $base-gutter-width * 4;
    }
  }

  @include breakpoint(xxl) {
    .grid-container {
      grid-template-columns: repeat(12, minmax(80px, 1fr));
    }
  }


</style>