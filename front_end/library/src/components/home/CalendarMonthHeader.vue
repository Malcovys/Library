<template>
  <div class="
  p-2 flex justify-between rounded-t-lg  items-center">
  <div class="font-bold text-2xl capitalize">
  {{ fullMonth }} {{ year }}
</div>

  <div class="flex flex-row justify-between">
    <div
    class=" left cursor-pointer"
    @click="toggleMonth(-1)"
  >
    <i class="material-icons">
      keyboard_arrow_left
    </i>
  </div>
  

    <div
    class=" right cursor-pointer"
    @click="toggleMonth(+1)"
  >
    <i class="material-icons">
      keyboard_arrow_right
    </i>
  </div>
  </div>
  </div>
</template>

<script>
const MONTHS = [
  'january',
  'february',
  'march',
  'april',
  'may',
  'june',
  'july',
  'august',
  'september',
  'october',
  'november',
  'december'
];
export default {
  props: {
    year: {
      type: Number,
      default: () => 1970
    },
    month: {
      type: Number,
      default: () => 0
    }
  },
  computed: {
    fullMonth() {
      return MONTHS[this.month];
    }
  },
  methods: {
    toggleMonth(direction) {
      this.$emit('toggleMonth', direction)
    }
  }
};
</script>

