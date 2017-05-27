<template>
  <form action="/register" method="POST">
    <h3>Register</h3>
    <hr>
    <div class="field">
      <p class="control">
        <input type="text" name="name" class="input is-primary" placeholder="Username" required>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <input type="email" name="email" class="input is-primary" placeholder="E-mail" required>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <input type="password" name="password" class="input is-primary" placeholder="Password" required>
      </p>
    </div>
    <div class="field">
      <p class="control">
        <textarea name="description" id="description" class="textarea" placeholder="Description"></textarea>
      </p>
    </div>
    <div class="field">
      <button type="submit" class="button is-success">Register</button>
    </div>
  </form>
</template>

<script>
  export default {}
</script>

<style lang="scss" scoped>

</style>
