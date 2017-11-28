<template>
    <div class="c-card">
        <figure class="c-card__image"><slot name="image"></slot></figure>
        <header class="c-card__header"><slot name="header"></slot></header>
        <div class="c-card__content"><slot></slot></div>
        <footer class="c-card__footer"><slot name="footer"></slot></footer>
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