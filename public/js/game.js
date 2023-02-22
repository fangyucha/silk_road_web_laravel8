/*===========================================================
UI
=============================================================*/
/* 離開頁面提示 */
/* TODO: 移除註解
window.onbeforeunload = function (event) {
    // 當使用者要離開或關閉目前頁面時
    // 返回要顯示給使用者看的提醒文字
    return '你確定要離開遊戲頁面嗎？';
};
*/

/* 側邊滑欄 */
// 展開滑欄
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}

// 關閉滑欄
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

// 開啟遊戲規則
function openRule() {
    window.open("../gameRule", "newwindow", "height=850, width=500, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no")
}
// 開啟歷史頁面
function openHistory() {
    window.open("../index", "newwindow", "height=850, width=500, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no")
}
// 開啟開發者頁面
function openDevelopment() {
    window.open("../gameDevelopment", "newwindow", "height=850, width=500, toolbar =no, menubar=no, scrollbars=no, resizable=no, location=no, status=no")
}

/*===========================================================
遊戲功能
=============================================================*/

/* 變數 */
const panel_map = document.querySelector("#map") // 地圖
const panel_movement = document.querySelector(".movement") // 四個動作格
const panel_store = document.querySelector(".store")
const panel_movement_complete = document.querySelector(".movement_complete") // 動作完成提示
const panel_walking = document.querySelector(".walking")
const card_walk = document.querySelector("#walk") // 行走card
const card_building = document.querySelector("#building") // 建築card
const card_trade = document.querySelector("#trade") // 交易card
const card_rob = document.querySelector("#rob") // 掠奪card
const card_cancel = document.querySelector("#cancel") // 結束card
const building_content = document.querySelector("#building_content") // 建築的顯示內容
const user_attributes = document.querySelector("#user_attributes") // 個人數值表
const movement_complete_content = document.querySelector("#movement_complete_content") // 動作完成提示內容
// slider
const slider = document.querySelector("#slider")
const selector = document.querySelector("#selector")
const selectValue = document.querySelector("#selectValue")
const progressBar = document.querySelector("#progressBar")
//
const character = document.querySelector(".character").innerHTML.split('\n        ')[1].split('\n')[0] // 玩家身分=[0-constan, 1-samar, 2-dunhunang, 3-changan]
let player = document.querySelector(`#player_${character}`)
let btn_loc = player.parentElement // 位置, 確保建築物蓋在button的背景
let pre_btn_loc = ""
let loc = "" // 地形類別
let movement_complete_text = "" // 紀錄做的動作
let trade_target = "" // 紀錄交易的物品
let attributes = { // 該玩家數值
    money: 10, station: 0, fort: 0, temple: 0, supply: 0
}
display_user_attributes(attributes) //刷新玩家數值 TODO:僅供demo用，之後要刪除，確認預設值之後可以設在html(減少刷新)
let temp_attributes = Object.assign({}, attributes) // 暫存玩家數值，供undo movement
let movementType = "" // 紀錄動作類別
let building = "" // 紀錄建築

/* movement listener */
$('.card').on('click', function (event) {
    panel_movement.style.display = "none"
    let target = event.target

    temp_attributes = Object.assign({}, attributes) // 暫存玩家當前數值
    // 選擇回合動作
    if (target.classList.contains("walk")) {
        // 行走
        panel_walking.style.display = "block"
        walk()
    } else if (target.classList.contains("building")) {
        // 建造
        build()
        display_movement_complete()
    } else if (target.classList.contains("rob")) {
        // 掠奪
        rob()
        display_movement_complete()
    } else if (target.classList.contains("trade")) {
        // 交易
        display_store()
    } else if (target.classList.contains("cancel")) {
        // 取消
        // TODO 取消
        movement_complete_text = "結束回合"
        movementType = "cancel"
        display_movement_complete()
    }
})

/* 四個動作function*/
function walk() {
    movement_complete_text = "移動"
    movementType = "walk"
    player.addEventListener('dragstart', dragStart)
    player.addEventListener('dragend', dragEnd)
}

// 建造
function build() {
    if (loc == "城鎮") {
        movement_complete_text = "建造驛站"
        movementType = 'build_castle'
        building = 'castle'
        //temp_attributes["money"] -= 0 驛站不用錢
        temp_attributes["station"] += 1

        let img = new Image()
        img.src = "../img/station.png"
        img.draggable = "false"
        img.setAttribute("class", "building_img")
        img.id = character // 紀錄建築物屬於誰
        btn_loc.parentElement.appendChild(img) // 建造
    } else if (loc == "聖地") {
        movement_complete_text = "花費 $5 建造神廟"
        movementType = 'build_temple'
        building = 'temple'
        temp_attributes["money"] -= 5
        temp_attributes["temple"] += 1

        let img = new Image()
        img.src = "../img/temple.png"
        img.draggable = "false"
        img.setAttribute("class", "building_img")
        img.id = character // 紀錄建築物屬於誰
        btn_loc.parentElement.appendChild(img) // 建造
    } else { //其他地形
        movement_complete_text = "花費 $3 建造要塞"
        movementType = 'build_fort'
        building = 'fort'
        temp_attributes["money"] -= 3
        temp_attributes["fort"] += 1

        let img = new Image()
        img.src = "../img/fortress.png"
        img.draggable = "false"
        img.setAttribute("class", "building_img")
        img.id = character // 紀錄建築物屬於誰
        btn_loc.parentElement.appendChild(img) // 建造
        //btn_loc.classList.add('builded') // 建造
    }
}

// 掠奪
function rob() {
    movement_complete_text = "花費 $3 掠奪"
    movementType = 'rob'
    temp_attributes["money"] -= 3
    //e.nextElementSibling.remove() // 拆除
}
// 判斷有沒有他人的建築
function has_others_building(e, my_character) {
    let others_building = e.nextElementSibling
    if (others_building && others_building.id != my_character) { // 有其他玩家的建築
        return true
    }
    return false
}

// 交易-購買坐騎
//馬
function buy_horse() {
    movement_complete_text = "購買坐騎-馬"
    movementType = 'buy_horse'
    temp_attributes["money"] -= 5
}
//駱駝
function buy_camel() {
    movement_complete_text = "購買坐騎-駱駝"
    movementType = 'buy_camel'
    temp_attributes["money"] -= 5
}

let sell_benefit = 0 // 賣出特產的利潤
let unit_price = 0
// 交易-賣出特產
function sell() {
    let store_loc = btn_loc.children[0].innerText // 現在所在的大城市名稱 [君坦,撒馬,敦煌,長安]
    // 依照不同身分顯示特產名稱;在不同區域販賣的價錢 [constan, samar, dunhunang, changan]
    switch (character) {
        case '0': //'constan'
            switch (store_loc) {
                case '君堡':
                    unit_price = 1
                    break
                case '撒馬':
                    unit_price = 2
                    break
                case '敦煌':
                    unit_price = 3
                    break
                case '長安':
                    unit_price = 4
                    break
            }
            movement_complete_text = `賣出${slider.value}個黃金 獲得 $${unit_price * slider.value}`
            break
        case '1': //'samar'
            switch (store_loc) {
                case '君堡':
                    unit_price = 2
                    break
                case '撒馬':
                    unit_price = 1
                    break
                case '敦煌':
                    unit_price = 2
                    break
                case '長安':
                    unit_price = 3
                    break
            }
            movement_complete_text = `賣出${slider.value}個香料 獲得 $${unit_price * slider.value}`
            break
        case '2': //'dunhuang'
            switch (store_loc) {
                case '君堡':
                    unit_price = 3
                    break
                case '撒馬':
                    unit_price = 2
                    break
                case '敦煌':
                    unit_price = 1
                    break
                case '長安':
                    unit_price = 2
                    break
            }
            movement_complete_text = `賣出${slider.value}個經書 獲得 $${unit_price * slider.value}`
            break
        case '3': //'changan'
            switch (store_loc) {
                case '君堡':
                    unit_price = 4
                    break
                case '撒馬':
                    unit_price = 3
                    break
                case '敦煌':
                    unit_price = 2
                    break
                case '長安':
                    unit_price = 1
                    break
            }
            movement_complete_text = `賣出${slider.value}個絲綢 獲得 $${unit_price * slider.value}`
            break

    }
    movementType = 'sell'
    sell_benefit = unit_price * slider.value
    temp_attributes["money"] += sell_benefit
    temp_attributes["supply"] -= slider.value
}

/* slider listener */
slider.oninput = function () {
    selectValue.innerHTML = this.value
    selector.style.left = (this.value / slider.max * 100) + "%"
    progressBar.style.width = (this.value / slider.max * 100) + "%"
}

/* 顯示_slider & reset slider*/
function display_slider() {
    // display_數量從0開始
    selectValue.innerHTML = 0
    selector.style.left = "0%"
    progressBar.style.width = "0%"
    // reset_數量從0開始
    slider.value = 0
    // reset_依照現有特產數量更改slider max
    slider.max = attributes["supply"]
}
display_slider()

/* 顯示_商店 */
function display_store() {
    panel_store.style.display = "block"
    /* GM商店 listener */
    $('.store').on('click', function (event) {
        let target = event.target
        if (target.id == 'sell') {
            sell()
            display_trade_complete(target)
        } else if (target.id == 'horse') {
            buy_horse()
            display_trade_complete(target)
        } else if (target.id == 'camel') {
            buy_camel()
            display_trade_complete(target)
        } else if (target.id == 'close') {
            movement_complete_text = "確認完成交易"
            movementType = 'trade'
            display_trade_complete(target)
        }
    })
}

/* 顯示_交易完成提示 */
function display_trade_complete(trade) {
    panel_movement_complete.style.display = "block"
    movement_complete_content.textContent = movement_complete_text
    trade_target = trade
    /*button listener*/
    $('.movement_complete button').one('click', function (event) {
        let target = event.target
        /* 確認 */
        if (target.id == "do_movement") {
            panel_movement_complete.style.display = "none"
            pre_btn_loc.style.border = "";
            attributes = Object.assign({}, temp_attributes) // 把暫存的玩家數值變成真的
            display_user_attributes(attributes)

            if (trade_target.id == "horse") {
                trade_target.hidden = true // 如果購買坐騎 就隱藏該物品
                document.querySelector("#ride_horse").style.display = ""
                step_num += 4
                step.innerHTML = step_num
            } else if (trade_target.id == "camel") {
                trade_target.hidden = true // 如果購買坐騎 就隱藏該物品
                document.querySelector("#ride_camel").style.display = ""
                step_num += 2
                step.innerHTML = step_num
                has_camel = true
            } else if (trade_target.id == "close") {
                panel_store.style.display = "none" //關閉商店
                $('.store').off('click') // 商店的click事件註銷
                doneMovement(current_player_id)
            }
            display_slider() // 更新slider數值

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/game/doMovement",
                data: {
                    "movementType": movementType,
                    "character": character,
                    "roomid": roomid,
                    "attributes": attributes,
                },
                success: function (data) {
                    console.log(data)
                },
                error: function (data) {
                    console.log(data)
                }
            })

        } else { /* 取消 */
            panel_movement_complete.style.display = "none"
        }
        $('.movement_complete button').off('click')

    })
}

/** 顯示_動作完成提示
 *
 * button
 * 確認 -> 刷新數值
 * 取消 -> 重選一次動作
 *
 * */
function display_movement_complete() {
    panel_movement_complete.style.display = "block"
    movement_complete_content.textContent = movement_complete_text

    /*button listener*/
    $('.movement_complete button').one('click', function (event) {
        let target = event.target
        /* 確認 */
        if (target.id == "do_movement") {
            panel_movement_complete.style.display = "none"
            pre_btn_loc.style.border = "";
            attributes = Object.assign({}, temp_attributes) // 把暫存的玩家數值變成真的
            display_user_attributes(attributes)
            doneMovement(current_player_id)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/game/doMovement",
                data: {
                    "movementType": movementType,
                    "character": character,
                    "roomid": roomid,
                    "btn_loc": btn_loc.id,
                },
                success: function (data) {
                    console.log(data)
                },
                error: function (data) {
                    console.log(data)
                }
            })

        } else { /* 取消 */
            panel_movement_complete.style.display = "none"
            panel_movement.style.display = "block" // 再選一次動作
            // 移除建造的標籤 TODO:應該要換個地方驗證
            //btn_loc.classList.remove('builded')
            btn_loc.parentElement.removeChild(btn_loc.parentElement.childNodes[btn_loc.parentElement.childNodes.length - 1])
        }
        $('.movement_complete button').off('click') //click事件註銷

    })
}

let otherCastle = 0 //計算是否有其他人的城堡
let playerInfo = {}
let steps_id = new Array();
let steps_id_json;

/* 顯示_行走完成 */
function display_walk_complete(ev) {
    panel_movement_complete.style.display = "block"
    movement_complete_content.textContent = movement_complete_text
    /*button listener*/
    $('.movement_complete button').one('click', function (event) {
        let target = event.target
        steps.forEach(e => { steps_id.push(e.id) })
        /* 確認 */
        if (target.id == "do_movement") {
            ohterCastle = 0 // reset otherCastle
            steps.forEach(e => { e.classList.remove('round_walk') })
            steps.forEach(e => { e.nextElementSibling ? otherCastle++ : null })
            steps_id_json = JSON.stringify(steps_id)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({ //walk
                type: "POST",
                url: "/game/doMovement",
                dataType: 'json',
                data: {
                    "movementType": movementType,
                    "character": character,
                    "roomid": roomid,
                    "stepsCount": steps.length,
                    "otherCastle": otherCastle,
                    "steps": steps_id_json, // event pusher
                },
                success: function (data) {
                    playerInfo = data
                    console.log(data)
                    pre_btn_loc.style.border = ""
                    doMovementAfterWalk()
                },
                error: function (data) {
                    console.log(data)
                }
            })

            steps.forEach(e => { e.classList.add('walked') })
            //doneMovement(current_player_id) 走路後還可以做動作

        } else { /* 取消 */
            // TODO 檢查哪裡讓event on 兩次
            steps.forEach(e => { e.classList.remove('round_walk') })
            document.getElementById(steps_id.slice(-1)).removeChild(document.getElementById(drag_player))
            player = drag_player_clone
            drag_start.appendChild(player)
            panel_movement.style.display = "block" // 再選一次動作
        }
        $('.movement_complete button').off('click') //click事件註銷
        panel_movement_complete.style.display = "none"
    })
    player.removeEventListener('dragstart', dragStart)
    player.removeEventListener('dragend', dragEnd)
}

/* 顯示_玩家數值 */
// 個人數值
function display_user_attributes(attributes) {
    let col = 3 //步數~特產attributes刷新
    for (let key in attributes) {
        user_attributes.children[col].children[0].textContent = attributes[key]
        col += 2
    }
}

// TODO:所有玩家數值
function display_all_user_attributes() {

}

/*drag and drop*/
const drop_container = document.querySelectorAll('button[data-role="drag-drop-container"]') // 所有地
const drop_container_other = document.querySelectorAll('button.butt_c, .butt_t, .butt_h, .butt_g, .butt_m[data-role="drag-drop-container"]') // 除了沙漠的地
const drop_container_dessert = document.querySelectorAll('button.butt_s[data-role="drag-drop-container"]') // 沙漠
const step = document.querySelector('#step')
let drop_players = document.querySelectorAll('img[data-role="player"]') // 所有玩家的位置
step.innerHTML = parseInt(step.innerHTML) // 將步數轉成數字
let step_num = 10 // 初始步數
let steps = Array()
let is_drop = false // 確認玩家有沒有放置成功
let has_camel = false // 確認有沒有駱駝
let step_spent = 0 // 走一格花的步數
let drag_player = '' // 拖曳的元素:img
let drag_start = '' // 開始拖曳的起點:button
let drag_player_clone = '' // clone拖曳的元素:node of img
// 限制周圍格子移動
let error_entry = Array()
let preX = 0 // 前一格位置X
let preY = 0 // 前一格位置Y
let times = 1 // 根據視窗大小調整距離倍率

// 對象: player img
function dragStart(ev) {
    panel_walking.style.display = "none" // 提示消失
    // 拖曳設定
    ev.dataTransfer.setData("text", ev.target.id);
    // 初始化
    [preX, preY] = setPrePosition(ev.clientX, ev.clientY, times)
    console.log([preX, preY])
    drag_start = ev.target.parentElement
    is_drop = false
    step.innerHTML = step_num
    steps = Array()
    steps_id = Array()
    drop_players = document.querySelectorAll('img[data-role="player"]') //所有玩家位置
    // add listener
    if (has_camel) {
        drop_container.forEach(container => {
            container.addEventListener('drop', dropped)
            container.addEventListener('dragenter', drageEnter)
            container.addEventListener('dragover', cancelDefault)

        })
    } else {
        drop_container_other.forEach(container => { // 除了沙漠以外都可以走
            container.addEventListener('drop', dropped)
            container.addEventListener('dragenter', drageEnter)
            container.addEventListener('dragover', cancelDefault)

        })
    }

    // remove listener
    // 當格不能走
    // ev.target.parentElement.removeEventListener('dragover', cancelDefault)
    // ev.target.parentElement.removeEventListener('dragenter', drageEnter)
    // 所有玩家在的格子不能走
    drop_players.forEach(player => {
        player.parentElement.removeEventListener('dragover', cancelDefault)
        player.parentElement.removeEventListener('dragenter', drageEnter)
    })
}
function dragEnd(ev) {
    if (is_drop) {
        // 成功放置
        display_walk_complete(ev)
    } else {
        // 未放入合法button內，消除紀錄
        panel_walking.style.display = "block"
        steps.forEach(e => { e.classList.remove('round_walk') })
    }
    step.innerHTML = step_num
    drop_container.forEach(container => {
        container.removeEventListener('drop', dropped)
        container.removeEventListener('dragenter', drageEnter)
        container.removeEventListener('dragover', cancelDefault)

    })
}

// 容器
function dropped(ev) {
    // 拖曳設定
    cancelDefault(ev)
    let data = ev.dataTransfer.getData('text')
    drag_player = data
    drag_player_clone = (document.getElementById(data)).cloneNode(true)
    ev.target.appendChild(document.getElementById(data))

    // 成功放置紀錄
    is_drop = true
    //steps.filter((item, index) => steps.indexOf(item) === index); // 刪除重複值 //不會有了
}

function cancelDefault(ev) {
    ev.preventDefault()
    ev.stopPropagation()
    return false
}

function drageEnter(ev) {
    cancelDefault(ev)
    let target = ev.target
    let [currentX, currentY] = setPrePosition(ev.clientX, ev.clientY, times)
    console.log([currentX, currentY])
    // 限制移動周圍格子
    if (distance(preX, preY, currentX, currentY, times) < 58) {
        // 是周圍格子，可以走
        // 上下兩格距離 56, 左右四格距離 57.3
    } else {
        target.removeEventListener('dragenter', drageEnter)
        target.removeEventListener('dragover', cancelDefault)
        target.addEventListener('dragleave', dragLeave)
        return false // 結束function
    }

    // 消耗步數
    target.removeEventListener('dragenter', drageEnter) // 走過就不能再走
    steps.length > 1 ? (steps[steps.length - 1].removeEventListener('dragover', cancelDefault)) : false // 如果陣列中超過一個node，則把前一個node dragover_listener刪除:不讓使用者往回放
    if (target.classList[0].indexOf("_m") > -1) {
        step_spent = 2 // 走山地花兩步
    } else {
        step_spent = 1 // 走其他地形
    }
    // 別人走過的路步數/2
    if (target.classList.value.indexOf("walked") > -1) {
        step_spent /= 2
    }

    // 檢查步數用完了沒
    if (stepIsRunOut(step_spent, target) || target.classList.value.indexOf("player") > -1) {
        // 不能走了
        // 步數用完 or 有人
    } else {
        [preX, preY] = [currentX, currentY]
        target.classList.add('round_walk')
        step.innerHTML -= step_spent
        steps.push(target)
    }
}

function dragLeave(ev) {
    cancelDefault(ev)
    let target = ev.target
    target.addEventListener('dragenter', drageEnter)
    target.addEventListener('dragover', cancelDefault) // 離開非法移動格子，就幫其加回listener，之後走到附近才可以走
    target.removeEventListener('dragleave', dragLeave)
}

function setPrePosition(x, y, times) { // 回傳array
    // 根據視窗調整座標
    x *= times
    y *= times

    let column = ~~((x - 34) / 50) // 求商取整數

    x = 50 * column + 34 + 15
    if (column % 2 == 0) { //奇數排
        let row = ~~((y - 68) / 56) // 求商取整數
        y = 56 * row + 68 + 26
    } else { // 偶數排
        let row = ~~((y - 96) / 56)
        y = 56 * row + 96 + 26
    }
    return [x, y]
}

function distance(x1, y1, x2, y2) {
    return Math.sqrt((x1 - x2) ** 2 + (y1 - y2) ** 2)
}

function stepIsRunOut(spent_step, target) {
    if (step.innerHTML - spent_step < 0) {
        /*
        drop_container.forEach(container => { // 所有格子
            container.removeEventListener('drop', dropped)
            container.removeEventListener('dragenter', drageEnter)
            container.removeEventListener('dragover', cancelDefault)
        })
        */
        target.removeEventListener('dragenter', drageEnter)
        target.removeEventListener('dragover', cancelDefault)
        target.addEventListener('dragleave', dragLeave)

        // 剩下終點可以放置
        steps[steps.length - 1].addEventListener('drop', dropped)
        steps[steps.length - 1].addEventListener('dragover', cancelDefault)

        return true
    }
    return false
}

// 根據視窗大小調整距離倍數 TODO:座標不精確
function WinOnResize() { // 以 function 的方式來寫
    if ($(window).width() < 1024) {
        times = 1.6
    } else if ($(window).width() < 1200) {
        times = 1.4
    } else if ($(window).width() < 1500) {
        times = 1.2
    } else {
        times = 1
    }
}
window.onresize = WinOnResize
window.onload = WinOnResize


// 遊戲迴圈
let players_attributes = {
    "player_0": { money: 100, station: 0, fort: 0, temple: 0, supply: 50 },
    "player_1": { money: 0, station: 0, fort: 0, temple: 0, supply: 0 },
    "player_2": { money: 0, station: 0, fort: 0, temple: 0, supply: 0 },
    "player_3": { money: 0, station: 0, fort: 0, temple: 0, supply: 0 },
}
let game_is_done = false // 遊戲結束

function stratGame() {
    if (game_is_done) {
        return
    }
    round()
}

/* 檢查金錢為正 */
function checkMoney(money) {
    if (money < 0) {

    }
}

/* 回合結束更新資料 */
function roundFinised() {
    attributes["supply"]++ //特產++
    attributes["money"] += attributes["station"] //驛站獲得$1
    display_user_attributes(attributes)
}

let color = ''
function colorDe() {
    switch (character) {
        case '0': //'constan'
            color = '#930093'
            break
        case '1':
            color = '#F9F900'
            break
        case '2':
            color = '#C7C7E2'
            break
        case '3':
            color = '#FF7575'
            break

    }
}
colorDe()

function doMovement() {
    panel_movement.style.display = "block"
    pre_btn_loc = btn_loc
    btn_loc = player.parentElement // 紀錄位置
    btn_loc.style.border = `thick solid ${color}`;

    // 四個動作card顯示
    if (btn_loc.classList[0].indexOf('_t') > -1) {
        // 城鎮
        loc = "城鎮"
        card_walk.style.display = ""
        card_building.style.display = ""
        card_trade.style.display = "none" // 不能交易
        building_content.textContent = "城鎮：免費建造驛站"
        if (has_others_building(btn_loc, character)) {
            card_rob.style.display = ""
        }
    } else if (btn_loc.classList[0].indexOf('_h') > -1) {
        // 聖地
        loc = "聖地"
        card_walk.style.display = ""
        card_building.style.display = ""
        card_trade.style.display = "none" // 不能交易
        building_content.textContent = "聖地：花 $5 建造神廟"
        if (has_others_building(btn_loc, character)) {
            card_rob.style.display = ""
        }
    } else if (btn_loc.classList[0].indexOf("_c") > -1) {
        // 大城市
        loc = "大城市"
        card_walk.style.display = ""
        card_trade.style.display = ""
        card_building.style.display = "none" // 不能蓋建築
        card_rob.style.display = "none" // 不能掠奪(沒有建築)
    } else if (btn_loc.classList[0].indexOf("_o") < 0) {
        // 其他
        loc = "其他"
        card_walk.style.display = ""
        card_building.style.display = ""
        card_trade.style.display = "none" // 不能交易
        building_content.textContent = "花 $3 建造要塞"
        if (has_others_building(btn_loc, character)) {
            card_rob.style.display = ""
        }
    } else {
        // 水域
        panel_movement.style.display = "none" // TODO:之後是判斷所在位置之後，這個應該要刪除
    }
}

function doMovementAfterWalk() {
    panel_movement.style.display = "block"
    pre_btn_loc = btn_loc
    btn_loc = player.parentElement // 紀錄位置
    btn_loc.style.border = `thick solid ${color}`;

    // 四個動作card顯示
    if (btn_loc.classList[0].indexOf('_t') > -1) {
        // 城鎮
        loc = "城鎮"

        card_building.style.display = ""
        card_trade.style.display = "none" // 不能交易
        building_content.textContent = "城鎮：免費建造驛站"
        if (has_others_building(btn_loc, character)) {
            card_rob.style.display = ""
        }
    } else if (btn_loc.classList[0].indexOf('_h') > -1) {
        // 聖地
        loc = "聖地"

        card_building.style.display = ""
        card_trade.style.display = "none" // 不能交易
        building_content.textContent = "聖地：花 $5 建造神廟"
        if (has_others_building(btn_loc, character)) {
            card_rob.style.display = ""
        }
    } else if (btn_loc.classList[0].indexOf("_c") > -1) {
        // 大城市
        loc = "大城市"

        card_trade.style.display = ""
        card_building.style.display = "none" // 不能蓋建築
        card_rob.style.display = "none" // 不能掠奪(沒有建築)
    } else if (btn_loc.classList[0].indexOf("_o") < 0) {
        // 其他
        loc = "其他"

        card_building.style.display = ""
        card_trade.style.display = "none" // 不能交易
        building_content.textContent = "花 $3 建造要塞"
        if (has_others_building(btn_loc, character)) {
            card_rob.style.display = ""
        }
    } else {
        // 水域
        panel_movement.style.display = "none" // TODO:之後是判斷所在位置之後，這個應該要刪除
    }
    card_cancel.style.display = ""
    card_walk.style.display = "none"
}

let current_player_id = 0 //當前玩家

function playerRound(player_id) {
    if (game_is_done) {
        let winner = win()
        panel_walking.childNodes[1].innerHTML = `遊戲結束 ${winner}勝利`
        panel_walking.style.display = "block" // 顯示遊戲結束
    }
    current_player_id = player_id.split('_')[1]

    // TODO: 玩家回合
    // player = document.querySelector(`#${player_id}`)
    // console.log(player_id)
    // doMovement()
    // checkGameDone()
    if (character == current_player_id) {
        player = document.querySelector(`#${player_id}`)
        console.log(player_id)
        timer()
        doMovement()
        checkGameDone()
    } else {
        console.log('不是你的回合')
        p = parseInt(current_player_id) + 1
        timer_panel.innerText = `玩家 ${p} 的回合`
    }
}
let p = 0 // 紀錄玩家回合

// TODO: delete
let time_player1 = setTimeout(function () { playerRound('player_0') }, 0)
let time_player2 = setTimeout(function () { playerRound('player_1') }, 1000000)
let time_player3 = setTimeout(function () { playerRound('player_2') }, 2000000)
let time_player4 = setTimeout(function () { playerRound('player_3') }, 3000000)

function round() { // TODO:每輪1000秒
    time_player1
    time_player2
    time_player3
    time_player4
}

function win() { // return winner
    let money_arr = Array()
    for (let i = 0; i++; i <= 3) {
        money_arr.push(players_attributes[`player_${i} `])
    }
    let winner = Math.max(...money_arr)
    return winner
}

function checkGameDone() { //TODO:四個遊戲結束任務
    if (players_attributes['player_0']['money'] == 101) {
        game_is_done = true
    }
}

stratGame()
setInterval(function () { round() }, 4000000) //TODO:4000秒一輪

let timer_panel = document.querySelector(".timer");
let time_timer = null
let time_used = 0

function timer(flag) {
    //   按下 start 後 id 為 timer 的 DIV 內容可以開始倒數到到 0。
    time_used = 0;

    if (time_timer) {
        clearInterval(time_timer);
        time_timer = null;
    }
    time_timer = setInterval(function () {
        time_used++;
        timer_panel.innerText = time_used
    }, 1000);
}

function doneMovement(current_player_id) {
    if (current_player_id == 3) {
        current_player_id = 0
        attributes['supply']++
    } else {
        current_player_id++;
    }
    display_user_attributes(attributes)
    clearTimeout(`time_player${current_player_id} `);
    clearInterval(time_timer);
    time_timer = null;
    playerRound(`player_${current_player_id}`)
}

/* websocket */
let roomid = window.location.href.split('/').pop()


let userInfo = [];
let gameData = [];

Pusher.logToConsole = true;

Echo.join(`room.${roomid}`)
    .here((users) => {
        userInfo = users;
        // userInfo.forEach(element => {
        //     element['id'] == Auth:: user() -> id ? my_player_id = element['player_id'] : null;
        // });
    })
    .joining((user) => {
        //userInfo.push(user);
    })
    .listen('.DoMovement', (e) => {
        console.log(e)
        dd = e
        let lastBtn = e.steps.slice(-1)
        e.steps.forEach(e => { document.querySelector(`#${e}`).classList.add('walked') })
        e.character
        document.querySelector(`#${lastBtn}`).appendChild(document.getElementById(`player_${e.character}`))
        //doneMovement(e.character) 不會進入下一位
    })
    .listen('.BuildFort', (e) => {
        console.log(e)

        let img = new Image()
        img.src = "../img/fortress.png"
        img.draggable = "false"
        img.setAttribute("class", "building_img")
        img.id = e.character // 紀錄建築物屬於誰
        document.querySelector(`#${e.btn_loc}`).parentElement.appendChild(img)
        doneMovement(e.character)
    })
    .listen('.BuildTemple', (e) => {
        console.log(e)

        let img = new Image()
        img.src = "../img/temple.png"
        img.draggable = "false"
        img.setAttribute("class", "building_img")
        img.id = e.character // 紀錄建築物屬於誰
        document.querySelector(`#${e.btn_loc}`).parentElement.appendChild(img)
        doneMovement(e.character)
    })
    .listen('.BuildCastle', (e) => {
        console.log(e)

        let img = new Image()
        img.src = "../img/station.png"
        img.draggable = "false"
        img.setAttribute("class", "building_img")
        img.id = e.character // 紀錄建築物屬於誰
        document.querySelector(`#${e.btn_loc}`).parentElement.appendChild(img)
        doneMovement(e.character)
    })
    .listen('.Rob', (e) => {
        console.log(e)
        let place = document.querySelector(`#${e.btn_loc}`)
        place.parentElement.removeChild(place.parentElement.childNodes[place.parentElement.childNodes.length - 1])
        doneMovement(e.character)
    })
    .listen('.Trade', (e) => {
        console.log(e)
        doneMovement(e.character)
    })
    .listen('.Cancel', (e) => {
        console.log(e)
        doneMovement(e.character)
    })

let dd;
