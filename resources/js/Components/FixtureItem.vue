<template>
<div class="flex gap-10 justify-between">
  <div>{{ fixture.home }}</div>
  <div>-</div>
  <div>{{ fixture.away }}</div>
</div>
</template>

<script>
export default {
  components: {},
  props: {
    fixture: Object
  },
  data() {
    return {};
  },
  computed: {},
  methods: {}

};
</script>