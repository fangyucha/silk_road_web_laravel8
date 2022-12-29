let room_id = window.location.href.split('/').pop()

Pusher.logToConsole = true;

Echo.join(`room.${room_id}`)
    .listen('DoMovement', (e) => {
        console.log('hi')
    })
