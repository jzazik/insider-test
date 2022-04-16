<template>
  <div>
    <h1>Fixtures</h1>
    <div class="flex flex-wrap gap-5">
      <fixture-week :fixtures="fixtures" :key="key" v-for="fixtures, key in fixturesByWeek"/>
    </div>
  </div>
</template>

<script>
import {mapState, mapGetters} from 'vuex'
import VTable from "./VTable";
import FixtureWeek from "./FixtureWeek";

export default {
  components: {
    VTable,
    FixtureWeek
  },
  props: {},
  data() {
    return {};
  },
  computed: {
    ...mapGetters(['fixtures']),
    fixturesByWeek() {
      return this.fixtures.reduce((result, fixture) => {
        result[fixture.week] = result[fixture.week] || [];
        result[fixture.week].push(fixture)
        return result
      }, {})
    }
  },
  methods: {}

};
</script>