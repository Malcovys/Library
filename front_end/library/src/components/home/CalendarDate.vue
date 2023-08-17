<template>
  <td>
    <div
      v-show="date"
      class="h-10 w-[4em] flex items-center justify-center rounded-full cursor-pointer"
      :class="{
        'bg-pink-200 border-pink-500 border-2': isToday,
        'border-pink-500 border-2': isSelected
      }"
      @click="selectDate"
    >
      {{ date }}
    </div>
  </td>
</template>

<script>
export default {
  props: {
    date: {
      type: Number,
      default: () => 1
    },
    isToday: {
      type: Boolean,
      default: false
    },
    isSelected: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    selectDate() {
      this.$emit('selectDate', this.date);
    }
  }
};
</script>
