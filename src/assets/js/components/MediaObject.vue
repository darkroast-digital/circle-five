<template>
  <div class="c-media__object">
    <div class="c-media__object__left">
            <slot name="left"></slot>
        </div>
        <div class="c-media__object__content">
            <slot name="content"></slot>
        </div>
        <div class="c-media__object__right">
            <slot name="right"></slot>
        </div>
    </div>
</template>

<script>

export default {
  data () {
    return {

    }
  }
}

</script>