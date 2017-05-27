<template>
<div class="modal" :class="{ 'is-active': visible }">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">
          <i class="fa fa-user-o"></i>
          Register and Login
        </p>
        <button class="delete" @click.prevent="$emit('login-close')"></button>
      </header>
      <section class="modal-card-body">
        <div class="columns">
          <div class="column">
            <login></login>
          </div>
          <div class="column">
            <register></register>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>

<script>
  import Login from './Login.vue';
  import Register from './Register.vue';
  export default {
    props: ['visible'],
    components: { Login, Register }
  }
</script>

<style scoped></style>
