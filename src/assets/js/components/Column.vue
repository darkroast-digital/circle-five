<template>
  <div class="column" v-bind:class="classes">
    <slot></slot>
  </div>
</template>

<script>

export default {
  data () {
    return {

    }
  },

  props: {
    is1: Boolean,
    is2: Boolean,
    is3: Boolean,
    is4: Boolean,
    is5: Boolean,
    is6: Boolean,
    is7: Boolean,
    is8: Boolean,
    is9: Boolean,
    is10: Boolean,
    is11: Boolean,
    is12: Boolean,
  },

  computed: {
    classes () {
      return {
        'column-1': this.is1,
        'column-2': this.is2,
        'column-3': this.is3,
        'column-4': this.is4,
        'column-5': this.is5,
        'column-6': this.is6,
        'column-7': this.is7,
        'column-8': this.is8,
        'column-9': this.is9,
        'column-10': this.is10,
        'column-11': this.is11,
        'column-12': this.is12,
      }
    }
  }
}

</script>