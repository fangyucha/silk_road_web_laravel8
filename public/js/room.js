let room_id = window.location.href.split('/').pop()

let numUser = 0;
let arrUserId = [];

Pusher.logToConsole = true;

Echo.join(`room.${room_id}`)
    .here((users) => {
        numUser = users.length;
        updateNumUser()
    })
    .joining((user) => {
        numUser++;
        arrUserId.push(user.id);
        updateNumUser()
    })
    .leaving((user) => {
        numUser--;
        let index = arrUserId.indexOf(user.id);
        arrUserId.splice(index, 1);
        updateNumUser()
    })
// .listen('.RoomFull', (e) => {
//     console.log('full')
//     window.location.href = `/game/${room_id}`
// })

const player1 = document.getElementById('userNum_1');
const player2 = document.getElementById('userNum_2');
const player3 = document.getElementById('userNum_3');
const player4 = document.getElementById('userNum_4');

function updateNumUser() {
    switch (numUser) {
        case 1:
            player1.style.display = "block"
            player2.style.display = "none"
            player3.style.display = "none"
            player4.style.display = "none"
            break;
        case 2:
            player1.style.display = "block"
            player2.style.display = "block"
            player3.style.display = "none"
            player4.style.display = "none"
            break;
        case 3:
            player1.style.display = "block"
            player2.style.display = "block"
            player3.style.display = "block"
            player4.style.display = "none"
            break;
        case 4:
            player1.style.display = "block"
            player2.style.display = "block"
            player3.style.display = "block"
            player4.style.display = "block"
            window.location.href = `/game/${room_id}`
            break;
    }
}

//　離開頁面提醒
$(window).bind('beforeunload', function () {
    return 'Are you sure you want to leave?';
});
