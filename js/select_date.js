load_dates();
load_timing();
load_seats();

function load_dates() {
    let date = document.getElementById('dates');
    let dates = '';
    jsondata['date_time'].forEach(element => {
        dates += `<button class='date' data-fulldate=${element.date} 
            onclick='select_date(this)''>${element.date.substr(0, 5)}</button>`;
    });
    date.innerHTML = dates;
}

function load_timing() {
    let time = document.getElementById('times');
    let date = is_date_selected();
    let times = '';
    if (date) {
        jsondata['date_time'].forEach(e => {
            if (e['date'] == date) {
                e['timimgs'].forEach(ele => {
                    // console.log(ele['time']);
                    times += `<button class='time' onclick='select_time(this)'>${ele['time']}</button>`
                });
            }
        });
    }
    time.innerHTML = times;

}

function load_seats() {

    let seat = document.getElementById('seats');
    let date = is_date_selected();
    let time = is_time_selected();
    let seats="";
    if (time && date) {
        seats = "<div class='seat_con'><label>seats : </label> <input type='number' id='seat_count' value='1' min='1' onchange='load_seats()'></div><div class='seat_cont'>";
        jsondata['date_time'].forEach(e => {
            if (e['date'] == date) {
                e['timimgs'].forEach(ele => {
                    if (ele['time'] == time) {
                        ele['seats'].forEach((element, idx) => {
                            if (element == '') {
                                seats += `<button class='seat true' onclick='select_seat(this)'>
                                    ${idx}</buttton>`;
                            }
                            else {
                                seats += `<button class='seat false' disabled>${idx}</buttton>`;
                            }
                        });
                    }
                });
            }
        });
        seats+='<div>';

    }
    seat.innerHTML =  seats;

}

function select_date(obj) {

    let arrDate = document.getElementsByClassName('date');
    Array.from(arrDate).forEach(e => {
        e.className = 'date';
    });
    obj.className = 'date date_selected';
    load_timing();
}

function select_time(obj) {

    let arrtime = document.getElementsByClassName('time');
    Array.from(arrtime).forEach(e => {
        e.className = 'time';
    });
    obj.className = 'time time_selected';
    load_seats();

}

function select_seat(obj) {
    let seact_count = document.getElementById('seat_count').value;
    let arrseat = document.getElementsByClassName('seat_selected');
    if(arrseat.length<seact_count){
        obj.classList.add('seat_selected');
    }else{
        alert("change no of seats");
    }
    


}

function is_date_selected() {
    let sel = document.querySelector('.date_selected');
    if (sel) {
        return sel.dataset.fulldate;
    }
    return null;
}

function is_time_selected() {
    let sel = document.querySelector('.time_selected');
    if (sel) {
        return sel.innerHTML;
    }
    return null;
}


function check_and_submit(obj){
    let str="";
    let ok=true;
    if(is_date_selected()==null){
        str+="please select date,time,seats";
        ok=false;
    }
    else if(is_time_selected()==null){
        str+="please select time,seats";
        ok=false;
    } else if( document.getElementsByClassName('seat_selected').length==0){
        ok=false;
        str+="please select seats";
    }
    let errBlock = document.querySelector('span.err');
    if(ok){
        errBlock.className='err';
        let date=is_date_selected();
        let time=is_time_selected();
        let seats =[];
        let seleced_seat = document.querySelectorAll('.seat_selected');
        Array.from(seleced_seat).forEach(w => {
             seats.push(Number(w.innerHTML));
        });
        let seats_str= JSON.stringify(seats);

        location.href=location.href+`&date=${date}&time=${time}&seats=${seats_str}&booked`;
    }else{
        errBlock.className='err err_true';
        errBlock.innerHTML=str;
    }

}
 
 