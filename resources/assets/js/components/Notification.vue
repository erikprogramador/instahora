<template>
  <transition name="show-notification">
    <div class="notification is-info alert-flash" v-show="visible">
      {{ body }}
    </div>
  </transition>
</template>

<script>
  export default {
    props: ['message'],
    data () {
      return {
        body: '',
        visible: false
      };
    },
    methods: {
      flash (message) {
        this.body = message;
        this.visible = true;

        this.hide();
      },

      hide () {
        setTimeout(() => this.visible = false, 3000);
      }
    },
    created () {
      if (this.message) {
        this.flash(this.message);
      }

      window.events.$on('flash', message => this.flash(message));
    }
  }
</script>

<style lang="scss" scoped>
  .alert-flash {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
  }

  .show-notification-enter-active, .show-notification-leave-active {
    transition: transform 300ms ease-in-out, opacity 200ms ease-in-out;
  }

  .show-notification-enter {
    transform: translateY(100%);
    opacity: 0;
  }

  .show-notification-leave-to {
    transform: translateY(100%);
    opacity: 0;
  }
</style>
