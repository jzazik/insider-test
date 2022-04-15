<template>
  <div class="flex justify-between mb-5">
    <h1>{{ league.name }}</h1>
    <v-button v-if="!fixtures.length" @click="generateFixtures">Generate fixtures</v-button>
  </div>
  <main class="pt-5 border-t border-cyan-500">
    <group-table :group="currentGroup"/>
    <fixture-list/>
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
    async generateFixtures() {
      try {
        const { data } = await axios.post('/api/fixtures/generate/' + this.currentGroup.id)
        this.$store.dispatch("syncLeague", data);
        this.$snackbar.add({
          type: 'success',
          text: 'Fixtures generated successfully'
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
