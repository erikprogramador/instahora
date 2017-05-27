<template>
  <form action="/login" method="POST">
    <h3>Login</h3>
    <hr>
    <div class="field">
      <p class="control">
        <input type="text" name="username" class="input is-primary" placeholder="Username" required>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <input type="password" name="password" class="input is-primary" placeholder="Password" required>
      </p>
    </div>
    <div class="field">
      <button type="submit" class="button is-info">Login</button>
    </div>
  </form>
</template>

<script>
  export default {}
</script>

<style lang="scss" scoped>

</style>
