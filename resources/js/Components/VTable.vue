<template>
  <table class="w-full text-left border-collapse">
    <thead>
      <tr>
        <th
          :key="th"
          v-for="th in thArr"
          class="sticky whitespace-nowrap top-0 bg-white text-sm leading-6 font-semibold text-slate-700 p-0 dark:bg-slate-900 dark:text-slate-300"
        >
          <div
            class="py-2 pr-2 border-b border-slate-200 dark:border-slate-400/20"
          >
            {{ th }}
          </div>
        </th>
      </tr>
    </thead>
    <tbody class="align-baseline">
      <slot />
    </tbody>
  </table>
</template>
<script>
export default {
  props: {
    thArr: Array,
  },
};
</script>
