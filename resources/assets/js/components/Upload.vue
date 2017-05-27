<template>
  <div class="modal" :class="{ 'is-active': uploading }">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">
          <i class="fa fa-user-o"></i>
          Register and Login
        </p>
        <button class="delete" @click.prevent="$emit('closed')"></button>
      </header>
      <section class="modal-card-body">
        <form action="/upload" method="post">
          <div>
            <label for="upload" class="button is-primary">
              Upload
            </label>
            <input type="file" name="picture" id="upload" class="hide" required>
          </div>
          <hr>
          <div class="field">
            <p class="control">
              <textarea name="description" id="description" class="textarea" placeholder="Description"></textarea>
            </p>
          </div>
          <div class="field">
            <button type="submit" class="button is-success">Upload</button>
          </div>
        </form>
      </section>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['uploading']
  }
</script>

<style lang="scss" scoped>
  .hide {
    opacity: 0;
  }
</style>
