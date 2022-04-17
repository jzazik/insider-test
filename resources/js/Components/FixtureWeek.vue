<template>
  <v-table :th-arr="[weekName]">
    <tr 
      v-for="fixture in fixtures" :key="fixture.id" 
      class="hover:bg-sky-800"
    >
      <td class="py-2 pr-2 font-mono font-bold text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400">
        <fixture-item :fixture="fixture" />
      </td>

    </tr>
  </v-table>
  
</template>

<script>
import VTable from "./VTable";
import FixtureItem from "./FixtureItem";

export default {
  components: {
    VTable,
    FixtureItem
  },
  props: {
    fixtures: Array
  },
  data() {
    return {};
  },
  computed: {
    weekName() {
      return 'Week ' +  this.fixtures[0].week
    }
  },
  methods: {}

};
</script>