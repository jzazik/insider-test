<template>
  <h1>Group {{ group.name }}</h1>
  <v-table class="w-full" :th-arr="[ 'Team name', 'PTS', 'P', 'W', 'D', 'L', 'GD']">
    <tr v-for="team in teamsSorted" :key="team.id" class="hover:bg-sky-800">
      <td
        class="py-2 pr-2 font-mono font-bold text-xs leading-6 text-sky-500 whitespace-nowrap dark:text-sky-400"
      >
        {{ team.name }}
      </td>
      <td class="py-2 px-2 text-xs italic">
        {{ team.results.pts }}
      </td>
      <td class="py-2 px-2 text-xs italic">
        {{ team.results.p }}
      </td>
      <td class="py-2 px-2 text-xs italic">
        {{ team.results.w }}
      </td>
      <td class="py-2 px-2 text-xs italic">
        {{ team.results.d }}
      </td>
      <td class="py-2 px-2 text-xs italic">
        {{ team.results.l }}
      </td>
      <td class="py-2 px-2 text-xs italic">
        {{ team.results.gd }}
      </td>
    </tr>
  </v-table>
</template>

<script>
import VTable from "./VTable";
import VButton from "./VButton";

export default {
  components: {
    VTable,
    VButton
  },
  props: {
    group: Object
  },
  data() {
    return {};
  },
  computed: {
    teamsSorted() {
      const teams = [...this.group.teams]
      return teams.sort((team1, team2) => {
        const ptsDiff = team2.results.pts - team1.results.pts
        const gdDiff = team2.results.gd - team1.results.gd
        
        return ptsDiff !== 0 ? ptsDiff : gdDiff
        
      })
    }
  },
  methods: {
    
  },
};
</script>
<style></style>
