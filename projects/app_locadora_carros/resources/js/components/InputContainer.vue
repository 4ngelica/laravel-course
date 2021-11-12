<template>
  <div class=" col form-group">
    <label :for="id">{{title}}</label>
    <slot></slot>
    <small :id="idHelp" class="form-text text-muted">{{helpText}}</small>
  </div>
</template>

<script>
    export default {
      props: ['id', 'title', 'helpText', 'idHelp']
    }
</script>
