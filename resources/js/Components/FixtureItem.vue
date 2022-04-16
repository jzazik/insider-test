<template>
<div class="flex">
  <div>Home {{ fixture.home }} - {{ fixture.away }}</div>
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