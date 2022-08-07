// Js for My leave page
const js_leaves = document.querySelectorAll('.js-leave-his')
const leave_his = document.querySelector('.leave-history')
const modalContainer = document.querySelector('.js-modal-contain')
const btn1 = document.querySelector('.btn1');
const btn2 = document.querySelector('.btn2');
const js_summarys = document.querySelectorAll('.js-summary')
const summary = document.querySelector('.summary')


for (const js_summary of js_summarys) {
    js_summary.addEventListener('click',showSummary)
}

for (const js_leave of js_leaves) {
    js_leave.addEventListener('click',showLeaveManagement)
}

function showLeaveManagement () {
    leave_his.classList.toggle('open')
    leave_his.classList.remove('hidden')
    document.getElementById('btn-leave').style.backgroundColor = "var(--green)"
    document.getElementById('btn-leave').style.color = "var(--white)"
    document.getElementById('content-body').style.backgroundColor = "var(--nav)"
    btn1.classList.add('open')
    btn2.classList.remove('open')
    summary.classList.remove('open')
}

function showSummary () {
    summary.classList.add('open')
    btn2.classList.add('open')
    btn1.classList.remove('open')
    document.getElementById('btn-leave').style.backgroundColor = "var(--primary-lighter)"
    document.getElementById('btn-leave').style.color = "var(--black)"
    leave_his.classList.remove('open')
    leave_his.classList.toggle("hidden")
}

modalContainer.addEventListener('click', function(even){
    even.stopPropagation()
})

// Js for Delete request 
const js_del_res = document.querySelectorAll('.js-del-re')
const js_del_cos = document.querySelectorAll('.js-confirm')
const modal_del_re = document.querySelector('.js-modal-del-re')
const modal_del_co = document.querySelector('.js-modal-del-co')
const modalContainer_res = document.querySelector('.js-modal-contain-re')
const modalContainer_cos = document.querySelector('.js-modal-contain-co')

const modalClose_del_re = document.querySelector('.js-modal-close-del-re')
const modalClose_del_co = document.querySelector('.js-modal-close-del-co')

const ok_btn = document.querySelector('.ok-btn')

for (const js_del_re of js_del_res) {
    js_del_re.addEventListener('click',showDelRequest)
}

for (const js_del_co of js_del_cos) {
    js_del_co.addEventListener('click',showDelConfirm)
}

function showDelRequest () {
    modal_del_re.classList.add('open')
}

function showDelConfirm () {
    modal_del_co.classList.add('open')
    modal_del_re.classList.remove('open')
}

function hideDelRequest () {
    modal_del_re.classList.remove('open')
}

function hideDelConfirm () {
    modal_del_co.classList.remove('open')
}

ok_btn.addEventListener('click', hideDelConfirm)
modalClose_del_re.addEventListener('click', hideDelRequest)
modalClose_del_co.addEventListener('click', hideDelConfirm)

modal_del_re.addEventListener('click',hideDelRequest)
modal_del_co.addEventListener('click',hideDelRequest)

modalContainer_res.addEventListener('click', function(even){
    even.stopPropagation()
})

modalContainer_cos.addEventListener('click', function(even){
    even.stopPropagation()
})

function get_leave_request(){
    $.ajax({
        type: "GET",
        contentType: 'application/json',
        url: api_uc010 + '?employee_id=1&leave_from=2020-01-01&leave_to=2020-01-01&leave_type=Annual Leave&status',
        // dataType: 'json',
        // cors: true ,
        // contentType:'application/json',
        // secure: true,
        // headers: {
        //     'Access-Control-Allow-Origin': '*',
        // },
        success: function (response) {
            console.log(response);
            // if (data_request_ot.success) {
            //     // generate_data(data_request_ot.data.value);
            // }else{
            //     root.innerHTML = `
            //         <img src="${host_name}/public/img/image/oh crap.png" width="420" height="300" alt="">
            //         <p>you don't have any OT request. you can create a new one!</p>
            //     `;
            // }
        }
    });
}

function generate_data(data = []){
    root.innerHTML = `
    <div class="history">
        <div class="header">
            <h4></h4>
            <div class="header-page">
                <i onclick="next_page('down')" class="fa-solid fa-angle-left" style="cursor: pointer;"></i>
                <span id="current_page">1</span>
                <span> / </span>
                <span id="all_page">1</span>
                <i onclick="next_page('up')" class="fa-solid fa-angle-right" style="cursor: pointer;"></i>
            </div>
        </div>
        <table style="background-color: white" id="history">
            <tr>
                <th>OTRequest_ID</th>
                <th>Total Hours</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>date created</th>
                <th>manager id</th>
                <th>rejected reason (if any)</th>
                <th>action</th>
            </tr>
        </table> 
    </div>`;
    for (var i = 0; i < data.length; i++){
        document.getElementById('history').innerHTML += `
        <tr>
            <td>${data[i].id}</td>
            <td>${data[i].ESTIMATED_HOURS}</td>
            <td>${data[i].START_DATE}</td>
            <td>${data[i].END_DATE}</td>
            <td class="${data[i].STATUS}">${data[i].STATUS}</td>
            <td>${data[i].CREATE_DATE}</td>
            <td>${data[i].MANAGER_ID}</td>
            <td>${data[i].MANAGER_COMMENT}</td>
            <td class="action-area">
                <i onclick="delete_ot_request('${data[i].id}', '${data[i].STATUS}')" class="fa-solid fa-trash-can js-trash js-del-re"></i>
                <i onclick="edit_ot_request(${data[i].id},'${data[i].STATUS}')" class="fa-solid fa-pen js-fix"></i>
            </td>
        </tr>
        `;
    }
}

$(document).ready(function () {
    get_leave_request();
});