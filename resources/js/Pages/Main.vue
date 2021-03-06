<template>
  <div class="flex justify-between mb-5">
    <h1>{{ league.name }}</h1>
    <v-button v-if="!fixtures.length" @click="generateFixtures">Generate fixtures</v-button>
    <div v-else class="flex gap-3">
      <v-button @click="simulateWeek">Simulate one week</v-button>
      <v-button @click="simulateAllWeeks">Simulate all weeks</v-button>
      <v-button @click="resetGroup">Reset group</v-button>
    </div>
  </div>
  <main class="pt-5 border-t border-cyan-500">
    <group-table :group="currentGroup"/>
    <fixture-list v-if="fixtures.length" class="mt-10" :fixtures="fixtures"/>
  </main>
</template>

<script>
import Layout from "../Layouts/Layout";
import GroupTable from "../Components/GroupTable";
import VButton from "../Components/VButton";
import axios from "axios";
import {mapState, mapGetters} from 'vuex'
import FixtureList from "../Components/FixtureList";

export default {
  layout: Layout,
  components: {
    VButton, 
    GroupTable,
    FixtureList
  },
  props: {
    data: Object
  },
  computed: {
    ...mapGetters(['currentGroup', 'fixtures']),
    ...mapState(['league'])
  },
  methods: {
    generateFixtures() {
      this.handleRequest(
        `/api/group/generate/fixtures/${this.currentGroup.id}`,
        {success_text: 'Fixtures generated successfully'}
      )
    },
    simulateWeek() {
      this.handleRequest(
        `/api/group/simulate/week/${this.currentGroup.id}`, 
        { success_text: 'Week simulated successfully'}
      )
    },
    simulateAllWeeks() {
      this.handleRequest(
        `/api/group/simulate/week/all/${this.currentGroup.id}`, 
        { success_text: 'All weeks simulated successfully'}
      )
    },
    resetGroup() {
      this.handleRequest(
        `/api/group/reset/${this.currentGroup.id}`, 
        { success_text: 'Reset success'}
      )
    },
    async handleRequest(url, params) {
      try {
        const {data} = await axios.post(url)
        this.$store.dispatch("syncLeague", data);
        this.$snackbar.add({
          type: 'success',
          text: params.success_text
        })
      } catch (e) {
        console.error(e)
      }
    }
  },
  created() {
    this.$store.dispatch("syncLeague", this.data);
  }
};
</script>
