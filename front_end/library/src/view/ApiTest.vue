<template>
    <div v-if="adherent" class="left-50">
        L'id est {{ adherent.id_adherent }}
    </div>
    <div v-else>
        Liading...
    </div>
</template>

<script>
import { API_URL } from '../config';

export default {
    data() {
        return {
            adherent: null
        }
    },
    mounted() {
        fetch(API_URL)
        .then(res => res.json())
        .then(data => this.adherent = data)
        .catch(err => console.log(err.message))
    }
}
</script>