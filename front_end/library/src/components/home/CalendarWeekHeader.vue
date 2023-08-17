<template>
  <th>
    <div class="bg-orange mt-3 w-[4em]">
      {{ day }}
    </div>
  </th>
</template>

<script>
export default {
  props: {
    day: {
      type: String,
      default: () => ''
    }
  }
}
</script>

