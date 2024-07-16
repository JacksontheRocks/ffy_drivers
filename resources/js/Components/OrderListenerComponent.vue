<template>
    <div>
        <p>Esperando órdenes...</p>
    </div>
</template>

<script>
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

export default {
    mounted() {
        Echo.channel('orders')
            .listen('OrderCreated', (event) => {
                alert('Nueva orden recibida: ' + event.order.id);
            });
    }
}
</script>
