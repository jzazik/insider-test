<template>
<div class="flex gap-5 justify-between">
  <div>{{ fixture.home }}</div>
  <div>{{ fixture.home_group_team_score }} - {{ fixture.away_group_team_score }}</div>
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